<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PortfolioController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [PortfolioController::class, 'index'])->name('home');

Route::match(['get', 'post'], 'login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::resource('portfolio', PortfolioController::class)->except([
    'index', 'show',
])->middleware('auth');

Route::middleware(['auth'])->group(function () {
    Route::get('/description/{id}', [PortfolioController::class, 'editDescription'])->name('intro');
    Route::put('/description', [PortfolioController::class, 'updateDescription'])->name('intro.update');

    Route::get('/personal_info/edit', [PortfolioController::class, 'editPersonalInfo'])->name('personal_info');
    Route::put('/personal_info', [PortfolioController::class, 'updatePersonalInfo'])->name('personal_info.update');

    Route::get('/hobbies/edit', [PortfolioController::class, 'editHobbies'])->name('hobbies');
    Route::post('/hobbies', [PortfolioController::class, 'updateHobbies'])->name('hobbies.update');

    Route::get('/likes_and_disikes/edit', [PortfolioController::class, 'editLikesAndDislikes'])->name('likes-dislikes');
    Route::post('/likes_and_dislikes', [PortfolioController::class, 'updateLikesAndDislikes'])->name('like-dislike.update');

    Route::get('/education/edit', [PortfolioController::class, 'editEducation'])->name('education');
    Route::match(['post', 'put'], '/education', [PortfolioController::class, 'updateEducation'])->name('education.update');

    Route::get('/edit/skill', [PortfolioController::class, 'editSkill'])->name('skill');
    Route::post('/edit', [PortfolioController::class, 'storeSkill'])->name('skill.store');
    Route::get('/delete/{id}', [PortfolioController::class, 'deleteSkill'])->name('skill.delete');
});
