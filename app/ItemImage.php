<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Item;

class ItemImage extends Model
{
    protected $table = 'images';
    protected $fillable = ['img'];

    public function items() {
        return $this->belongTo('App\Item');
    }

}
