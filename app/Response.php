<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    use Notifiable;

    public function order()
    {
        return $this->belongsTo(Order::class);
      
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function OrderCabinet()
    {
        return $this->hasOne(OrderCabinet::class);
    }
    public function getUserResponse()
    {
        return $this->user->getName();
    }
   


}
