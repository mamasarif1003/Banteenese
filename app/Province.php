<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    //
    protected $guarded = [];
    
    public function address()
    {
    	return $this->hasMany(Address::class);
    }
}
