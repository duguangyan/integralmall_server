<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    //

    // protected $fillable = ['loginName', 'loginPwd','remember_token'];

    protected  $guarded=[];

    public function getOrders(){
        return $this->hasMany('App\Models\Orders','u_id','id');
    }




}
