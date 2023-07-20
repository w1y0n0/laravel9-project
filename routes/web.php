<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\HalamanController;
use App\Http\Controllers\SessionController;

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

// 127.0.0.1:8000/ ==> view welcome
// Route::get('/', function () {
//     return view('welcome');
// });

// 127.0.0.1:8000/siswa
// Route::get('/siswa', function () {
//     return "<h1>Saya Siswa</h1>";
// });

// 127.0.0.1:8000/siswa/1
// Route::get('/siswa/{id}', function ($id) {
//     return "<h1>Saya Siswa dengan ID $id</h1>";
// })->where('id', '[0-9]+');

// Route::get('/siswa/{id}/{nama}', function ($id, $nama) {
//     return "<h1>Saya Siswa dengan ID $id dan $nama</h1>";
// })->where(['id' => '[0-9]+', 'nama' => '[A-Za-z]+']);

// Routing dari Controller
// Route::get('siswa', [SiswaController::class, 'index']);
// Route::get('siswa/{id}', [SiswaController::class, 'detail'])
//     ->where('id', '[0-9]+');

Route::get('/', [HalamanController::class, 'index']);
Route::get('/tentang', [HalamanController::class, 'tentang']);
Route::get('/kontak', [HalamanController::class, 'kontak']);

// Resource
Route::resource('siswa', SiswaController::class)->middleware('isLogin');

Route::get('/sesi', [SessionController::class, 'index'])->middleware('isGuest');
Route::post('/sesi/login', [SessionController::class, 'login'])->middleware('isGuest');
Route::get('/sesi/logout', [SessionController::class, 'logout']);
Route::get('/sesi/register', [SessionController::class, 'register'])->middleware('isGuest');
Route::post('/sesi/create', [SessionController::class, 'create'])->middleware('isGuest');
