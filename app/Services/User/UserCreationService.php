<?php

declare(strict_types=1);

namespace App\Services\User;

use App\Models\Classroom;
use App\Models\Major;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\TeacherMajor;
use App\Models\User;
use App\Traits\SingletonTrait;

class UserCreationService{

    use SingletonTrait;

    public function createStudent(string $username, string $password, string $externalID, string $fullName, Classroom|int $classroom, Major|int $major): void{
        $this->create($username, $password, User::ROLE_STUDENT);

        $student = new Student();
        $student->external_id = $externalID;
        $student->full_name = $fullName;
        $student->classroom_id = $classroom instanceof Classroom ? $classroom->id : $classroom;
        $student->major_id = $major instanceof Major ? $major->id : $major;
        $student->save();
    }

    /**
     * @param string $username
     * @param string $password
     * @param string $externalID
     * @param string $fullName
     * @param Major[]|int[] $majors
     * @return void
     */
    public function createTeacher(string $username, string $password, string $externalID, string $fullName, array $majors): void{
        $this->create($username, $password, User::ROLE_STUDENT);

        $teacher = new Teacher();
        $teacher->external_id = $externalID;
        $teacher->full_name = $fullName;
        $teacher->save();

        $insert = [];
        foreach($majors as $major) {
            $insert[] = ['teacher_id' => $teacher->user_id, 'major_id' => $major instanceof Major ? $major->id : $major];
        }
        TeacherMajor::query()->insert($insert);
    }

    public function createAdmin(string $username, string $password): void{
        $this->create($username, $password, User::ROLE_ADMIN);
    }

    private function create(string $username, string $password, string $role): void{
        $user = new User();
        $user->name = $username;
        $user->setPassword($password);
        $user->role = $role;
        $user->save();
    }
}
