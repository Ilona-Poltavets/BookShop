<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'author',
        'isbn',
        'price',
        'availability',
    ];

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function first_image_path() {
        $array=$this->images();
        $img=$array->first();
        return $img->path;
    }

    public function getImages(){
        $arr=$this->images()->getModels();
        return $arr;
    }

    public function baskets() {
        return $this->belongsToMany(Basket::class)->withPivot('quantity');
    }
}
