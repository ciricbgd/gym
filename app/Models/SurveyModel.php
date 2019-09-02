<?php
/**
 * Created by PhpStorm.
 * User: Korisnik
 * Date: 9.3.2018
 * Time: 0:15
 */

namespace App\Models;


class SurveyModel
{
    public function getSurvey($user_id){
        \DB::enableQueryLog();

        $survey_id=\DB::table('user_answers')->select('survey_id')->where('user_id',$user_id)->distinct()->get();
        $ids = [];
        foreach($survey_id as $i=>$id){
            $ids[$i] = $id->survey_id;
        }
        $surveys = \DB::table('surveys')
             ->whereNotIn('id', $ids)
             ->get();

        //dd(\DB::getQueryLog());
        return $surveys;
    }

    public function deleteSurvey($id){
        \DB::table('surveys')
            ->join('questions', 'surveys.id', '=', 'questions.survey_id')
            ->join('answers', 'questions.id', '=', 'answers.question_id')
            ->where('surveys.id', '=', $id)
            ->delete();
        \DB::table('user_answers')
            ->where('survey_id', '=', $id)
            ->delete();
    }

    public function get($table){
        return \DB::table($table)->get();
    }

    public function voteCheck($user_id, $survey_id){
        return \DB::table('user_answers')
                ->where([
                    ['user_id', $user_id],
                    ['survey_id', $survey_id]
                ])
                ->exists();
    }

    public function submitAnswer($user_id, $survey_id, $question_id, $answer_id){
        return \DB::table('user_answers')->insert([
            'user_id' => $user_id,
            'survey_id' => $survey_id,
            'question_id' => $question_id,
            'answer_id' => $answer_id
        ]);
    }

    public function getSurveyName($id){
        return \DB::table('surveys')->select('name')->where('id', '=', $id)->get();
    }
    public function getQuestions($id){
        return \DB::table('questions')->where('survey_id', '=', $id)->get();
    }

    public function insertSurvey($surveyName, $surveyQuestions, $surveyAnswers){
        $surveyID = \DB::table('surveys')->insertGetId(['name' => $surveyName]);
        foreach($surveyQuestions as $i=>$question){
            $questionID = \DB::table('questions')->insertGetId([
                    'answer_format' => $surveyQuestions[$i][0],
                    'name' => $surveyQuestions[$i][1],
                    'survey_id' => $surveyID
                ]);
            foreach($surveyAnswers as $j=>$answer){
                if($surveyAnswers[$j][0]==$i){
                    \DB::table('answers')->insert([
                        'name'=> $surveyAnswers[$j][1],
                        'question_id'=> $questionID
                    ]);
                }
            }
        }
    }
}