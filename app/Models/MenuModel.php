<?php
/**
 * Created by PhpStorm.
 * User: Korisnik
 * Date: 14.3.2018
 * Time: 22:27
 */

namespace App\Models;


class MenuModel
{
    public function getHome(){
        return \DB::table('nav')->where('id','<', '4')->get();
    }
    public function getAnchor(){
        return \DB::table('nav')->where('id','>','3')->get();
    }
}