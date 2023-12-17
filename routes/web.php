<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\controllerUser;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Items\categoryController;
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

// });
// Route::get("/",[controllerUser::class,'dashboard']);
// Route::get("/",[controllerUser::class,'counter']);
Route::get("/", [Controller::class, 'index']);

Route::post("/Login", [Controller::class, 'Login']);

Route::group(['prefix' => 'User'], function () {

    Route::get("/index", [controllerUser::class, 'showdata'])->name('User.index');
    Route::get("/Create", [controllerUser::class, 'create']);
    Route::post("/Create", [controllerUser::class, 'store'])->name('User.submit');
    Route::get("/Active/{id}", [controllerUser::class, 'active']);
});

// =====================category and product===================//
Route::group(['prefix' => 'Items'], function () 
{
    Route::get("/Category/index", [categoryController::class, 'index'])->name('category.index');
});

