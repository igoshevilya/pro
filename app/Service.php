<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    public function users() {
        return $this->belongsTo(User::class);
    }
}
