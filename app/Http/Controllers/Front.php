<?php
/**
 * Created by PhpStorm.
 * User: Korisnik
 * Date: 25.2.2018
 * Time: 1:10
 */

namespace App\Http\Controllers;
use App\Models\Article;
use App\Models\Cards;
use App\Models\Memberships;
use App\Models\Showcase;
use App\Models\SurveyModel;
use Illuminate\Http\Request;


class Front extends Controller
{
    private $user = false;
    public function index(Request $request)
    {

        if($request->session()->has('user')){
            $this->user=true;
            //Workouts
            $workouts = new Memberships();
            $uid = $request->session()->get('user')[0]->id;
            $this->data['workouts']=$workouts->getWorkouts($uid);
            $this->data['workoutcheck']=$workouts->checkWorkouts($uid);
        }
        else{
            $this->data['workoutcheck']=0;
        }

        //Menu
        /*$menu = new MenuModel();
        $this->data['home'] = $menu->getHome();
        $this->data['nav'] = $menu->getAnchor();*/

        //Cards
        $cards = new Cards;
        $cards = $cards->get_all();
        $this->data['cards'] = $cards;

        //Surveys
        if($this->user){
            $user_id= $request->session()->get('user')[0]->id;
            $surveys = new SurveyModel();

            try{
                $this->data['questions'] = $surveys->get('questions');
                $this->data['answers'] = $surveys->get('answers');
                $this->data['surveys'] = $surveys->getSurvey($user_id);
            }
            catch(\Exception $ex){
                \Log::error('error: ' . $ex->getMessage());
                return \Redirect::back()->withErrors('Something went wrong...');
            }
        }

        //Articles
        $article = new Article();
        try{
            $this->data['articles'] = $article->get(0,2);
        }
        catch(\Exception $ex){
            \Log::error('error: ' . $ex->getMessage());
            return \Redirect::back()->withErrors('Something went wrong...');
        }

        //Showcase
        $showcase = new Showcase();
        try{
            $this->data['showcase'] = $showcase->getAll();
        }
        catch(\Exception $ex){
            \Log::error('error: ' . $ex->getMessage());
            return \Redirect::back()->withErrors('Something went wrong...');
        }

        return view('home', $this->data);
    }
    public function getArticlePages(Request $request){
        return \DB::table('articles')->count();
    }
    public function getArticle(Request $request){
        $skip = $request->get('page')*2;
        $article = new Article();
        return $article->get($skip,2);

    }

    public function register()
    {
        return view('register', $this->data);
    }

    public function autor(){
        return view('autor', $this->data);
    }
}