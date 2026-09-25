<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExpenseController;
Route::get('/', function () {
    return view('welcome');
});
route::resource('Expenses', ExpenseController::class);
