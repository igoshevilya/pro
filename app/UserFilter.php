<?php

namespace App;

class UserFilter extends QueryFilter
{
     public function name($value)
    {
        $this->builder->where('first_name', 'like', "%$value%")->orWhere('last_name', 'like', "%$value%");;
    }
    public function city($value)
    {
        $this->builder->where('city', 'like', "%$value%");
    }
   

}
