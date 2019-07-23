<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Category extends Model
{
	/*public static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            $model->slug = str_slug($model->name);
        });
    }*/

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id', 'k_id');
    }

    public function parent()
    {
        return $this->belongsTo(Category::class, 'k_id', 'parent_id');
    }

    public function kparent()
    {
        return $this->belongsTo(Category::class, 'id', 'k_id');
    }
    public function products()
    {
        return $this->hasMany(Product::class, 'category_id','k_id');
    }

}
