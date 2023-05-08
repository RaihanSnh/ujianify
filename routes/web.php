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
	return view('pages.student.subject');
});

Route::prefix('/auth')->group(function() {
	Route::get('/login', function() {
		return view('pages.auth.login');
	});
	Route::post('/login', [\App\Http\Controllers\AuthController::class, 'login']);
	Route::post('/logout', [\App\Http\Controllers\AuthController::class, 'logout']);
});

Route::prefix('/admin')->middleware([\App\Http\Middleware\Authenticate::class, \App\Http\Middleware\OnlyAdmin::class])->group(function() {
	Route::get('/', function() {
		return view('pages.admin.dashboard');
	});
	Route::prefix('/admin')->group(function() {
		Route::get('/', fn() => view('pages.admin.admin'));
		Route::post('/create', [\App\Http\Controllers\Admin\UserCreationController::class, 'createAdmin']);
		Route::get('/delete', [\App\Http\Controllers\Admin\UserCreationController::class, 'deleteAdmin']);
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
		Route::delete('/{major}', [\App\Http\Controllers\Admin\MajorController::class, 'delete']);
	});
	Route::prefix('/classroom')->group(function() {
		Route::get('/', fn() => view('pages.admin.classroom'));
		Route::post('/create', [\App\Http\Controllers\Admin\ClassroomController::class, 'create']);
		Route::get('/create', fn() => view('pages.admin.create_classroom'));
		Route::get('/listByMajor/{major}', [\App\Http\Controllers\Admin\ClassroomController::class, 'allByMajorID']);
		Route::get('/edit/{classroom}', fn(\App\Models\Classroom $classroom) => view('pages.admin.edit_classroom', ['classroom' => $classroom]));
		Route::post('/update/{classroom}', [\App\Http\Controllers\Admin\ClassroomController::class, 'update']);
		Route::delete('/{classroom}', [\App\Http\Controllers\Admin\ClassroomController::class, 'delete']);
	});
	Route::prefix('/settings')->group(function(){
		Route::get('/', fn() => view('pages.admin.settings'));
	});
});

Route::prefix('/teacher')->middleware([\App\Http\Middleware\Authenticate::class, \App\Http\Middleware\OnlyTeacher::class])->group(function() {
	Route::get('/', function() {
		return view('pages.teacher.dashboard');
	});

	Route::prefix('/subject')->group(function(){
		Route::get('/', fn() => view('pages.teacher.subject'));
		Route::post('/create', [\App\Http\Controllers\Teacher\SubjectController::class, 'create']);
		Route::get('/create', fn() => view('pages.teacher.create_subject'));

		Route::get('/createQuestion/{subject}', fn(\App\Models\Subject $subject) => view('pages.teacher.create_question', ['subject' => $subject]));
		Route::post('/createQuestion/{subject}', [\App\Http\Controllers\Teacher\QuestionController::class, 'create']);

		Route::get('/editQuestion/{question}', fn(\App\Models\Question $question) => view('pages.teacher.edit_question', ['question' => $question]));
		Route::post('/editQuestion/{question}', [\App\Http\Controllers\Teacher\QuestionController::class, 'edit']);

		Route::get('/questions/{subject}', fn(\App\Models\Subject $subject) => view('pages.teacher.question', ['subject' => $subject]));

		Route::delete('/deleteSubject/{subject}', [\App\Http\Controllers\Teacher\SubjectController::class, 'delete']);
		Route::delete('/deleteQuestion/{question}', [\App\Http\Controllers\Teacher\QuestionController::class, 'delete']);
	});

	Route::prefix('/score')->group(function(){
		Route::get('/', fn() => view('pages.teacher.score'));
	});
	Route::prefix('/settings')->group(function(){
		Route::get('/', fn() => view('pages.teacher.settings'));
	});
});
