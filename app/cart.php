<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Item;

class cart extends Model
{
    
    protected $table = 'cart';
    protected $fillable = ['item_id','user_id','price','amount','real_price','status'];
    

    public function getItem(){
        return $this->hasMany('App\Item');
    }
    public function getUser(){
        return $this->hasMany('App\User');
    }

}
