<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Company;

class ManyToManyController extends Controller
{
	/**
	 * As empresas que contém nesta cidade.
	 */
    public function manyToMany()
    {
    	$city = City::where('name', 'Vitória')->get()->first();
    	echo "<p><b>{$city->name}</b></p><hr>";
    	
    	$companies = $city->companies;
    	
    	echo "<p><b>Empresas: </b>";
    	foreach ($companies as $company)
    	{
    		echo " {$company->name},";
    	}
    	echo "</p>";
    }
    
    /**
     * As cidades que contém esta empresa.
     */
    public function manyToManyInverse()
    {
    	$company = Company::where('name', 'LIKE', '%Brandeb%')->get()->first();
    	
    	echo $company->name."<hr>";
    	
    	$cities = $company->cities;
    	foreach ($cities as $city)
    	{
    		echo " {$city->name},";
    	}
    	
    }
}

