<?php

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

Route::get('/', function() {
    return view('layout.app');
});

Route::prefix('/auth')->group(function() {
    Route::get('/login', function() {
        return view('pages.auth.login');
    });
    Route::post('/login', [\App\Http\Controllers\AuthController::class, 'login']);
});

Route::prefix('/admin')->middleware([\App\Http\Middleware\Authenticate::class, \App\Http\Middleware\OnlyAdmin::class])->group(function() {
    Route::get('/', function() {
        $data = [
            'header' => 'Dashboard',
        ];
        return view('pages.admin.base', $data);
    });
    Route::prefix('/user')->group(function() {
        Route::get('/', function(){
            return view('pages.admin.user');
        });
        Route::post('/create', [\App\Http\Controllers\Admin\UserCreationController::class, 'createAdmin']);
    });
    Route::prefix('/teacher')->group(function() {
        Route::post('/create', [\App\Http\Controllers\Admin\UserCreationController::class, 'createTeacher']);
    });
    Route::prefix('/student')->group(function() {
        Route::post('/create', [\App\Http\Controllers\Admin\UserCreationController::class, 'createStudent']);
    });
    Route::prefix('/major')->group(function() {
        Route::post('/create', [\App\Http\Controllers\Admin\MajorController::class, 'create']);
    });
    Route::prefix('/classroom')->group(function() {
        Route::post('/create', [\App\Http\Controllers\Admin\MajorController::class, 'create']);
    });
});
