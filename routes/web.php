<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;


Route::get('/login', [LoginController::class, 'Login'])->name('login');
Route::post('/loginStore', [LoginController::class, 'LoginStore'])->name('loginstore');
Route::get('/signup', [LoginController::class, 'Signup'])->name('signup');

Route::post('/signupStore', [LoginController::class, 'SignupStore'])->name('signupStore');

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('upgrade', [HomeController::class, 'Upgrade'])->name('upgrade');
Route::get('public_links', [HomeController::class, 'PublicLinks'])->name('public_links');
Route::get('savedInfo', [HomeController::class, 'SavedInfo'])->name('savedInfo');
Route::get('explore_gem', [HomeController::class, 'ExploreGem'])->name('explore_gem');
Route::get('new_gem', [HomeController::class, 'NewGem'])->name('new_gem');
Route::get('career_guide', [HomeController::class, 'CareerGuide'])->name('career_guide');
Route::get('chess_champ', [HomeController::class, 'chessChamp'])->name('chess_champ');
Route::get('brainstormer', [HomeController::class, 'brainstomer'])->name('brainstormer');
Route::get('coding_partner', [HomeController::class, 'codingPartner'])->name('coding_partner');
Route::get('learning_coach', [HomeController::class, 'learningCoach'])->name('learning_coach');
Route::get('writingEditor', [HomeController::class, 'writingEditor'])->name('writingEditor');


Route::post('new_gemStore', [HomeController::class, 'NewGemStore'])->name('new_gemStore');
Route::post('updateGem/{id}', [HomeController::class, 'updateGem']);
Route::get('gemJson', [HomeController::class, 'gemJson'])->name('gemJson');
Route::get('/get_gem/{id}', [HomeController::class, 'getGemById']);