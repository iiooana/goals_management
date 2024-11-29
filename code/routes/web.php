<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Home;
use App\Livewire\Goal\GoalLivewire;
use App\Livewire\Goal\ShowGoals;

use App\Livewire\UploadPhoto;
use Livewire\Volt\Volt;


Route::get("/",Home::class);
Route::get("/task/{id?}",GoalLivewire::class);
Route::get("/tasks",ShowGoals::class);

/**
 * TESTS REGION
 */

/*
Volt::route('/counter','counter');
Route::get('/', function () {
    return view('welcome');
});
Route::get("/upload",UploadPhoto::class);
*/
