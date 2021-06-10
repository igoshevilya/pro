<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    public function photograph()
    {
        return $this->belongsTo(User::class,'photograph_id', 'id');
    }

    public function client()
    {
        return $this->belongsTo(User::class,'client_id', 'id');
    }
    public function avatar()
    {
        return $this->belongsTo(Avatar::class,'client_id', 'user_id');
    }
    

    public function ordercabinet()
    {
        return $this->belongsTo(OrderCabinet::class);
    }

}
