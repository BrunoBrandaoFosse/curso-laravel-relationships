<?php

/**
 * One To One
 */
Route::get('/one-to-one', 'OneToOneController@oneToOne');
Route::get('/one-to-one-inverse', 'OneToOneController@oneToOneInverse');
Route::get('/one-to-one-insert', 'OneToOneController@oneToOneInsert');

/**
 * One To Many
 */
Route::get('/one-to-many', 'OneToManyController@oneToMany');
Route::get('/many-to-one', 'OneToManyController@manyToOne');
Route::get('/one-to-many-two', 'OneToManyController@oneToManyTwo');
Route::get('/one-to-many-insert', 'OneToManyController@oneToManyInsert');
Route::get('/one-to-many-insert-two', 'OneToManyController@oneToManyInsertTwo');

/**
 * Has Many Through
 */
Route::get('/has-many-through', 'HasManyThroughController@hasManyThrough');
