<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controller;

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

Route::group(['middleware' => ['auth','isAdmin']], function () {

    Route::get('/', [App\Http\Controllers\Admin\FrontendController::class, 'index']);
    Route::get('search', [App\Http\Controllers\Admin\FrontendController::class, 'search']);
    Route::get('routing/{id}', [App\Http\Controllers\Admin\FrontendController::class, 'routing']);


    //Chu tro
    Route::get('/chutro',[App\Http\Controllers\Admin\ChutroController::class, 'index']);
    Route::get('/add-chutro',[App\Http\Controllers\Admin\ChutroController::class, 'add']);
    Route::post('/insert-chutro',[App\Http\Controllers\Admin\ChutroController::class, 'insert']);
    Route::get('/edit-chutro/{id}',[App\Http\Controllers\Admin\ChutroController::class, 'edit']);
    Route::put('/update-chutro/{id}',[App\Http\Controllers\Admin\ChutroController::class, 'update']);
    Route::get('/del-chutro/{id}',[App\Http\Controllers\Admin\ChutroController::class, 'destroy']);

    //Khu tro
    Route::get('/khutro',[App\Http\Controllers\Admin\KhutroController::class, 'index']);
    Route::get('/add-khutro',[App\Http\Controllers\Admin\KhutroController::class, 'add']);
    Route::post('/insert-khutro',[App\Http\Controllers\Admin\KhutroController::class, 'insert']);
    Route::get('/edit-khutro/{id}',[App\Http\Controllers\Admin\KhutroController::class, 'edit']);
    Route::put('/update-khutro/{id}',[App\Http\Controllers\Admin\KhutroController::class, 'update']);
    Route::get('/del-khutro/{id}',[App\Http\Controllers\Admin\KhutroController::class, 'destroy']);

    //Loai phong
    Route::get('/loaiphong',[App\Http\Controllers\Admin\LoaiphongController::class, 'index']);
    Route::get('/add-loaiphong',[App\Http\Controllers\Admin\LoaiphongController::class, 'add']);
    Route::post('/insert-loaiphong',[App\Http\Controllers\Admin\LoaiphongController::class, 'insert']);
    Route::get('/edit-loaiphong/{id}',[App\Http\Controllers\Admin\LoaiphongController::class, 'edit']);
    Route::put('/update-loaiphong/{id}',[App\Http\Controllers\Admin\LoaiphongController::class, 'update']);
    Route::get('/del-loaiphong/{id}',[App\Http\Controllers\Admin\LoaiphongController::class, 'destroy']);

    //Phong
    Route::get('/phong',[App\Http\Controllers\Admin\PhongController::class, 'index']);
    Route::get('/add-phong',[App\Http\Controllers\Admin\PhongController::class, 'add']);
    Route::post('/insert-phong',[App\Http\Controllers\Admin\PhongController::class, 'insert']);
    Route::get('/edit-phong/{id}',[App\Http\Controllers\Admin\PhongController::class, 'edit']);
    Route::put('/update-phong/{id}',[App\Http\Controllers\Admin\PhongController::class, 'update']);
    Route::get('/del-phong/{id}',[App\Http\Controllers\Admin\PhongController::class, 'destroy']);

    //Truong
    Route::get('/truong',[App\Http\Controllers\Admin\TruongController::class, 'index']);
    Route::get('/add-truong',[App\Http\Controllers\Admin\TruongController::class, 'add']);
    Route::post('/insert-truong',[App\Http\Controllers\Admin\TruongController::class, 'insert']);
    Route::get('/edit-truong/{id}',[App\Http\Controllers\Admin\TruongController::class, 'edit']);
    Route::put('/update-truong/{id}',[App\Http\Controllers\Admin\TruongController::class, 'update']);
    Route::get('/del-truong/{id}',[App\Http\Controllers\Admin\TruongController::class, 'destroy']);
    
    //Khoang cach
    Route::get('/khoangcach',[App\Http\Controllers\Admin\KhoangcachController::class, 'index']);
    Route::get('/add-khoangcach',[App\Http\Controllers\Admin\KhoangcachController::class, 'add']);
    Route::post('/insert-khoangcach',[App\Http\Controllers\Admin\KhoangcachController::class, 'insert']);
    Route::get('/edit-khoangcach/{id}',[App\Http\Controllers\Admin\KhoangcachController::class, 'edit']);
    Route::put('/update-khoangcach/{id}',[App\Http\Controllers\Admin\KhoangcachController::class, 'update']);
    Route::get('/del-khoangcach/{id}',[App\Http\Controllers\Admin\KhoangcachController::class, 'destroy']);

});
