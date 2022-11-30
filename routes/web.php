<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KendaraanController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|s
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/index', function (){
	return 'welcome';
});

// Route::get('/Dashboard', function() {
// 	return view('Dashboard');
// });

// Route::view('/Dashboard','Dashboard');

// Route::get('/Dashboard', function () {
//     return view('Dashboard',[
//     	'name' => 'pengguna',
//     	'role' => 'admin',
//     ]);
// });

// driver
Route::resource('driver', DriverController::class);
Route::get('driver', 'DriverController@index');
Route::delete('driver/{id}', 'DriverController@destroy');

// pengajuan kendaraan
Route::resource('pengajuankendaraan', PengajuanKendaraanController::class);
Route::get('pengajuankendaraan', 'PengajuanKendaraanController@index');
Route::get('pengajuankendaraan/{id}', 'PengajuanKendaraanController@getById');
Route::delete('pengajuankendaraan/{id}', 'PengajuanKendaraanController@destroy');

// kendaraan
Route::resource('kendaraan', KendaraanController::class);
Route::get('kendaraan', 'KendaraanController@getAll');
Route::get('kendaraan/{id}', 'KendaraanController@getById');
Route::delete('kendaraan/{id}', 'KendaraanController@destroy');

// atasan
Route::post('atasan', 'AtasanController@store');
Route::get('atasan', 'AtasanController@getAll');
Route::get('atasan/{id}', 'AtasanController@getById');
Route::delete('atasan/{id}', 'AtasanController@destroy');

// pegawai
Route::resource('pegawai', PegawaiController::class);
Route::get('pegawai', 'PegawaiController@index');
Route::delete('pegawai/{id}', 'PegawaiController@destroy');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();
Route::middleware(['auth', 'user-access:user'])->group(function ()
{
    Route::get('/home', [HomeController::class , 'index'])
        ->name('home');
}); 
Route::middleware(['auth', 'user-access:pegawai'])->group(function ()
{
    Route::get('/pegawai/home', [HomeController::class , 'pegawaiHome'])
        ->name('pegawai.home');
}); 
Route::middleware(['auth', 'user-access:atasan'])->group(function ()
{
    Route::get('/atasan/home', [HomeController::class , 'atasanHome'])
        ->name('atasan.home');
});