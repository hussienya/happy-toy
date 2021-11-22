<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use App\Category;
use App\ItemImage;

class Item extends Model
{
    use Translatable;
    protected $table = 'items';
    protected $fillable = ['count','price','new_price','real_price','count','maker'];
    public $translatedAttributes = ['title','description','subtitle'];

    public function categories(){
        return $this->belongsToMany('App\Category');
    }
    public function Size(){
        return $this->belongsToMany('App\Size');
    }
    public function Color(){
        return $this->belongsToMany('App\Color');
    }
    public function Type(){
        return $this->belongsToMany('App\Type');
    }
    public function brand(){
        return $this->belongsToMany('App\Item');
    }
    public function images(){
        return $this->hasMany('App\ItemImage');
    }

}
