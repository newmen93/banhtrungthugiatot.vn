<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\ProductAttribute;
use App\Models\ImageColor;

class Product extends Model
{
    /*public static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            $model->slug = str_slug($model->name);
        });
    }*/

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function attributes()
    {
        return $this->hasMany(ProductAttribute::class, 'product_id', 'id');
    }
    //return image color
    public function color()
    {
        return $this->hasMany(ImageColor::class, 'product_id', 'id');
    }

    public function colorBy($color)
    {
        return ImageColor::where([
            ['product_id', $this->k_id],
            ['color', $color]
        ])->first();
    }

    public function total()
    {
        //return $this->
    }
    public function getListImages(){
        
    }
}
