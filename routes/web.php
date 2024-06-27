<?php

use Illuminate\Support\Facades\Route;

use App\Livewire\Clicker;
use App\Livewire\Main;
use App\Livewire\TodoList;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/main', Main::class)->name('main');

Route::get('/clicker', Clicker::class)->name('clicker');
Route::get('/todo', TodoList::class)->name('todo');



