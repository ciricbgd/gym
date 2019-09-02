<?php
/**
 * Created by PhpStorm.
 * User: Korisnik
 * Date: 14.3.2018
 * Time: 15:38
 */

namespace App\Models;


class Article
{
    public function getAll(){
        return \DB::table('articles')->get();
    }
    public function get($skip, $take){
        return \DB::table('articles')->skip($skip)->take($take)->get();
    }
    public function getOne($id){
        return \DB::table('articles')->where('id','=',$id)->get();
    }
    public function insertArticle($header,$img,$alt,$text){
        return \DB::table('articles')->insert([
            'header' => $header,
            'img' => $img,
            'alt' =>$alt,
            'text' =>$text
        ]);
    }
    public function deleteArticle($id){
        return \DB::table('articles')->where('id',$id)->delete();
    }
    public function editArticle($id,$header,$alt,$text){
        return \DB::table('articles')
            ->where('id',$id)
            ->update([
                'header'=>$header,
                'alt'=>$alt,
                'text'=>$text
            ]);
    }
}