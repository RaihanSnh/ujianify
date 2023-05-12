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

Route::prefix('/')->middleware([\App\Http\Middleware\Authenticate::class, \App\Http\Middleware\OnlyStudent::class])->group(function() {
	Route::get('/', function(){
		return view('pages.student.home');
	});
	Route::get('/rules/{subject}', fn(\App\Models\Subject $subject) => view('pages.student.rules', ['subject' => $subject]));
	Route::get('/subject/{subject}', [\App\Http\Controllers\Student\SubjectController::class, 'view']);
	Route::post('/subject/{subject}/submit', [\App\Http\Controllers\Student\SubjectController::class, 'submit']);

	Route::post('/answerQuestion/{question}', [\App\Http\Controllers\Student\QuestionController::class, 'answer'])->withoutMiddleware(\App\Http\Middleware\VerifyCsrfToken::class);

	Route::get('/loadQuestions/{subject}', [\App\Http\Controllers\Student\SubjectController::class, 'loadQuestions']);
});

Route::prefix('/auth')->group(function() {
	Route::get('/login', function() {
		return view('pages.auth.login');
	});
	Route::post('/login', [\App\Http\Controllers\AuthController::class, 'login']);

	Route::post('/logout', [\App\Http\Controllers\AuthController::class, 'logout']);
	Route::get('/logout', [\App\Http\Controllers\AuthController::class, 'logout']);
});

Route::prefix('/admin')->middleware([\App\Http\Middleware\Authenticate::class, \App\Http\Middleware\OnlyAdmin::class])->group(function() {
	Route::get('/', function() {
		return view('pages.admin.dashboard');
	});
	Route::prefix('/admin')->group(function() {
		Route::get('/', fn() => view('pages.admin.admin'));
		Route::get('/create', fn() => view('pages.admin.create_admin'));
		Route::post('/create', [\App\Http\Controllers\Admin\UserCreationController::class, 'createAdmin']);
		Route::delete('/delete/{user}', [\App\Http\Controllers\Admin\UserManagementController::class, 'deleteAdmin']);
	});
	Route::prefix('/teacher')->group(function() {
		Route::get('/', fn() => view('pages.admin.teacher'));
		Route::get('/create', fn() => view('pages.admin.create_teacher'));
		Route::get('/edit/{teacher}', fn(\App\Models\Teacher $teacher) => view('pages.admin.edit_teacher', ['teacher' => $teacher]));
		Route::post('/create', [\App\Http\Controllers\Admin\UserCreationController::class, 'createTeacher']);
		Route::post('/update/{teacher}', [\App\Http\Controllers\Admin\UserManagementController::class, 'updateTeacher']);
		Route::delete('/delete/{teacher}', [\App\Http\Controllers\Admin\UserManagementController::class, 'deleteTeacher']);
	});
	Route::prefix('/student')->group(function() {
		Route::get('/', fn() => view('pages.admin.student'));
		Route::get('/create', fn() => view('pages.admin.create_student'));
		Route::get('/edit/{student}', fn(\App\Models\Student $student) => view('pages.admin.edit_student', ['student' => $student]));
		Route::post('/create', [\App\Http\Controllers\Admin\UserCreationController::class, 'createStudent']);
		Route::post('/update/{student}', [\App\Http\Controllers\Admin\UserManagementController::class, 'updateStudent']);
		Route::delete('/delete/{student}', [\App\Http\Controllers\Admin\UserManagementController::class, 'deleteStudent']);
	});
	Route::prefix('/major')->group(function() {
		Route::get('/', fn() => view('pages.admin.major'));
		Route::get('/create', fn() => view('pages.admin.create_major'));
		Route::get('/edit/{major}', fn(\App\Models\Major $major) => view('pages.admin.edit_major', ['major' => $major]));
		Route::post('/create', [\App\Http\Controllers\Admin\MajorController::class, 'create']);
		Route::post('/update/{major}', [\App\Http\Controllers\Admin\MajorController::class, 'update']);
		Route::delete('/delete/{major}', [\App\Http\Controllers\Admin\MajorController::class, 'delete']);
	});
	Route::prefix('/classroom')->group(function() {
		Route::get('/', fn() => view('pages.admin.classroom'));
		Route::get('/create', fn() => view('pages.admin.create_classroom'));
		Route::get('/listByMajor/{major}', [\App\Http\Controllers\Admin\ClassroomController::class, 'allByMajorID']);
		Route::get('/edit/{classroom}', fn(\App\Models\Classroom $classroom) => view('pages.admin.edit_classroom', ['classroom' => $classroom]));
		Route::post('/create', [\App\Http\Controllers\Admin\ClassroomController::class, 'create']);
		Route::post('/update/{classroom}', [\App\Http\Controllers\Admin\ClassroomController::class, 'update']);
		Route::delete('/delete/{classroom}', [\App\Http\Controllers\Admin\ClassroomController::class, 'delete']);
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

		Route::get('/edit/{subject}', fn(\App\Models\Subject $subject) => view('pages.teacher.edit_subject', ['subject' => $subject]));
		Route::post('/edit/{subject}', [\App\Http\Controllers\Teacher\QuestionController::class, 'edit']);

		Route::get('/createQuestion/{subject}', fn(\App\Models\Subject $subject) => view('pages.teacher.create_question', ['subject' => $subject]));
		Route::post('/createQuestion/{subject}', [\App\Http\Controllers\Teacher\QuestionController::class, 'create']);

		Route::get('/editQuestion/{question}', fn(\App\Models\Question $question) => view('pages.teacher.edit_question', ['question' => $question]));
		Route::post('/editQuestion/{question}', [\App\Http\Controllers\Teacher\QuestionController::class, 'edit']);

		Route::get('/questions/{subject}', fn(\App\Models\Subject $subject) => view('pages.teacher.question', ['subject' => $subject]));

		Route::delete('/delete/{subject}', [\App\Http\Controllers\Teacher\SubjectController::class, 'delete']);
		Route::delete('/deleteQuestion/{question}', [\App\Http\Controllers\Teacher\QuestionController::class, 'delete']);
	});

	Route::prefix('/score')->group(function(){
		Route::get('/', fn() => view('pages.teacher.score'));
	});
	Route::prefix('/settings')->group(function(){
		Route::get('/', fn() => view('pages.teacher.settings'));
	});
});
