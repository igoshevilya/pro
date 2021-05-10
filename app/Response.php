<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    public function order()
    {
        return $this->belongsTo('App\Order');
      
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function getUserResponse()
    {
        return $this->user->getName();
    }
}
