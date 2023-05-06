<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\Major;
use App\Services\Admin\MajorService;
use Illuminate\Http\Request;

class MajorController extends Controller{

    public function create(Request $request) {
        $request->validate([
            'name' => 'required|string'
        ]);

        MajorService::getInstance()->create($request->post('name'));
    }

    public function update(Major $major, Request $request) {
        $request->validate([
            'name' => 'required|string'
        ]);

        MajorService::getInstance()->update($major, $request->post('name'));
    }

    public function delete(Major $major, Request $request) {
        MajorService::getInstance()->delete($major);
    }

    public function all(Request $request) {
        Classroom::query()->paginate(20);
    }
}
