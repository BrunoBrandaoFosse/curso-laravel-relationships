<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public function companies()
    {
    	//se a tabela chamasse city_company não precisaria passar esse dado logo abaixo.
    	return $this->belongsToMany(Company::class, 'company_city');
    }
    
    public function comments()
    {
    	return $this->morphMany(Comment::class, 'commentable');
    }
}
