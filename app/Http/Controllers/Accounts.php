<?php
/**
 * Created by PhpStorm.
 * User: Korisnik
 * Date: 26.2.2018
 * Time: 13:37
 */

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;


class Accounts extends Controller
{
    public $data = [];
    public function register(Request $request)
    {

        // Validacija
        $rules = [
            'tbFirstName' => 'min:3|max:25|regex:/^[A-ZÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ ,.\'-][a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.\'-]+$/u',
            'tbLastName' => 'min:3|max:25|regex:/^[A-ZÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ ,.\'-][a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.\'-]+$/u',
            'tbUsername' => 'min:3|max:25|regex:/^[a-z0-9_\-.]+$/',
            'tbPassword' => 'min:3|max:25|regex:/^[a-z0-9_\-.]+$/',
            'dateDay' => 'numeric|nullable',
            'dateMonth' => 'numeric|nullable',
            'dateYear' => 'numeric|nullable',
            'tbEmail' => 'required|email',
            'tbPhone' => 'numeric|nullable'
        ];
        $custom_messages = [
            'required' => ':attribute cannot be empty',
            'min' => ':attribute too short.',
            'max' => ':attribute too long.',
            'regex' => 'Invalid input :attribute',
            'numeric' => ':attribute must be a number.',
            'email' => 'Bad email format.'
        ];
        $request->validate($rules, $custom_messages);

        //Unos u bazu
        $user = new User();
        $user->firstname = $request->get('tbFirstName');
        $user->lastname = $request->get('tbLastName');
        $user->username = $request->get('tbUsername');
        $user->password = $request->get('tbPassword');
        $user->date = $request->get('dateYear').'-'.$request->get('dateMonth').'-'.$request->get('dateDay');
        $user->email = $request->get('tbEmail');
        $user->phone = $request->get('tbPhone');
        try{
            $user->register();
            return redirect('/')->with('alert', ['Thank you for registering, you may log in now. Purchasing workout membership is now available.']);
        }
        catch(\Exception $ex){
            \Log::error('error: ' . $ex->getMessage());
            return \Redirect::back()->withErrors('Something went wrong...');
        }
        $this->data['alerts']=$user->alerts;
        if(empty($this->data['alerts'])){
            return redirect('/')->with('success','Thank you for registering, you may log in.');
        }
        else{
            return view('register', $this->data);
        }
    }

    public function login(Request $request){
        $request->validate([
            'tbUsername' => ['required'],
            'tbPassword' => ['required']
        ], [
            'required' => 'You must enter both username and password'
        ]);
        $user = new User();
        $user->username = $request->get('tbUsername');
        $user->password = $request->get('tbPassword');

        try{
            $loginUser = $user->loginUser();
        }
        catch(\Exception $ex){
            \Log::error('error: ' . $ex->getMessage());
            return \Redirect::back()->withErrors('Something went wrong...');
        }

        if(!empty($loginUser)){
            try{
                $request->session()->push('user', $loginUser);
            }
            catch(\Exception $ex){
                \Log::error('error: ' . $ex->getMessage());
                return \Redirect::back()->withErrors('Something went wrong...');
            }

            return redirect()->back()->with('success','Thank you for logging in');
        }
        return redirect()->back()->with('error','Wrong username or password');
    }

    public function logout(Request $request){
        try{
            $request->session()->forget('user');
            $request->session()->flush();
        }
        catch(\Exception $ex){
            \Log::error('error: ' . $ex->getMessage());
            return \Redirect::back()->withErrors('Something went wrong...');
        }
        return redirect('/');
    }
}