<?php

use App\Http\Controllers\StockController;
use Illuminate\Support\Facades\Route;


// Redirects to the Stock Resource Controller
Route::get('/', function () {
    return redirect('/stocks');
});

Route::resource('stocks', StockController::class);
