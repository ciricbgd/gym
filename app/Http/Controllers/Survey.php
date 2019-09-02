<?php
/**
 * Created by PhpStorm.
 * User: Korisnik
 * Date: 8.3.2018
 * Time: 1:44
 */

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\SurveyModel;

class Survey extends Controller
{
    public $data = [];
    public function submit(Request $request){
            $user_id = $request->get('user_id');
            $survey_id = $request->get('survey_id');
            $survey = $request->get('survey');

            $hasvoted = new SurveyModel();
            $hasvoted = $hasvoted->voteCheck($user_id,$survey_id);

            if(!$hasvoted){
                foreach(json_decode($survey) as $s){
                    $question_id = $s[0];
                    $answer_id = $s[1];

                    $result = new SurveyModel();
                    try{
                        $result->submitAnswer($user_id, $survey_id, $question_id, $answer_id);
                        return redirect()->back()->with('alert', ['Thank you for participating in our survey!']);
                    }
                    catch(\Exception $ex){
                        \Log::error('error: ' . $ex->getMessage());
                        return \Redirect::back()->withErrors('Something went wrong...');
                    }
                }
            }
    }
    public function survey_delete($id){
        $survey = new SurveyModel;
        try{
            $survey->deleteSurvey($id);
            return redirect()->back()->with('success','Survey deleted');
        }
        catch(\Exception $ex){
            \Log::error('error: ' . $ex->getMessage());
            return \Redirect::back()->withErrors('Something went wrong...');
        }
    }

    public function survey_results($id){
        $survey = new SurveyModel();
        $survey_name = $survey->getSurveyName($id);
        $survey_questions = $survey->getQuestions($id);

        $this->data['survey_name'] = $survey_name;
        $this->data['survey_questions'] = $survey_questions;
        $this->data['survey_answers'] = $survey->get('answers');
        $this->data['survey_results'] = $survey->get('user_answers');
        return view('admin/surveyresults', $this->data);
    }

    public function createSurvey(Request $request){
        $surveyName = $request->get('surveyName');
        $surveyQuestions = json_decode($request->get('surveyQuestions'));
        $surveyAnswers = json_decode($request->get('surveyAnswers'));
        $survey = new SurveyModel();
        try{
            $result = $survey->insertSurvey($surveyName, $surveyQuestions, $surveyAnswers);
            return $result;
        }
        catch(\Exception $ex){
            \Log::error('error: ' . $ex->getMessage());
            return \Redirect::back()->withErrors('Something went wrong...');
        }
    }
}