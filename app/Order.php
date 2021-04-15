<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
       'title', 'location', 'price','date', 'status', 'response',
    ];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }
    public function getCategoryOrder()
    {
        return $this->category->title;
    }
   
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function getUserOrder()
    {
        return $this->user->getName();
    }

}
