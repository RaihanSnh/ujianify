<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\User\UserCreationService;
use Illuminate\Http\Request;

class UserCreationController extends Controller{

    public function createAdmin(Request $request) {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $username = $request->post('username');
        $password = $request->post('password');

        UserCreationService::getInstance()->createAdmin($username, $password);
    }

    public function createTeacher(Request $request) {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
            'full_name' => 'required',
            'external_id' => 'required',
            'major_ids' => 'required|string',
            'major_ids.*' => 'exists:majors,id'
        ]);

        UserCreationService::getInstance()->createTeacher(
            $request->post('username'),
            $request->post('password'),
            $request->post('external_id'),
            $request->post('full_name'),
            $request->post('majors')
        );
    }

    public function createStudent(Request $request) {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
            'external_id' => 'required',
            'full_name' => 'required',
            'classroom_id' => 'required|exists:classroom,id',
            'major_id' => 'required|exists:major,id'
        ]);

        UserCreationService::getInstance()->createStudent(
            $request->post('username'),
            $request->post('password'),
            $request->post('external_id'),
            $request->post('full_name'),
            $request->post('classroom_id'),
            $request->post('major_id'),
        );
    }
}
