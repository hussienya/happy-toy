<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryItem extends Model
{
    protected $table = 'category_item';
    protected $fillable = ['category_id','item_id'];
}
