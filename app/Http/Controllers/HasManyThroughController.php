<?php

namespace App\Http\Controllers;

use App\Models\Country;

class HasManyThroughController extends Controller
{
    public function hasManyThrough()
    {
    	$country = Country::where('name', 'Brasil')->get()->first();
    	
    	echo "<p style='text-transform:uppercase;font-size:36px;'>{$country->name}</p>";
    	
    	$cities = $country->cities;//Pegar as cidades direto
    	
    	echo "<b>Cidades:</b>";
    	foreach ($cities as $city)
    	{
    		echo " {$city->name}, ";
    	}
    	echo "<p><b>Total Cidades:</b> {$cities->count()}</p>";
    }
}
