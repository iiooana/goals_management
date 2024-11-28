<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Home;
use App\Livewire\GoalLivewire;
use Livewire\Volt\Volt;


Route::get("/",Home::class);
Route::get("/goal/{id?}",GoalLivewire::class);
/**
 * TESTS REGION
 */
//Volt::route('/counter','counter');
/*Route::get('/', function () {
    return view('welcome');
});*/
