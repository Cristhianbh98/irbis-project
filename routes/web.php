<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CsvImportController;

//Route::get('/', function () {
//    return view('welcome');
//    });
Route::post('/import-csv', [CsvImportController::class, 'import'])->name('import.csv');
Route::get('/import-csv-form', function () {
    return view('import_csv');
});
