<?php

declare(strict_types=1);

namespace App\Services\Teacher;

use App\Helpers\CSV;
use App\Models\Score;
use App\Models\Subject;
use App\Traits\SingletonTrait;
use function round;

class ScoreService{

    use SingletonTrait;

	public function exportToCsv(Subject $subject) : string{
		$scores = Score::query()->where(['subject_id' => $subject->id])->with('students')->get();
		$maxScore = $subject->questions()->sum('score');
		if(empty($scores)){
			return '';
		}
		$data = [];
		$data[] = [
			'User ID',
			'External ID',
			'Full Name',
			'Score',
			'Accuracy',
			'Submitted At'
		];
		foreach($scores as $score) {
			$data[] = [
				$score->student_id,
				$score->student->external_id,
				$score->student->full_name,
				$score->score,
				round(($score / $maxScore) * 100, 2),
				$score->submitted_at->format('Y-m-d H:i:s'),
			];
		}
		return CSV::create($data);
	}
}
