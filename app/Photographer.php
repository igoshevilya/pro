<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photographer extends Model
{
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
