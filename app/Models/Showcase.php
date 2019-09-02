<?php
/**
 * Created by PhpStorm.
 * User: Korisnik
 * Date: 14.3.2018
 * Time: 20:48
 */

namespace App\Models;


class Showcase
{
    public function getAll(){
        return \DB::table('showcase')->get();
    }
    public function deleteShowcase($id){
        return \DB::table('showcase')->where('id', '=', $id)->delete();
    }
    public function insetShowcase($title,$img,$alt){
        return \DB::table('showcase')->insert([
            'title' => $title,
            'img' => $img,
            'alt' => $alt
        ]);
    }
    public function updateShowcase($id,$title,$alt){
        return \DB::table('showcase')
            ->where('id',$id)
            ->update([
                'title'=>$title,
                'alt'=>$alt
            ]);
    }
}