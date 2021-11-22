<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ColorItem extends Model
{
    protected $table = 'color_item';
    protected $fillable = ['color_id','item_id'];
}
