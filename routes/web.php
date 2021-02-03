<?php

Route::prefix('admin')
       ->namespace('Admin') // que chama o controller
       ->group(function(){

     /**
      * Routes Details Plans
     */
    Route::get('plans/{url}/details','DetailPlanController@index')->name('details.plan.index');

    /** 
     * Routes Plan
    */
    Route::put('plans/{url}', 'PlanController@update')->name('plans.update');
    Route::any('plans/search','PlanController@search')->name('plans.search');
    Route::delete('plans/{url}', 'PlanController@destroy')->name('plans.destroy');
    Route::get('plans', 'PlanController@index')->name('plans.index');
    Route::get('plans/create', 'PlanController@create')->name('plans.create');
    Route::get('plans/{url}', 'PlanController@show')->name('plans.show');
    Route::post('plans', 'PlanController@store')->name('plans.store');    
    Route::get('plans/{url}/edit', 'PlanController@edit')->name('plans.edit');

    /**
     * Route Home Dashboard
     */
    Route::get('/', 'PlanController@index')->name('admin.index');
});

Route::get('/', function () {
    return view('welcome');
});