<?php

namespace App\Http\Controllers;


use App\Models\Country;
use App\Models\State;

class OneToManyController extends Controller
{
    public function oneToMany()
    {
    	// Listar todos os estados do país Brasil.
    	//$country = Country::where('name', 'Brasil')->get()->first();
    	
    	//Caso eu queira retornar mais de um país.
    	$keySearch = 'a';
    	//with(tabela), relaciona os estados que está relacionado a um país.
    	$countries = Country::where('name', 'LIKE', "%{$keySearch}%")->with('states')->get();//retorna array
    	//Com with(tabela), você melhora a perfomance do seu sistema.
    	//Com with() você apenas uma consulta ao banco ao invés de n-consultas.
    	
    	foreach ($countries as $country)
    	{
    		echo "<b>{$country->name}</b>";
    		
    		//$states = $country->states()->where('initials', 'ES')->get();
    		//$states = $country->states()->get();
    		$states = $country->states;
    		
    		foreach ($states as $state)
    		{
    			echo "<br>{$state->initials} - {$state->name}";
    		}
    		echo "<hr>";
    	}
    }
    
    public function manyToOne()
    {
    	$UFState = 'ES';
    	$state = State::where('initials', $UFState)->get()->first();
    	
    	$country = $state->country;
    	
    	echo "<b>País:</b> {$country->name}";
    	echo "<br><b>Estado:</b> {$state->name}";
    }
    
    public function oneToManyTwo()
    {
    	$keySearch = 'a';
    	$countries = Country::where('name', 'LIKE', "%{$keySearch}%")->with('states')->get();
    	foreach ($countries as $country)
    	{
    		echo "<b>{$country->name}</b>";
    		$states = $country->states;
    		foreach ($states as $state)
    		{
    			echo "<br>{$state->initials} - {$state->name}: ";
    			$cities = $state->cities;
    			foreach ($cities as $city)
    			{
    				echo "{$city->name}, ";
    			}
    		}
    		echo "<hr>";
    	}
    }
    
    public function oneToManyInsert()
    {
    	$dataForm = ['name' => 'Ceará', 'initials' => 'CE'];
    	
    	$country = Country::find(1);//Brasil
    	
    	//Cadastrar estado no país Brasil.
    	$insertState = $country->states()->create($dataForm);
    	dd($insertState);
    }
    
    public function oneToManyInsertTwo()
    {
    	$dataForm = ['name' => 'Amazonas', 'initials' => 'AM', 'country_id' => '1'];
    	
    	$insertState = State::create($dataForm);
    	
    	dump($insertState);
    }
}
