<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemSize extends Model
{
    protected $table = 'item_size';
    protected $fillable = ['item_id','size_id'];
}
