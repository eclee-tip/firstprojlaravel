<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentAddRequest;
use App\Models\Images;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    protected $name;
    protected $age;

    public function __construct()
    {
        $this->name = 'My Name';
        $this->age = 20;
    }

    // Eloquent CRUD
    public function index(Request $request) {
        // $students = Student::all();
        $students = Student::with('images')
        ->when($request->search, function ($query) use ($request) {
            return $query->whereAny([
                'name',
                'age',
                'email',
                'date_of_birth',
                'score',
                'gender'
            ], 'like','%' . $request->search .'%');
        })->paginate(10);
        return view('students.index',compact('students'));
    }

    // Eloquent CRUD
    public function create(StudentAddRequest $request) {

        $imagePath = null;
        if($request->hasFile('image')){
            $imagePath=$request->file('image')->store('photos','public');
        }

        $student = new Student();
        $student->user_id = 2;
        $student->name = $request->name;
        $student->email = $request->email;
        $student->age = $request->age;
        $student->date_of_birth = $request->date_of_birth;
        $student->gender = $request->gender;
        $student->score = $request->score;
        // $student->image = $imagePath;
        $student->save();

        if($request->hasFile('image')){
            $images = new Images();
            $images->path = $imagePath;
            $images->imageable_id = $student->id;
            $images->imageable_type = Student::class;
            $images->save();
        }
        
        session()->flash('success','Student created successfully');
        return redirect('studentsinfo');
    }

    // Eloquent CRUD
    public function edit(Request $request, $id) {
        $student = Student::findOrFail($id);

        // Gate::authorize('edit-student', $student);
        return view('students.edit', compact('student'));
    }

    // Eloquent CRUD
    public function update(Request $request, $id) {

        $imagePath = null;
        if($request->hasFile('image')){
            $imagePath=$request->file('image')->store('photos','public');
        }

        $student = Student::findOrFail($id);
        // Gate::authorize('edit-student', $student);
        $student->name = $request->name;
        $student->email = $request->email;
        $student->age = $request->age;
        $student->date_of_birth = $request->date_of_birth;
        $student->gender = $request->gender;
        $student->score = $request->score;
        // $student->image = $imagePath;

        $student->update();

        if($request->hasFile('image')) {
            $images = new Images();
            $images->path = $imagePath;
            $images->imageable_id = $student->id;
            $images->imageable_type = Student::class;
            $images->update();
        }
        
        session()->flash('success','Student updated successfully');

        return redirect('studentsinfo');
    }

    // Eloquent CRUD
    public function destroy(Request $request, $id) {
        $student = Student::findOrFail($id);

        if($student->image) {
            Storage::disk('public')->delete($student->image);
        }

        $student->delete();

        session()->flash('success','Student deleted successfully');

        return redirect('studentsinfo');
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

        $items = Student::all();

        // $items = Student::onlyTrashed()->get();

        // $items = Student::withTrashed()->get();

        // $items = Student::withTrashed()->find(2)->restore();

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

        // $items = Student::findOrFail(2);
        // $items->delete();

        $items = Student::find(1);
        $items->forceDelete();

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

        // $items = Student::whereBetween('age',[18,25])->get();

        // $items = Student::whereNotBetween('age',[18,25])->get();

        // $items = Student::whereNotIn('id',[1,2,3,4,5])->get();

        // $items = Student::where('age',25)
        // ->orWhere('score',25)
        // ->get();

        // $items = Student::whereAny(['age','score'],'=',25)->get();

        // $items = Student::where('age',25)->where('score',89)->where('id',11)->get();

          $items = Student::whereAll(['age','score','id'], 25)->get();

        return $items;
    }

    public function queryScope() {
        $items = Student::female(20)
        ->get();

        return $items;
    }

    public function secondQuery() {
        $items = Student::female()
        ->get();

        return $items;
    }
}
