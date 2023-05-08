<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use function back;

class UserManagementController extends Controller{

	public function all(Request $request){
		User::query()->paginate(20);
	}

	public function deleteStudent(Student $student, Request $request) {
		$student->delete();
		return back();
	}

	public function deleteTeacher(Teacher $teacher, Request $request) {
		$teacher->delete();
		return back();
	}

	public function deleteAdmin(User $user, Request $request) {
		$user->delete();
		return back();
	}
}
