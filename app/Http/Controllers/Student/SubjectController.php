<?php

declare(strict_types=1);

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\Score;
use App\Models\Student;
use App\Models\StudentAnswer;
use App\Models\Subject;
use Carbon\Carbon;
use Illuminate\Http\Request;
use function intval;
use function nl2br;
use function response;
use function url;
use function view;

class SubjectController extends Controller{

	public function view(Subject $subject, Request $request) {
		$student = Student::query()->where('user_id', '=', $request->user()->getUserId())->first();
		$no = $request->get('no', '1');
		$question = Question::query()->where('subject_id', '=', $subject->id)->offset(intval($no) - 1)->first();
		return view('pages.student.subject', [
			'student' => $student,
			'subject' => $subject,
			'totalQuestion' => $subject->questions()->count(),
			'question' => $question,
			'no' => $no,
		]);
	}

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

		return response('submitted');
	}

	public function loadQuestions(Subject $subject, Request $request) {
		$result = [];
		/** @var Question $question */
		$i = 0;
		foreach($subject->questions()->get() as $question) {
			$result[++$i] = [
				'id' => $question->id,
				'question' => nl2br($question->question),
				'image_path' => $question->image_path !== null ? url('images/question/' . $question->image_path) : null,
			];
		}
		return response()->json($result);
	}
}
