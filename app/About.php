<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class About extends Model
{
    use Translatable;
    protected $table = 'abouts';
    protected $fillable = ['img'];
    public $translatedAttributes = ['description'];
}
