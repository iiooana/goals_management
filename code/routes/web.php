<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Home;
use App\Livewire\GoalLivewire;

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get("/",Home::class);
Route::get("/goal/{id?}",GoalLivewire::class);