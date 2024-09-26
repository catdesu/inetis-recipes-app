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

        Route::middleware('recipe.owner')->group(function () {
            Route::get('/edit/{id}', [RecipesController::class, 'edit']);
            Route::post('/edit/{id}', [RecipesController::class, 'editPost']);
            Route::get('/delete/{id}', [RecipesController::class, 'delete']);
            Route::post('/delete/{id}', [RecipesController::class, 'deletePost']);
            Route::get('/{id}', [RecipesController::class, 'showOne']);
        });
    });

    Route::prefix('steps')->group(function () {
        Route::middleware('recipe.owner')->group(function () {
            Route::get('/create/{id}', [StepsController::class, 'create']);
            Route::post('/create/{id}', [StepsController::class, 'createPost']);
        });

        Route::middleware('step.owner')->group(function () {
            Route::get('/edit/{id}', [StepsController::class, 'edit']);
            Route::post('/edit/{id}', [StepsController::class, 'editPost']);
            Route::get('/delete/{id}', [StepsController::class, 'delete']);
            Route::post('/delete/{id}', [StepsController::class, 'deletePost']);
        });
    });
});
