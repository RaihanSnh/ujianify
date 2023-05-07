<?php

declare(strict_types=1);

namespace App\Http\Controllers\Teacher;

use App\Models\Question;
use App\Models\Subject;
use Illuminate\Http\Request;
use function back;

class QuestionController{

	public function create(Subject $subject, Request $request) {
		$request->validate([
			'question' => 'required|string',
			'answer' => 'required|in:A,B,C,D,E',
			'score' => 'required|integer',
		]);

		$question = new Question();
		$question->question = $request->post('question');
		$question->answer = $request->post('answer');
		$question->score = $request->post('score');
		$question->subject_id = $subject->id;
		$question->save();

		$request->session()->flash('message', 'Question created.');
		return back();
	}

	public function edit(Question $question, Request $request) {
		$request->validate([
			'question' => 'required|string',
			'answer' => 'required|in:A,B,C,D,E',
			'score' => 'required|integer',
			'subject_id' => 'required|exists:subjects,id'
		]);

		Question::query()->find($question->id)->update([
			'question' => $request->post('question'),
			'answer' => $request->post('answer'),
			'score' => $request->post('score'),
		]);

		$request->session()->flash('message', 'Question created.');
		return back();
	}

    public function delete(Question $question, Request $request) {
        $question->delete();
        $request->session()->flash('message', 'Question deleted.');
        return back();
    }
}
