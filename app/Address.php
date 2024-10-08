<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    //
    protected $table = 'addresses';
    
    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function province()
    {
    	return $this->belongsTo(Province::class);
    }

    public function city()
    {
    	return $this->belongsTo(City::class);
    }
}
