<?php
/**
 * Created by PhpStorm.
 * User: Korisnik
 * Date: 26.2.2018
 * Time: 22:59
 */

namespace App\Models;
use Illuminate\Support\Facades\DB;

class User
{
    public $firstname;
    public $lastname;
    public $username;
    public $password;
    public $date;
    public $email;
    public $phone;

    public $alerts = [];

    public function register(){
        $check_username = DB::table('users')->where('username', $this->username)->count();
        $check_email = DB::table('users')->where('email', $this->email)->count();

        if($check_username>0){
            $this->alerts[]='User with that username already exists.';
        }
        elseif($check_email>0){
            $this->alerts[]='User with that email address already exists.';
        }
        else{
            return DB::table('users')->insert([
                'firstname' => $this->firstname,
                'lastname' => $this->lastname,
                'username' => $this->username,
                'password'=> md5($this->password),
                'date' => $this->date,
                'email' => $this->email,
                'phone' => $this->phone
            ]);
        }
    }
    public function loginUser(){
            return DB::table('users')
                ->select('users.*','roles.role')
                ->join('roles','users.role_id', '=', 'roles.id')
                ->where([
                    'username' => $this->username,
                    'password' => md5($this->password)
                ])
                ->first();
    }
    public function deleteUser($uid){
        return \DB::table('users')->where('id','=',$uid)->delete();
    }
    public function editUser($uid, $role){
        return \DB::table('users')
            ->where('id','=',$uid)
            ->update(['role_id'=>$role]);
    }
}