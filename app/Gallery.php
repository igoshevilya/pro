<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    public function photos() {
        return $this->hasMany(Photo::class);
    }

    public function users() {
        return $this->belongsTo(User::class);
    }
}
