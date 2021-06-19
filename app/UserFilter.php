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
    public function selectedCat($value)
    {    
        if (! $value) return;

        $this->builder->whereHas('photographer', function ($query) use ($value) {
            $query->where('dopspec', 'like', "%$value%");
        });
    }
    public function pricemin($value)
    {
        if (! $value) return;

        $this->builder->whereHas('photographer', function ($query) use ($value) {
            $query->where('price', '>=', $value);
        });

     
    }
    public function pricemax($value)
    {
        if (! $value) return;

        $this->builder->whereHas('photographer', function ($query) use ($value) {
            $query->where('price', '<=', $value);
        });    
      
    }
 
    
    

}
