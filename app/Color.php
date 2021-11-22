<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    protected $fillable = ['color'];

    public function item(){
        return $this->belongsToMany('App\Item');
    }
}
