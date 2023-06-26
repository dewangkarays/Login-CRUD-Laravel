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

use App\Http\Controllers\DaftarMagangController;
use App\Http\Controllers\HomeController;
// SMTP EMAIL
Auth::routes([
    'verify'=> true
]);
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/logout', function (){
    \Auth::logout();
    return redirect('/home');
});
Route::get('/halamanutama', [DaftarMagangController::class, 'halamanutama'])->name('halamanutama');
Route::get('/datamagang', [DaftarMagangController::class, 'datamagang'])->name('datamagang');
Route::Resource('/magang','DaftarMagangController');
Route::get('/tambahmagang', [DaftarMagangController::class, 'tambahmagang'])->name('tambahmagang');
Route::post('/insertdata', [DaftarMagangController::class, 'insertdata'])->name('insertdata');
//Route::get('/magang', [DaftarMagangController::class, 'magang'])->name('magang');
Route::get('/tampilkandata/{id}', [DaftarMagangController::class, 'tampilkandata'])->name('tampilkandata');
Route::post('/updatedata/{id}', [DaftarMagangController::class, 'updatedata'])->name('updatedata');
Route::get('/deletedata/{id}', [DaftarMagangController::class, 'deletedata'])->name('deletedata');
// export pdf
Route::get('/exportpdf', [DaftarMagangController::class, 'exportpdf'])->name('exportpdf');
Route::get('/exportexcel', [DaftarMagangController::class, 'exportexcel'])->name('exportexcel');
