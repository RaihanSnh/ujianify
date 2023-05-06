<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Admin\ClassroomService;
use Illuminate\Http\Request;

class ClassroomController extends Controller{

    public function create(Request $request) {
        $request->validate([
            'name' => 'required|string',
            'major_id' => 'required|exists:majors,id'
        ]);

        ClassroomService::getInstance()->create($request->get('name'), (int) $request->get('major_id'));
    }
}
