<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Location;

class OneToOneController extends Controller
{
    public function oneToOne()
    {
    	//$country = Country::find(1);
    	//get() retorna um array, então, tenho que usar first(). First() traz o primeiro.
    	$country = Country::where('name', 'Brasil')->get()->first();
    	
    	echo "País: {$country->name}";
    	// Pegar localização em forma de atributo
    	//$location = $country->location;
    	// Pegar localização em forma de Método
    	$location = $country->location()->get()->first();
    	
    	echo "<p><b>Latitude: </b> {$location->latitude}</p>";
    	echo "<p><b>Longitude: </b> {$location->longitude}</p>";
    	
    }
    
    public function oneToOneInverse()
    {
    	$latitude = 123;
    	$longitude = 321;
    	
    	$location = Location::where('latitude', $latitude)->where('longitude', $longitude)->get()->first();
    	
    	$country = $location->country;
    	
    	echo "País: {$country->name}";//Não pegou o nome do país
    	
    	echo "<p><b>Id: </b> {$location->id}</p>";
    	echo "<p><b>Longitude: </b> {$location->longitude}</p>";
    	echo "<p><b>Longitude: </b> {$location->longitude}</p>";
    }
    
    public function oneToOneInsert()
    {
    	$dataForm = [
    			'name' => 'França',
    			'latitude' => '789',
    			'longitude' => '987',
    	];
    	
    	$seak = Country::where('name', $dataForm['name'])->get()->first();
    	if (is_null($seak))//Se país não está cadastrado, então, cadastra.
    	{
    		// Só pega name porque eu defini na minha fillable
    		$country = Country::create($dataForm);
    		
    		$dataForm['country_id'] = $country->id;
    		$location = Location::create($dataForm);
    		
    		return ($location) ? 'Cadastrado com Sucesso' : 'Erro ao Cadastrar';
    		
    	} else {
    		return "{$seak->name} já está na lista.";
    	}
    }
}
