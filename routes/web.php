<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoticiasController;


Route::get('/', [NoticiasController::class, 'home']);
Route::resource('noticias', NoticiasController::class);