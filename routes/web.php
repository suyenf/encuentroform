<?php

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

//Route::get('/', function () {
//    return view('welcome');
////});
//Route::get('/', function () {
//   return '';
Route::get('/', function () {
   return view('registro.create');
});
//Route::get('/registro', function () {
//    return view('registro.index');
//});
Route::get('records',[RecordsController::class,'index'])->name('records.index');
Route::get('records/create',[RecordsController::class,'create'])->name('records.create');
Route::post('records',[RecordsController::class,'store'])->name('records.store');
Route::get('records/{record}/edit',[RecordsController::class,'edit'])->name('records.edit');
Route::post('records/{record}/people',[RecordsController::class,'peopleStore'])->name('records.people.store');
//Route::get('records/create',[RecordsController::class,'create']);
//Route::get('records/create',[RecordsController::class,'create']);
//Route::get('records/create',[RecordsController::class,'create']);

//Route::resource('registro',RecordsController::class);
