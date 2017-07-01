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
    
    public function manyToManyInsert()
    {
    	$dataForm = [1, 2, 3];//Id das cidades. [Vitória, Vila Velha, Guarapari]
    	
    	$company = Company::find(1);//Retorna a empresa Brandeb Agência Web
    	echo "<p><b>{$company->name}</b></p>";
    	
    	//attach() sempre adiciona mais registros.
    	//sync() apaga o que tem e registra o que eu quero inserir.
    	//detach() enquanto attach associa, detach desassocia.
    	
    	//Relaciona a Brandeb às cidades de Vitória, Vila Velha e Guarapari.
    	//$company->cities()->attach($dataForm);
    	//$company->cities()->sync($dataForm);//sync() sincroniza os dados. Não cadastrar repetidamente.
    	
    	$company->cities()->detach(2);//Desassocia Brandeb de Vila Velha.
    	
    	$cities = $company->cities;
    	foreach ($cities as $city)
    	{
    		echo " {$city->name}, ";
    	}
    	
    }
}
