<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('skills', function() {
    return ['Laravel', 'Vue', 'PHP', 'JavaScript'];
});

Route::get('/create', 'ProjectsController@create')->name('project.create');
Route::post('/projects', 'ProjectsController@store')->name('project.store');