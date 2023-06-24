<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::controller(EmployeeController::class)->group(function () {
    Route::get('/', 'index')->name('/');
    Route::post('import', 'import')->name('import');
    Route::get('export', 'export')->name('export');
    Route::get('chart', 'chart')->name('chart');
    Route::get('/dummy-data', function () {
        return ['value' => rand(0, 100)];
    })->name('dummy-data');
    Route::get('/pdf', [EmployeeController::class, 'exportPDF'])->name('generate-pdf');
});

require __DIR__ . '/auth.php';
