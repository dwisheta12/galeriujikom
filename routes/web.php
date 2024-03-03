<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PinController;
use App\Http\Controllers\FotoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\ExploreController;
use App\Http\Controllers\UbahpasswordController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//view sebelum login

Route::middleware('guest')->group(function(){

    Route::get('/', [ViewController::class, 'index'])->name('index');
    Route::get('/login', [ViewController::class, 'sign_in']);
    Route::get('/register', [ViewController::class, 'sign_up']);

    //procces
    Route::post('/login', [UserController::class, 'login']);
    Route::post('/register', [UserController::class, 'register']);

});


Route::middleware('auth')->group(function(){

    //Tampilan setelah login
    Route::get('/explore', [ViewController::class, 'explore']);
    Route::get('/getDataExplore', [ExploreController::class, 'getdata']);
    Route::post('/likefotos', [ExploreController::class, 'likesfoto']);


    Route::get('/explore-detail/{id}', [ViewController::class, 'detail']);
    Route::get('/explore-detail/{id}/getdatadetail', [ExploreController::class, 'getdatadetail']);
    Route::get('/explore-detail/getComment/{id}', [ExploreController::class, 'ambildatakomentar']);
    Route::post('/explore-detail/kirimkomentar', [ExploreController::class, 'kirimkomentar']);


    Route::get('/other-pin/{id}', [ViewController::class, 'userlain']);
    Route::get('/other-pin/getDataPin/{id}', [PinController::class, 'getdatapin']);
    Route::get('/getdataotherpinexplore/', [PinController::class, 'getdata']);
    Route::get('/getdataotherpinexplore1/', [ProfilController::class, 'getdatapin']);
    Route::post('/likefotos', [PinController::class, 'likesfoto']);

    //upload
    Route::get('/upload', [ViewController::class, 'upload']);
    Route::post('/upload/store', [UploadController::class, 'storeFoto']);

    //profil saya
    Route::get('/profile', [ViewController::class, 'profile']);
    Route::get('/logout', [UserController::class, 'logout']);
    Route::get('/profilsaya/', [ProfilController::class,'getdatapin']);
    Route::get('/getdataprofile/', [ProfilController::class,'getdata']);
    Route::get('/ubahprofile',[ViewController::class,'editprofile']);
    Route::post('/update',[ProfilController::class,'update']);

    //ubah password
    Route::get('/ubahpassword', [ViewController::class, 'editpassword']);
    Route::post('up_password', [UbahpasswordController::class, 'up_password'])->name('up_password');

    //album
    Route::get('/album', [ViewController::class,'album']);
    Route::get('/buatalbum', [ViewController::class,'buatalbum']);
    Route::post('/buat-album', [AlbumController::class,'storeAlbum']);
    Route::get('/detailalbum/{id}', [AlbumController::class,'detail']);
    Route::get('/hapus/{id}', [FotoController::class,'hapuspostingan']);


});
