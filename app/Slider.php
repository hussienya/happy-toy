<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Slider extends Model {
    
    use Translatable;
    protected $table = 'sliders';
    protected $fillable = ['img','link'];
    public $translatedAttributes = ['title','description'];

}
