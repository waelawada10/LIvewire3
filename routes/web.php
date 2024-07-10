<?php

use App\Livewire\ArrayForm;
use Illuminate\Support\Facades\Route;

use App\Livewire\Clicker;
use App\Livewire\Main;
use App\Livewire\RegisterForm;
use App\Livewire\TodoList;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/main', Main::class)->name('main');

Route::get('/clicker', Clicker::class)->name('clicker');
Route::get('/todo', TodoList::class)->name('todo');
Route::get('/registerForm', RegisterForm::class)->name('registerForm');
Route::get('/arrayForm', ArrayForm::class)->name('arrayForm');




