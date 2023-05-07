<?php

declare(strict_types=1);

namespace App\Services\Teacher;

use App\Models\Subject;
use Carbon\Carbon;

class SubjectService{

	public function create(string $name, Carbon $startsAt, Carbon $endsAt, bool $shuffleQuestions, bool $shuffleAnswers) : Subject{
		$subject = new Subject();
		$subject->name = $name;
		$subject->starts_at = $startsAt;
		$subject->ends_at = $endsAt;
		$subject->shuffle_questions = $shuffleQuestions;
		$subject->shuffle_answers = $shuffleAnswers;
		$subject->save();
		return $subject;
	}
}
