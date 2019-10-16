<?php

namespace App\Helpers;

use Carbon\Carbon;

class DocumentNumber
{
    static function setNumber($count) {
        $date = Carbon::now()->format('Y/m');

        if($count < 10){
            $number = '00000' . $count; // 000005
        }elseif($count > 10 && $count < 100){
            $number = '0000' . $count;  // 000057
        }elseif($count > 100 && $count < 1000){
            $number = '000' . $count;   // 000512
        }elseif($count > 1000 && $count < 10000){
            $number = '00' . $count;    // 004574
        }elseif($count > 10000 && $count < 100000){
            $number = '0' . $count;     // 054789
        }else{
            $number = $count;
        }
        
        $doc_number = $date . '/' . substr($number, strlen($number - 1));

        return $doc_number;
    }

    public static function generate($prefix, $count, $suffix = '') {
        return $prefix . self::setNumber($count) . $suffix;
    }
}
