<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\State;

class PolymorphicsController extends Controller
{
    public function polymorphic()
    {
    	$city = City::where('name', 'Vitória')->get()->first();
    	echo "<p><b>{$city->name}</b></p><hr>";
    	
    	$comments = $city->comments()->get();
    	
    	foreach ($comments as $comment)
    	{
    		echo "<p>{$comment->description}</p>";
    	}
    }
    
    /**
     * Cadastrar novo comentário.
     */
    public function polymorphicInsert()
    {
    	$state = State::where('initials', 'ES')->get()->first();
    	echo $state->name;
    	
    	$comment = $state->comments()->create([
    			'description' => "New comment {$state->name}".date("d:m:Y H:i:s"),
    	]);
    	dump($comment->description);
    	
    	/*
    	$city = City::where('name', 'Vitória')->get()->first();
    	echo $city->name;
    	
    	$comment = $city->comments()->create([
    			'description' => "New comment {$city->name}".date("d:m:Y H:i:s"),
    	]);
    	dump($comment);
    	*/
    }
}
