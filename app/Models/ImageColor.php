<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Size;

class ImageColor extends Model
{
    public $timestamps = false;
    //
    public function size(){
        return $this->hasMany(Size::class, 'image_color_id', 'id');
    }
    public function sizeBy($size){
        return Size::where([
            ['image_color_id', $this->id],
            ['size', $size]
        ])->first();
    }
}
