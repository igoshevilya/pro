<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderCabinet extends Model
{
    public function order()
    {
        return $this->belongsTo(Order::class);
      
    }
    public function responses()
    {
        return $this->belongsTo(Response::class);
      
    }

    public function photograph()
    {
        return $this->belongsTo(User::class,'photograph_id');
    }

    public function client()
    {
        return $this->belongsTo(User::class,'client_id');
    }
   




    
}
