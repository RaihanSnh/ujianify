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
			'name' => 'required|regex:/^[a-zA-Z\s]*$/',
			'starts_at' => 'required|date_format:m/d/Y H:i',
			'ends_at' => 'required|date_format:m/d/Y H:i',
			'shuffle_questions' => 'boolean',
			'shuffle_answers' => 'boolean',
		]);

		SubjectService::getInstance()->create($request->post('name'), Carbon::createFromFormat('m/d/Y H:i', $request->post('starts_at')), Carbon::createFromFormat('m/d/Y H:i', $request->post('ends_at')), (bool) $request->get('shuffle_questions'), (bool) $request->get('shuffle_answers'));
		$request->session()->flash('message', 'Subject created');
		return back();
	}

	public function update(Subject $subject, Request $request) {
		$request->validate([
			'name' => 'required|regex:/^[a-zA-Z\s]*$/',
			'starts_at' => 'required|date_format:m/d/Y H:i',
			'ends_at' => 'required|date_format:m/d/Y H:i',
			'shuffle_questions' => 'boolean',
			'shuffle_answers' => 'boolean',
		]);

		SubjectService::getInstance()->update($subject, $request->post('name'), Carbon::createFromFormat('m/d/Y H:i', $request->post('starts_at')), Carbon::createFromFormat('m/d/Y H:i', $request->post('ends_at')), (bool) $request->post('shuffle_questions'), (bool) $request->post('shuffle_answers'));

		$request->session()->flash('message', 'Subject updated');
		return back();
	}

	public function delete(Subject $subject, Request $request) {
		$subject->delete();

		$request->session()->flash('message', 'Subject deleted');
		return back();
	}
}
