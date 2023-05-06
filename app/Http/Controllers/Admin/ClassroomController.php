<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Services\Admin\ClassroomService;
use Illuminate\Http\Request;

class ClassroomController extends Controller{

    public function create(Request $request) {
        $request->validate([
            'name' => 'required|string',
            'major_id' => 'required|exists:majors,id'
        ]);

        ClassroomService::getInstance()->create($request->post('name'), (int) $request->get('major_id'));
    }

    public function update(Classroom $classroom, Request $request) {
        $request->validate([
            'name' => 'required|string',
            'major_id' => 'required|exists:majors,id',
        ]);

        ClassroomService::getInstance()->update($classroom, $request->post('name'), (int) $request->post('major_id'));
    }

    public function delete(Classroom $classroom, Request $request) {
        ClassroomService::getInstance()->delete($classroom);
    }

    public function all(Request $request) {
        Classroom::query()->paginate(20);
    }
}
