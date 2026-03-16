<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
        // $allUsers = User::with('student','teacher')->get();

        // $allTeachers = Teacher::with('user')->get();

        $allStudents = Student::with('user')->get();
        return $allStudents;
    }
}
