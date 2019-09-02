<?php
/**
 * Created by PhpStorm.
 * User: Korisnik
 * Date: 6.3.2018
 * Time: 11:49
 */

namespace App\Models;


class UserManager
{
    public function get(){
        return \DB::table('users')
            ->join('roles', 'users.role_id', '=', 'roles.id')
            ->select('users.*', 'roles.role')
            ->orderBy('id')
            ->get();
    }
    public function get_roles(){
        return \DB::table('roles')->get();
    }
}