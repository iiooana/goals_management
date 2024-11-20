<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Home;
use App\Livewire\Goal;

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get("/",Home::class);
Route::get("/new",Goal::class)->name('new_goal');