<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Home;
use App\Livewire\Goal\GoalLivewire;
use App\Livewire\Goal\ShowGoals;
use App\Livewire\Subject\SubjectShow;
use App\Livewire\Subject\SubjectEdit;

use App\Livewire\UploadPhoto;
use Livewire\Volt\Volt;


Route::get("/",Home::class);

Route::get("/task/{id?}",GoalLivewire::class);
Route::get("/tasks",ShowGoals::class);

Route::get("/subjects",SubjectShow::class);
Route::get("/subject/{id?}",SubjectEdit::class);
Route::get("/subject/{id}/add-question",SubjectEdit::class);

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
