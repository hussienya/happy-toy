<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class ItemTranslation extends Model
{
    public $fillable = ['name','description','size','source','contents','country','brand'];
}
