<?php

namespace App\Http\Controllers;


use App\Models\Article;
use App\Models\Memberships;
use App\Models\Showcase;
use App\Models\SurveyModel;
use App\Models\UserManager;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\MenuModel;

class Admin_panel extends Controller
{
    public function index(){
        return view('admin_panel', $this->data);
    }

    //Manage users
    public function manage_users_index(){
        $users = new UserManager();
        $this->data['users'] = $users->get();
        $this->data['roles'] = $users->get_roles();
        return view ('admin.manage_users', $this->data);
    }


    //Memberships
    public function memberships_index(){
        $memberships = new Memberships();
        $this->data['memberships'] = $memberships->get();
        return view ('admin.memberships',$this->data);
    }

    //Surveys
    public function surveys_index(){
        $surveys = new SurveyModel();
        $this->data['surveys'] = $surveys->get('surveys');
        return view ('admin.surveys', $this->data);
    }

    //Delete user
    public function deleteUser(Request $request){
        $uid = $request->get('uid');
        $user = new User();

        try{
            $user->deleteUser($uid);
        }
        catch(\Exception $ex){
            \Log::error('error: ' . $ex->getMessage());
            return \Redirect::back()->withErrors('Something went wrong...');
        }
    }
    //Edit user
    public function editUser(Request $request){
        $uid = $request->get('uid');
        $role = $request->get('role');
        $user = new User();

        try{
            $user->editUser($uid, $role);
        }
        catch(\Exception $ex){
            \Log::error('error: ' . $ex->getMessage());
            return \Redirect::back()->withErrors('Something went wrong...');
        }
    }

    //Delete membership
    public function editMembership(Request $request){
        $id = $request->get('id');
        $name = $request->get('name');
        $color = $request->get('color');
        $price = $request->get('price');

        $membership = new Memberships();

        try{
            $membership->editMembership($id, $name, $color, $price);
        }
        catch(\Exception $ex){
            \Log::error('error: ' . $ex->getMessage());
            return \Redirect::back()->withErrors('Something went wrong...');
        }
    }

    //Edit membership
    public function deleteMembership(Request $request){
        $id = $request->get('id');
        $membership = new Memberships();

        try{
            $membership->deleteMembership($id);
        }
        catch(\Exception $ex){
            \Log::error('error: ' . $ex->getMessage());
            return \Redirect::back()->withErrors('Something went wrong...');
        }
    }

    //Insert membership
    public function insertMembership(Request $request){
        $name =  $request->get('name');
        $color =  $request->get('color');
        $price =  $request->get('price');
        $perks =  $request->get('perks');

        $perk = (explode("\\",$perks));
        $perks='';
        foreach($perk as $i=>$val){
            $perks .= '<tr><td>'.$perk[$i].'</td>';
        }

        $membership = new Memberships();

        try{
            $membership->insertMemberstip($name,$color,$price,$perks);
        }
        catch(\Exception $ex){
            \Log::error('error: ' . $ex->getMessage());
            return \Redirect::back()->withErrors('Something went wrong...');
        }

        return redirect()->back()->with('Membership created');
    }

    //Articles
    public function articles_index(){
        $articles = new Article();
        $this->data['articles'] = $articles->getAll();
        return view('admin.articles', $this->data);
    }

    public function submitArticle(Request $request){
        $header = $request->get('header');
        $img="";
        $alt = $request->get('alt');
        $text = $request->get('text');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/img/articles');
            $image->move($destinationPath, $name);
            $img=$name;
        }

        $article = new Article();
        try{
            $article->insertArticle($header,$img,$alt,$text);
        }
        catch(\Exception $ex){
            \Log::error('error: ' . $ex->getMessage());
            return \Redirect::back()->withErrors('Something went wrong...');
        }
        return redirect()->back()->with('Article created');
    }
    public function deleteArticle(Request $request){
        $id=$request->get('id');
        $article = new Article();
        try{
            $article->deleteArticle($id);
        }
        catch(\Exception $ex){
            \Log::error('error: ' . $ex->getMessage());
            return \Redirect::back()->withErrors('Something went wrong...');
        }

    }
    public function editArticle(Request $request){
        $id = $request->get('id');
        $header = $request->get('header');
        $alt = $request->get('alt');
        $text = $request->get('text');
        $article = new Article();
        try{
            $article->editArticle($id,$header,$alt,$text);
        }
        catch(\Exception $ex){
            \Log::error('error: ' . $ex->getMessage());
            return \Redirect::back()->withErrors('Something went wrong...');
        }
    }

    //Showcase
    public function showcase_index(){
        $showcase = new Showcase();
        $this->data['showcase'] = $showcase->getAll();
        return view('admin.showcase', $this->data);
    }
    public function showcase_delete(Request $request){
        $id = $request->get('id');
        $showcase = new Showcase();

        try{
            $showcase->deleteShowcase($id);
        }
        catch(\Exception $ex){
            \Log::error('error: ' . $ex->getMessage());
            return \Redirect::back()->withErrors('Something went wrong...');
        }
    }
    public function showcase_insert(Request $request){
        $title = $request->get('title');
        $img="";
        $alt = $request->get('alt');
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/img/showcase');
            $image->move($destinationPath, $name);
            $img=$name;
        }

        $showcase = new Showcase();

        try{
            $showcase->insetShowcase($title,$img,$alt);
        }
        catch(\Exception $ex){
            \Log::error('error: ' . $ex->getMessage());
            return \Redirect::back()->withErrors('Something went wrong...');
        }

        return redirect()->back()->with('Showcase created');
    }
    public function showcase_update(Request $request){
        $id = $request->get('id');
        $title = $request->get('title');
        $alt = $request->get('alt');
        $showcase = new Showcase();
        try{
            $showcase->updateShowcase($id,$title,$alt);
        }
        catch(\Exception $ex){
            \Log::error('error: ' . $ex->getMessage());
            return \Redirect::back()->withErrors('Something went wrong...');
        }
    }
}
