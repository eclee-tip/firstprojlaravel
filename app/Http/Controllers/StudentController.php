<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    public function about($name,$id) {
        // return 'Index id ' . $id . ' name ' . $name;
        // $name = $this->privateFunction();
        // return $this->age;
        return view('about', compact('id','name'));
    }

    // private function privateFunction() {
    //     return 'hello';
    // }

    public function addData() {

        $item = new Student();
        $item->name = 'tester';
        $item->email = 'tester@gmail.com';
        $item->age = 25;
        $item->date_of_birth = '2010-01-01';
        $item->gender = 'f';
        $item->score = 25;
        $item->save();

        // Query Builder
        // DB::table('students')->insert([
        //     [
        //         'name' => 'testera',
        //         'email' => 'teast@gmail.com',
        //         'age' => 15,
        //         'date_of_birth' => '2010-01-01',
        //         'gender' => 'f'
        //     ],
        //     [
        //         'name' => 'testerb',
        //         'email' => 'tebst@gmail.com',
        //         'age' => 15,
        //         'date_of_birth' => '2010-01-01',
        //         'gender' => 'm'
        //     ],
        //     [
        //         'name' => 'testerc',
        //         'email' => 'tecst@gmail.com',
        //         'age' => 15,
        //         'date_of_birth' => '2010-01-01',
        //         'gender' => 'f'
        //     ]
        // ]);

        return 'Added successfully';
    }

    public function getData() {

        // $items = Student::all();
        $items = Student::find(55);

        // Query Builder
        // $items = DB::table('students')
        // ->average('score');

        return $items;
    }

    public function updateData() {

        $items = Student::find(55);
        $items->name = 'updated student name';
        $items->age = 10;
        $items->update();

        // Query Builder
        // DB::table('students')
        // ->where('id',101)
        // ->update([
        //     'name' => 'update name',
        //     'age' => 20,
        //     'email' => 'tesst.com'
        // ]);

        return 'Updated successfully';
    }

    public function deleteData() {

        $items = Student::findOrFail(57);
        $items->delete();

        // Query Builder
        // DB::table('students')
        // ->where('id','>',102)
        // ->delete();

        return 'Deleted successfully';
    }

    public function whereConditions() {
        // $items = Student::where('age','>',18)
        // ->orWhere('score','>=',50)
        // ->get();

        // $items = Student::where('score','>=',50)
        //     ->where(function($query) {
        //         $query->where('age','<',20)
        //         ->orWhere('age','>',30);
        //     })
        //     ->get();

        // $items = Student::whereBetween('age',[18,25])-get();

        // $items = Student::whereNotBetween('age',[18,25])-get();

        // $items = Student::whereNotIn('id',[1,2,3,4,5])->get();

        // $items = Student::where('age',25)
        // ->orWhere('score',25)
        // ->get();

        // $items = Student::whereAny(['age','score'],'=',25)->get();

        // $items = Student::where('age',25)->where('score',25)->where('id',25)->get();

        // $items = Student::whereAll(['age','score','id'], 25)->get();

        return $items;
    }

    public function queryScope() {
        $items = Student::female(35)
        ->get();

        return $items;
    }

    public function secondQuery() {
        $items = Student::female()
        ->get();

        return $items;
    }
}
