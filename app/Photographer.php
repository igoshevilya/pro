<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photographer extends Model
{
    
    function declension($number, array $data)
{
    
    $rest = [$number % 10, $number % 100];
    
   if($rest[1] > 10 && $rest[1] < 20) {
        return $data[2];
    } elseif ($rest[0] > 1 && $rest[0] < 5) {
        return $data[1];
    } else if ($rest[0] == 1) {
        return $data[0];
    }
    
    return $data[2];
}

}
