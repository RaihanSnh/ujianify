<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class User
 * 
 * @property int $id
 * @property string $name
 * @property string $password
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string $role
 * 
 * @property Student $student
 * @property Teacher $teacher
 *
 * @package App\Models
 */
class User extends Model
{
	protected $table = 'users';

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'name',
		'password',
		'role'
	];

	public function student()
	{
		return $this->hasOne(Student::class);
	}

	public function teacher()
	{
		return $this->hasOne(Teacher::class);
	}
}
