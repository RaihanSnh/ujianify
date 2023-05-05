<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Question
 * 
 * @property int $id
 * @property int $subject_id
 * @property string $question
 * @property string|null $image_path
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Subject $subject
 * @property Collection|Answer[] $answers
 *
 * @package App\Models
 */
class Question extends Model
{
	protected $table = 'questions';

	protected $casts = [
		'subject_id' => 'int'
	];

	protected $fillable = [
		'subject_id',
		'question',
		'image_path'
	];

	public function subject()
	{
		return $this->belongsTo(Subject::class);
	}

	public function answers()
	{
		return $this->hasMany(Answer::class);
	}
}
