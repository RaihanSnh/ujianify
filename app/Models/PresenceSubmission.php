<?php

declare(strict_types=1);

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PresenceSubmission
 *
 * @property int $student_id
 * @property string $status
 * @property string $ip_address
 * @property string $user_agent
 * @property string|null $signature_src
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property Student $student
 *
 * @package App\Models
 */
class PresenceSubmission extends Model
{
	protected $table = 'presence_submissions';
	protected $primaryKey = 'student_id';
	public $incrementing = false;

	protected $casts = [
		'student_id' => 'int'
	];

	protected $fillable = [
		'status',
		'ip_address',
		'user_agent',
		'signature_src'
	];

	public function student()
	{
		return $this->belongsTo(Student::class);
	}
}
