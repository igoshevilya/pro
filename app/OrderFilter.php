<?php

namespace App;

class OrderFilter extends QueryFilter
{
    
    public function title($value)
    {
        if (! $value) return;
        $this->builder->where('title', 'like', "%$value%");
    }

    public function pricemin($value)
    {
        if (! $value) return;
        $this->builder->where('price', '>=', $value);       
      
    }
    public function pricemax($value)
    {
        if (! $value) return;
        $this->builder->where('price', '<=', $value);       
      
    }

    public function location($value)
    {
        if (! $value) return;
        $this->builder->where('location', 'like', "%$value%");       
      
    }
    public function date($value)
    {
        if (!$value) return;
        $this->builder->where('date', '=',  $value);       
      
    }

    public function selectedCat($value)
    {    
        if (! $value) return;        
        $this->builder->whereHas('category', function ($query) use ($value) {
            $query->whereIn('id',  $value);
        });
    }

}
