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

Route::get('list/adults',[HomeController::class,'adultslist'])->name('records.adults');
Route::get('list/adults/pdf',[HomeController::class,'adultspdf'])->name('pdf.adults');

Route::get('list/boys',[HomeController::class,'boyslist'])->name('records.boys');
Route::get('list/boys/pdf',[HomeController::class,'boyspdf'])->name('pdf.boys');

Route::get('list/girls',[HomeController::class,'girlslist'])->name('records.girls');
Route::get('list/girls/pdf',[HomeController::class,'girlspdf'])->name('pdf.girls');

Route::get('list/total',[HomeController::class,'totallist'])->name('records.total');
Route::get('list/total/pdf',[HomeController::class,'pdf'])->name('pdf.list');


Route::get('/', [RecordsController::class,'create']); // http://localhost[/]

//Route::get('records',[RecordsController::class,'index'])->name('records.index');
Route::get('records',[RecordsController::class,'create'])->name('records.create');// http://localhost[/records]
Route::get('records/create',[RecordsController::class,'create'])->name('records.create'); // http://localhost[/records/create]
Route::get('records',[RecordsController::class,'create'])->name('records.create');
Route::get('records/create',[RecordsController::class,'create'])->name('records.create');
Route::get('records/{record}',[RecordsController::class,'show'])->name('records.show');
Route::post('records',[RecordsController::class,'store'])->name('records.store');
Route::get('records/{record}/edit',[RecordsController::class,'edit'])->name('records.edit');
Route::post('records/{record}/people',[RecordsController::class,'peopleStore'])->name('records.people.store');
Route::get('records/{record}/people/{person}',[RecordsController::class,'peopleDestroy'])->name('records.people.destroy');
Route::post('records/{record}/lock}',[RecordsController::class,'lock'])->name('records.lock');

//Route::get('records',[RecordsController::class,'counting'])->name('records.counting');

Route::get('events/create',[EventController::class,'create'])->name('event.create');
Route::post('events',[EventController::class,'store'])->name('event.store');
//Route::get('events/list',[EventController::class,'listevent'])->name('event.listevent');
Route::get('events/show',[EventController::class,'showevent'])->name('event.showev');
Route::get('events/{event}',[EventController::class,'destroy'])->name('event.destroy');
Route::get('events/{event}/edit',[EventController::class,'edit'])->name('event.edit');
Route::post('events/{event}/update',[EventController::class,'update'])->name('event.update');
Route::get('events/create',[EventController::class,'create'])->name('event.create');
Route::post('events',[EventController::class,'store'])->name('event.store');
Route::get('events/list',[EventController::class,'listevent'])->name('event.listevent');
Route::get('events/{event}',[EventController::class,'destroy'])->name('event.destroy');
Route::get('events/{event}/edit',[EventController::class,'edit'])->name('event.edit');

//Route::resource('registro',RecordsController::class);


