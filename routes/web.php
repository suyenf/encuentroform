<?php

use App\Http\Controllers\EventController;
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

//Route::get('records',[RecordsController::class,'index'])->name('records.index');
Route::get('records',[RecordsController::class,'create'])->name('records.create');
Route::get('records/create',[RecordsController::class,'create'])->name('records.create');
Route::get('records/{record}',[RecordsController::class,'show'])->name('records.show');
Route::post('records',[RecordsController::class,'store'])->name('records.store');
Route::get('records/{record}/edit',[RecordsController::class,'edit'])->name('records.edit');
Route::post('records/{record}/people',[RecordsController::class,'peopleStore'])->name('records.people.store');
Route::get('records/{record}/people/{person}',[RecordsController::class,'peopleDestroy'])->name('records.people.destroy');
Route::post('records/{record}/lock}',[RecordsController::class,'lock'])->name('records.lock');
Route::get('events/create',[EventController::class,'create'])->name('event.create');
Route::post('events',[EventController::class,'store'])->name('event.store');
Route::get('events/list',[EventController::class,'listevent'])->name('event.listevent');
Route::get('events/{event}',[EventController::class,'destroy'])->name('event.destroy');
Route::get('events/{event}/edit',[EventController::class,'edit'])->name('event.edit');



Route::get('/records/pdf',[RecordsController::class,'pdf'])->name('records.pdf');
//Route::resource('/registrol',RecordsController::class);
//Route::resource('/registrol',RecordsController::class);
//Route::resource('/registrol',RecordsController::class);


//Route::resource('registro',RecordsController::class);


