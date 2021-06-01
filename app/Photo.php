<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    public function gallery() {
        return $this->belongsTo(Gallery::class);
    }

    public function users() {
        return $this->belongsTo(User::class);
    }
}
