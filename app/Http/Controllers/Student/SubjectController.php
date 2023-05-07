<?php

declare(strict_types=1);

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\Score;
use App\Models\StudentAnswer;
use App\Models\Subject;
use Carbon\Carbon;
use Illuminate\Http\Request;
use function response;

class SubjectController extends Controller{

	public function submit(Subject $subject, Request $request) {
		if(Score::query()->where('student_id', '=', $request->user()->id)->where('subject_id', '=', $subject->id)->whereNotNull('submitted_at')->first() !== null) {
			return response('already submitted!');
		}

		/** @var StudentAnswer[] $answers */
		$answers = StudentAnswer::query()->where('subject_id', '=', $subject->id)->get();
		/** @var Question[] $questions */
		$questions = $subject->questions()->get();
		$s = 0;
		foreach($answers as $answer) {
			foreach($questions as $q) {
				if($q->id === $answer->question_id && $q->answer === $answer->answer) {
					$s += $q->score;
				}
			}
		}

		$score = new Score();
		$score->student_id = $request->user()->id;
		$score->subject_id = $subject->id;
		$score->score = $s;
		$score->submitted_at = Carbon::now();
		$score->save();
	}
}
