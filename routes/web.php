<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ComicController;

// Route per la home
Route::get('/', function () {
    return view('home'); // Ritorna la vista 'home.blade.php'
});

// Routes per il CRUD dei fumetti
Route::resource('comics', ComicController::class);


