<?php
/**
 * Created by PhpStorm.
 * User: Korisnik
 * Date: 5.3.2018
 * Time: 23:55
 */

namespace App\Models;


class Memberships
{
    public function get(){
        return \DB::table('cards')->get();
    }

    public function editMembership($id, $name, $color, $price){
        return \DB::table('cards')
            ->where('id','=',$id)
            ->update([
                'name' => $name,
                'color' => $color,
                'price' => $price
            ]);
    }
    public function deleteMembership($id){
        return \DB::table('cards')
            ->where('id','=',$id)
            ->delete();
    }

    public function insertMemberstip($name,$color,$price,$perks){
        return \DB::table('cards')->insert([
            'name'=>$name,
            'color'=>$color,
            'price'=>$price,
            'perks'=>$perks
        ]);
    }

    public function purchase($membership_id, $user_id){
        $check = \DB::table('workouts')->where('user_id', $user_id)->count();
        $workouts = $membership_id * 10;
        if ($check == 0) {
            \DB::table('workouts')->insert([
                'user_id' => $user_id,
                'workouts' => $workouts
            ]);
            return 1;
        } else {
            return 2;
        }
    }
        public function checkWorkouts($user_id){
            return \DB::table('workouts')->where('user_id', $user_id)->count();
        }
        public function workout($uid){
            $workouts = \DB::table('workouts')->where('user_id', $uid)->get();
            if($workouts[0]->workouts==1){
                return \DB::table('workouts')->where('user_id', $uid)->delete();
            } else{
                return \DB::table('workouts')->where('user_id', $uid)->decrement('workouts');
            };
        }

        public function getWorkouts($user_id){
            return \DB::table('workouts')->where('user_id', $user_id)->get();
        }
}