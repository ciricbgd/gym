<?php
/**
 * Created by PhpStorm.
 * User: Korisnik
 * Date: 14.3.2018
 * Time: 15:44
 */

namespace App\Http\Controllers;


use App\Models\Article;

class ArticleController extends Controller
{
    public $data = [];
    public function showArticle($id){
        $article = new Article();
        $this->data['article'] =  $article->getOne($id);
        return view ('article', $this->data);
    }
}