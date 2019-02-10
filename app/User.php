<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function get_child_of_parent($parent_id){
        $sql = "select * from user_binary_tress where path_to_parent = (select path_to_me from user_binary_tress where child = '$parent_id')";
    }

    public function get_parent_of_node($child_id){
        $sql = "select * from user_binary_tress where path_to_me = (select path_to_parent from user_binary_tress where child = '$child_id')";

    }

    public function get_left_right_count($user_id){
        $sql = "select count(*) as total, direction from user_binary_tress where path_to_parent = (select path_to_me from user_binary_tress where child = '$user_id') group by direction";

    }

    public function get_left_right_buy(){
        $sql = "select count(*) as total, direction from user_binary_tress where path_to_parent = (select path_to_me from user_binary_tress where child = '$user_id') group by direction";

    }




}
