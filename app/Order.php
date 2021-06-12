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
        return $this->belongsTo(Category::class);
    }
    public function getCategoryOrder()
    {
        return $this->category->title;
    }
   
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getUserOrder()
    {
        return $this->user->getName();
    }
    
    public function client()
    {
        return $this->belongsTo(User::class,'user_id', 'id');
            }

    public function avatar()
    {
        return $this->belongsTo(Avatar::class,'user_id', 'user_id');
    }

    public function responses()
    {
        return $this->hasOne(Response::class);
        
    }

    public function reviews()
    {
        return $this->hasOne(Review::class);
        
    }

    public function clientreviews()
    {
        return $this->hasOne(ClientReview::class);
        
    }
    

}
