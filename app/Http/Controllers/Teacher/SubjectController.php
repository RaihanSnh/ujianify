<?php

declare(strict_types=1);

namespace App\Http\Controllers\Teacher;

use Illuminate\Http\Request;

class SubjectController{

    public function create(Request $request) {
        $request->validate([
            'name' => 'required',
            'starts_at' => 'required|'
        ]);
    }
}
