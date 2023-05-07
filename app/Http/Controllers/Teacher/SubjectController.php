<?php

declare(strict_types=1);

namespace App\Http\Controllers\Teacher;

use App\Models\Subject;
use App\Services\Teacher\SubjectService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use function back;

class SubjectController{

	public function create(Request $request) {
		$request->validate([
			'name' => 'required',
			'starts_at' => 'required|date_format:d/m/Y H:i',
			'ends_at' => 'required|date_format:d/m/Y H:i',
			'shuffle_questions' => 'required|boolean',
			'shuffle_answers' => 'required|boolean',
		]);

		SubjectService::getInstance()->create($request->post('name'), Carbon::parse($request->post('starts_at')), Carbon::parse($request->post('ends_at')),(bool) $request->get('shuffle_questions'), (bool) $request->get('shuffle_answers'));
		$request->session()->flash('message', 'Subject created');
		return back();
	}

	public function update(Subject $subject, Request $request) {
		$request->validate([
			'name' => 'required',
			'starts_at' => 'required|date_format:Y-m-d H:i',
			'ends_at' => 'required|date_format:Y-m-d H:i',
			'shuffle_questions' => 'required|boolean',
			'shuffle_answers' => 'required|boolean',
		]);

		SubjectService::getInstance()->update($subject, $request->post('name'), Carbon::parse($request->post('starts_at')), Carbon::parse($request->post('ends_at')), $request->post('shuffle_questions'), $request->pos('shuffle_answers'));

		$request->session()->flash('message', 'Subject updated');
		return back();
	}
}
