<?php

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
//     return view('welcome');
// });

use App\Http\Controllers\HomeController;
use App\Http\Controllers\SampleController;
use App\Http\Controllers\DaftarMagangController;

// SMTP EMAIL
Auth::routes([
    'verify'=> true
]);
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('home');
// Route::get('/tes', [SampleController::class, 'tes'])->name('tes');
Route::get('/tess', 'SampleController@index')->name('tes');
Route::resource('tes', 'tesController');
// Yajra sample
Route::get('/users','SampleController@index');
Route::get('/datatableuser','SampleController@getUsers');

Route::get('/logout', function (){
    \Auth::logout();
    return redirect('/home');
});
Route::group( ['middleware' => ['auth']], function() {
//    halamanutama
    Route::get('/halamanutama', 'DaftarMagangController@index');
    Route::get('/tabelutama', 'DaftarMagangController@halamanutama');
    Route::get('/datamagang', [DaftarMagangController::class, 'datamagang'])->name('datamagang');
    Route::Resource('/magang','DaftarMagangController');
//    tambah daftar mahasiswa
    Route::get('/tambahmagang', [DaftarMagangController::class, 'tambahmagang'])->name('tambahmagang');
    Route::post('/insertdata', [DaftarMagangController::class, 'insertdata'])->name('insertdata');
    //Route::get('/magang', [DaftarMagangController::class, 'magang'])->name('magang');
//    update mahasiswa magang
    Route::get('/tampilkandata/{id}', [DaftarMagangController::class, 'tampilkandata'])->name('tampilkandata');
    
    Route::post('/updatedata/{id}', [DaftarMagangController::class, 'updatedata'])->name('updatedata');
    Route::get('/deletedata/{id}', [DaftarMagangController::class, 'deletedata'])->name('deletedata');
    // routing di halaman selamat datang
    Route::get('/deleteakun/{id}', [DaftarMagangController::class, 'deleteakun'])->name('deleteakun');
    Route::get('/manageakun', 'DaftarMagangController@tabelakun');
    Route::get('/infoakun', 'DaftarMagangController@infoakun');
    // export pdf
    Route::get('/exportpdf', [DaftarMagangController::class, 'exportpdf'])->name('exportpdf');
    Route::get('/exportexcel', [DaftarMagangController::class, 'exportexcel'])->name('exportexcel');
    // ajax edit 
    Route::get('/editmodal/{id}', 'SampleController@editmodal');
    Route::post('/updateDataAkun', 'SampleController@update');
    Route::post('/deletedata', 'SampleController@deletedata');
    // ajax akun 
    Route::post('/deletedataakun', 'SampleController@deletedataakun');
    // nampilin foto
    // Route::get('/foto/{id}', [DaftarMagangController::class, 'foto'])->name('foto');
    // Route::Resource('/foto1','DaftarMagangController@foto');

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
