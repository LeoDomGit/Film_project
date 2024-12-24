<?php

use App\Http\Controllers\FilmController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/phim_moi',[FilmController::class,'film_moi']);
Route::get('/danh_muc/{id}',[FilmController::class,'film_theo_danh_muc']);
Route::get('/phim/{id}',[FilmController::class,'film']);
Route::get('/phim_the_loai/{id}',[FilmController::class,'film_the_loai']);
Route::get('/phim_quoc_gia/{id}',[FilmController::class,'film_theo_quoc_gia']);
Route::get('/phim_theo_nam/{id}',[FilmController::class,'film_theo_nam']);
Route::get('/tim_kiem_phim/{id}',[FilmController::class,'tim_kiem']);






