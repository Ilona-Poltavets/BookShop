<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $fillable=[
        'category_id',
        'publisher_id',
        'genre_id',
        'start_date_by_utc',
        'end_date_by_utc',
    ];
}
