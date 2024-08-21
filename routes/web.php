<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MyAjax;

use App\Livewire\Dashboard;
use App\Livewire\Clicker;
use App\Livewire\Main;
use App\Livewire\RegisterForm;
use App\Livewire\TodoList;
use App\Livewire\ArrayForm;


Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::get('/myAjax', [MyAjax::class, 'view'])->name('myAjax');
Route::post('/myAjax', [MyAjax::class, 'submitForm'])->name('submitForm');

Route::get('/dashboard', Dashboard::class)->name('dashboard');
Route::get('/main', Main::class)->name('main');

Route::get('/clicker', Clicker::class)->name('clicker');
Route::get('/todo', TodoList::class)->name('todo');
Route::get('/registerForm', RegisterForm::class)->name('registerForm');
Route::get('/arrayForm', ArrayForm::class)->name('arrayForm');
