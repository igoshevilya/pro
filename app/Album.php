<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    public function photos() {
        return $this->hasMany('App\Photo');
    }

    public function users() {
        return $this->belongsTo('App\User');
    }
}
