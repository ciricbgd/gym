<?php
/**
 * Created by PhpStorm.
 * User: Korisnik
 * Date: 1.3.2018
 * Time: 22:53
 */

namespace App\Models;
use Illuminate\Support\Facades\DB;

class Cards
{
    public function get_all(){
        return DB::table('cards')->get();
    }
}