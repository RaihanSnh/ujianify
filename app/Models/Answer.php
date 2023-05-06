<?php

declare(strict_types=1);

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Answer
 *
 * @property int $id
 * @property int $question_id
 * @property int $priority
 * @property string $answer
 * @property string|null $image_path
 * @property int $score
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property Question $question
 *
 * @package App\Models
 */
class Answer extends Model
{
	protected $table = 'answers';

	protected $casts = [
		'question_id' => 'int',
		'priority' => 'int',
		'score' => 'int'
	];

	protected $fillable = [
		'question_id',
		'priority',
		'answer',
		'image_path',
		'score'
	];

	public function question()
	{
		return $this->belongsTo(Question::class);
	}
}
