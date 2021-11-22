<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $table = 'brands';
    protected $fillable = ['img'];
    
    public function item(){
        return $this->belongsToMany('App\Item');
    }
}
