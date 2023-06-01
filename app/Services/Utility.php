<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class Utility
{
    static function slugify($string){
        $text=strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $string), '-'));
        return $text;
    }

    static function averageRaitingBookInProcent($book_id){
        $rates = DB::table('rates')->where('book_id','=',$book_id)->get();

        $count = count($rates);
        $sum=0;

        foreach ($rates as $rate) {
            $sum+=$rate->rate;
        }

        $avg=$sum/$count;

        return ($avg*100)/5;
    }
}
