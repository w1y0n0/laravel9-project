<?php

use App\Http\Controllers\SiswaController;
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

// 127.0.0.1:8000/ ==> view welcome
Route::get('/', function () {
    return view('welcome');
});

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
Route::get('siswa', [SiswaController::class, 'index']);
Route::get('siswa/{id}', [SiswaController::class, 'detail'])
    ->where('id', '[0-9]+');
