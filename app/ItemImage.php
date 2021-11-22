<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Item;

class ItemImage extends Model
{
    protected $table = 'item_images';
    protected $fillable = ['img'];
    public $timestamps = false;
    const CREATED_AT = 'ItemImage_date';
    const UPDATED_AT = 'ItemImage_modified';

    public function items() {
        return $this->belongTo('App\Item');
    }

}
