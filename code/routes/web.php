<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Home;
use App\Livewire\GoalLivewire;
use App\Livewire\UploadPhoto;
use Livewire\Volt\Volt;


Route::get("/",Home::class);
Route::get("/task/{id?}",GoalLivewire::class);

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
