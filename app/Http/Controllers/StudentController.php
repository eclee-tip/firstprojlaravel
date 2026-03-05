<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    protected $name;
    protected $age;

    public function __construct()
    {
        $this->name = 'My Name';
        $this->age = 20;
    }

    public function index() {
        return 'Hello from controller';
    }

    public function about() {
        // return 'Index id ' . $id . ' name ' . $name;
        // $name = $this->privateFunction();
        return $this->age;
        // return view('about', compact('id','name'));
    }

    private function privateFunction() {
        return 'hello';
    }
}
