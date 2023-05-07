<?php

declare(strict_types=1);

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
		return view('pages.admin.create_student');
	});
	Route::prefix('/admin')->group(function() {
		Route::get('/', fn() => view('pages.admin.admin'));
		Route::post('/create', [\App\Http\Controllers\Admin\UserCreationController::class, 'createAdmin']);
		Route::get('/create', fn() => view('pages.admin.create_admin'));
	});
	Route::prefix('/teacher')->group(function() {
		Route::get('/', fn() => view('pages.admin.teacher'));
		Route::post('/create', [\App\Http\Controllers\Admin\UserCreationController::class, 'createTeacher']);
		Route::get('/create', fn() => view('pages.admin.create_teacher'));
		Route::get('/edit/{teacher}', fn($teacher) => view('pages.admin.edit_student', ['teacher' => $teacher]));
	});
	Route::prefix('/student')->group(function() {
		Route::get('/', fn() => view('pages.admin.student'));
		Route::post('/create', [\App\Http\Controllers\Admin\UserCreationController::class, 'createStudent']);
		Route::get('/create', fn() => view('pages.admin.create_student'));
		Route::get('/edit/{student}', fn($student) => view('pages.admin.edit_student', ['student' => $student]));
	});
	Route::prefix('/major')->group(function() {
		Route::get('/', fn() => view('pages.admin.major'));
		Route::post('/create', [\App\Http\Controllers\Admin\MajorController::class, 'create']);
		Route::get('/create', fn() => view('pages.admin.create_major'));
		Route::get('/edit/{major}', fn(\App\Models\Major $major) => view('pages.admin.edit_major', ['major' => $major]));
		Route::post('/update/{major}', [\App\Http\Controllers\Admin\MajorController::class, 'update']);
	});
	Route::prefix('/classroom')->group(function() {
		Route::get('/', fn() => view('pages.admin.classroom'));
		Route::post('/create', [\App\Http\Controllers\Admin\ClassroomController::class, 'create']);
		Route::get('/create', fn() => view('pages.admin.create_classroom'));
		Route::get('/listByMajor/{major}', [\App\Http\Controllers\Admin\ClassroomController::class, 'allByMajorID']);
		Route::get('/edit/{classroom}', fn(\App\Models\Classroom $classroom) => view('pages.admin.edit_classroom', ['classroom' => $classroom]));
		Route::post('/update/{classroom}', [\App\Http\Controllers\Admin\ClassroomController::class, 'update']);
	});
});

Route::prefix('/teacher')->middleware([\App\Http\Middleware\Authenticate::class, \App\Http\Middleware\OnlyTeacher::class])->group(function() {
	Route::get('/', function() {
		return view('pages.teacher.base');
	});
});
