<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemType extends Model
{
    protected $table = 'item_type';
    protected $fillable = ['item_id','type_id'];
}
