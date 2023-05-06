<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Admin\MajorService;
use Illuminate\Http\Request;

class MajorController extends Controller{

    public function create(Request $request) {
        $request->validate([
            'name' => 'required|string'
        ]);

        MajorService::getInstance()->create($request->get('name'));
    }
}
