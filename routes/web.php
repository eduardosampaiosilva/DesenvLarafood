<?php

Route::prefix('admin')
       ->namespace('Admin') // que chama o controller
       ->group(function(){

     /**
      * Routes para Profile, usando o resource é usado mais para api mas é uma técnia para ser aprendida é mais enxuta
     */
        
     Route::resource('profiles','ACL\ProfileController');
     
     /**
      * Routes Details Plans
     */    
    Route::delete('plans/{url}/details/{idDetail}','DetailPlanController@destroy')->name('details.plan.destroy');    
    Route::put('plans/{url}/details/{idDetail}','DetailPlanController@update')->name('details.plan.update');
    Route::get('plans/{url}/details/{idDetail}/edit','DetailPlanController@edit')->name('details.plan.edit');
    Route::get('plans/{url}/details','DetailPlanController@index')->name('details.plan.index');
    Route::get('plans/{url}/details/create','DetailPlanController@create')->name('details.plan.create');
    Route::get('plans/{url}/details/{idDetail}','DetailPlanController@show')->name('details.plan.show');
    Route::post('plans/{url}/details','DetailPlanController@store')->name('details.plan.store');

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