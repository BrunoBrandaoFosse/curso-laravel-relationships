<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
	protected $fillable = ['name'];
	
    public function location()
    {
    	// hasOne(), define relacionamento um-para-um.
    	//return $this->hasOne(Location::class, 'country_id', 'id');
    	return $this->hasOne(Location::class);
    }
    
    public function states()
    {
    	//return $this->hasMany(State::class);
    	return $this->hasMany(State::class, 'country_id', 'id');
    }
    
    public function cities()
    {
    	//hasManyThrough(o_que_quero_pegar, através_de[intermediador])
    	return $this->hasManyThrough(City::class, State::class);
    }
    
    public function comments()
    {
    	return $this->morphMany(Comment::class, 'commentable');
    }
}
