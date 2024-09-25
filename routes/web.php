<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\RecipesController;
use App\Http\Controllers\StepsController;
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

Route::get('/', function () {
    return redirect('/login');
});

Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'registerPost'])->name('register');
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginPost'])->name('login');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::prefix('recipes')->group(function () {
        Route::get('/', [RecipesController::class, 'showList'])->name('recipes');
        Route::get('/create', [RecipesController::class, 'create'])->name('recipes.create');
        Route::post('/create', [RecipesController::class, 'createPost'])->name('recipes.create');
        Route::get('/edit/{id}', [RecipesController::class, 'edit'])->name('recipes.edit');
        Route::post('/edit/{id}', [RecipesController::class, 'editPost'])->name('recipes.edit');
        Route::get('/delete/{id}', [RecipesController::class, 'delete'])->name('recipes.delete');
        Route::post('/delete/{id}', [RecipesController::class, 'deletePost'])->name('recipes.delete');
        Route::get('/{id}', [RecipesController::class, 'showOne'])->name('recipes.showOne');
    });
    
    Route::prefix('steps')->group(function () {
        Route::get('/create/{recipeId}', [StepsController::class, 'create'])->name('steps.create');
        Route::post('/create/{recipeId}', [StepsController::class, 'createPost'])->name('steps.create');
        Route::get('/edit/{id}', [StepsController::class, 'edit'])->name('steps.edit');
        Route::post('/edit/{id}', [StepsController::class, 'editPost'])->name('steps.edit');
        Route::get('/delete/{id}', [StepsController::class, 'delete'])->name('steps.delete');
        Route::post('/delete/{id}', [StepsController::class, 'deletePost'])->name('steps.delete');
    });
});
