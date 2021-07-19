<?php

use App\Http\Livewire\Daftars;
use App\Models\Daftar;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('vaksin');
// });
Route::get('/',[App\Http\Controllers\VaksinController::class, 'index'])->name('index');
Route::post('/vaksin/daftar',[App\Http\Controllers\VaksinController::class, 'store'])->name('daftar');
Route::post('/vaksin/cari',[App\Http\Controllers\VaksinController::class, 'cari'])->name('cari');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/pendaftar', function(){
    return view('livewire.home');
})->middleware('auth')->name('password.confirm');
Route::get('/kuota', function(){
    return view('livewire.homekuota');
})->middleware('auth')->name('password.confirm');
// Route::get('daftars', Daftars::class)->name('pendaftar');
// Route::view('/pendaftar','livewire.home');