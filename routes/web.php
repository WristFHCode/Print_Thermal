<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PrinterController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/print-receipt', [PrinterController::class, 'printReceipt']);
