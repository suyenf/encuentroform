<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecordsController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('home', [HomeController::class, 'index'])->name('home');

Route::get('/', function () {
   return view('registro.create');
//    return view('welcome');
});

Route::get('records',[RecordsController::class,'index'])->name('records.index');
Route::get('records/create',[RecordsController::class,'create'])->name('records.create');
Route::get('records/{record}',[RecordsController::class,'show'])->name('records.show');
Route::post('records',[RecordsController::class,'store'])->name('records.store');
Route::get('records/{record}/edit',[RecordsController::class,'edit'])->name('records.edit');
Route::post('records/{record}/people',[RecordsController::class,'peopleStore'])->name('records.people.store');
Route::get('records/{record}/people/{person}',[RecordsController::class,'peopleDestroy'])->name('records.people.destroy');
Route::post('records/{record}/lock}',[RecordsController::class,'lock'])->name('records.lock');

Route::get('/records/pdf',[RecordsController::class,'pdf'])->name('records.pdf');
//Route::resource('/registrol',RecordsController::class);
//Route::resource('/registrol',RecordsController::class);
//Route::resource('/registrol',RecordsController::class);


//Route::resource('registro',RecordsController::class);


