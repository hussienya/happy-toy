<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use App\Item;
class Type extends Model
{
    use Translatable;
    protected $fillable = ['img'];
    public $translatedAttributes = ['type'];


    public function item(){
        return $this->belongsToMany('App\Item');
    }
}
