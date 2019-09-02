<?php
/**
 * Created by PhpStorm.
 * User: Korisnik
 * Date: 17.3.2018
 * Time: 18:25
 */

namespace App\Http\Controllers;
use App\Models\Memberships;
use Illuminate\Http\Request;

class MembershipController extends Controller
{
    public function purchase(Request $request){
        $user_id = $request->get('user_id');
        $membership_id = $request->get('membership_id');

        $membership = new Memberships();
        try{
            $result = $membership->purchase($membership_id, $user_id);
        }
        catch(\Exception $ex){
            \Log::error('error: ' . $ex->getMessage());
            return \Redirect::back()->withErrors('Something went wrong...');
        }
        if($result==1){
            return redirect()->back()->with('alert', ['Thank you for purchasing a membership in our gym!']);
        }
        else{
            return redirect()->back()->with('alert', ['You already have a membership!']);
        }
    }
    public function workout(Request $request){
        $uid = $request->get('user_id');
        $membership = new Memberships();
       try{
            $membership->workout($uid);
        }
        catch(\Exception $ex){
            \Log::error('error: ' . $ex->getMessage());
            return \Redirect::back()->withErrors('Something went wrong...');
        }
        return redirect()->back()->with('alert', ['Enjoy your workout!']);
    }
}