<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserCrudController;
use App\Http\Controllers\Admin\IndexController as AdminController;
use App\Http\Controllers\EloquentController;

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
Route::get('/hello', function () {
    return view('hello');
});

Route::get('/', [IndexController::class, 'index'])->name('index');

Route::get('/page/contact', function () {
    return view('pages.contact');
})->name('contact');

Route::get('/users/{id}', [UserController::class, 'show']);

Route::get('/users/bind/{user}', [UserController::class, 'showBind']);

Route::get('/bad', function () {
    return redirect('/good');
});

Route::get('/good', function () {
    return view('pages.good');
});

Route::resource('/users_crud', UserCrudController::class);

Auth::routes();

Route::group([
    'prefix' => 'dashboard',
    'namespace' => 'dashboard',
], function () {
    Route::get('admin',  [AdminController::class, 'index']);
    Route::post('admin/post',  [AdminController::class, 'post']);
});

Route::group([
    'middleware' => 'auth',
    'namespace' => 'security',
    'prefix' => 'security',
], function () {
    Route::get('admin/auth', [AdminController::class, 'auth']);
});


Route::get('/auth', [IndexController::class, 'auth']);

Route::get('/table', [IndexController::class, 'table']);

Route::group([
    'namespace' => 'eloquent',
    'prefix' => 'eloquent',
], function () {
    Route::get("/task2", [EloquentController::class, "task2"]);
    Route::get("/task3", [EloquentController::class, "task3"]);
    Route::get("/task4/{id}", [EloquentController::class, "task4"]);
    Route::post("/task5", [EloquentController::class, "task5"]);
    Route::post("/task6/{id}", [EloquentController::class, "task6"]);
    Route::delete("/task7", [EloquentController::class, "task7"]);
});

Route::post("/items", [IndexController::class, "items"]);
