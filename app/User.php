<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
class User extends Authenticatable
{
    
    use HasRoles, Notifiable;

   
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user', 'email','first_name', 'last_name','city', 'password','dr', 'phone',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function username(){
        return $this->first_name;
    }
    
    public function getName() 
    {
        if ($this->first_name && $this->last_name) 
        {
            return "{$this->first_name} {$this->last_name}";
        }
    
        if ($this->first_name) return $this->first_name;
    
        return null;
    }
    public function photographer(){
        return $this->hasOne(Photographer::class, 'user_id', 'id');
    }
    
    public function userprofile(){
        return $this->hasOne(Userprofile::class);
    }
    
    public function avatar(){
        return $this->hasOne(Avatar::class);
    }
    public function gallery() {
        return $this->hasMany(Gallery::class);
    }
    
    public function photos() {
        return $this->hasMany(Photo::class);
    }
    public function service() {
        return $this->hasMany(Service::class);
    }
    public function orders() {
        return $this->hasMany(Order::class);
    }
    public function ordercabinet() {
        return $this->hasMany(Ordercabinet::class,'client_id', 'id');
    }
       public function response() {
        return $this->hasMany(Response::class, 'user_id', 'id');
    }
    public function review() {
        return $this->hasMany(ClientReview::class,'client_id','id');
        
    }
    public function reviews() {
        return $this->hasMany(Review::class,'photograph_id','id');
        
    }
    protected $appends = ['rating_count','count_order','phone_user','info_user'];

    public function getRatingCountAttribute()
    {
        return $this->reviews->avg('star');
     
    }
  
    public function getCountOrderAttribute()
    {
       return $this->response->where("status", "=", 2)->count();
    }

    public function getPhoneUserAttribute()
    
    {
           return $this->userprofile;
    }

    public function getInfoUserAttribute()
    
    {
           return $this->photographer;
    }


    public function scopeFilter($builder, $filters)
    {
        return $filters->apply($builder);
    }
  
   
 
    public function ExperienceUser()
    {
        if(!empty($this->photographer->experience)){
        $number = (date ( 'Y' ) - $this->photographer->experience);
        function declension($number, array $data)
            {
            $rest = array($number % 10, $number % 100);
            
            if($rest[1] > 10 && $rest[1] < 20) {
            return $data[2];
            } elseif ($rest[0] > 1 && $rest[0] < 5) {
            return $data[1];
            } else if ($rest[0] == 1) {
            return $data[0];
            }
            
            return $data[2];
            }
          
            $experiences = declension($number, array('год', 'года', 'лет'));   
            return  $number . ' ' . $experiences;}
    }
    
}
