<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientReview extends Model
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
        return $this->belongsTo(Avatar::class,'photograph_id', 'user_id');
    }
    

    public function ordercabinet()
    {
        return $this->belongsTo(OrderCabinet::class);
    }
}
