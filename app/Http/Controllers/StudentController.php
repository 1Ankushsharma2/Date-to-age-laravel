<?php
namespace App\Http\Controllers;

use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        
        $students = Student::all();
        return view('Student.index', compact('students'));
    }

    public function create()
    {
       
        return view('Student.create');
    }

    public function store(Request $request)
    {
       
        $validated = $request->validate([
            'name' => 'required|string',
            'standard' => 'required|string',
            'dob' => 'required|date',
            'father_name' => 'required|string',
            'father_mobile' => 'required|numeric|digits:10',
            'email' => 'required|email|unique:students,email',
            'gender' => 'required|string',
        ]);       
        $dob = $validated['dob'];
        $age = Carbon::parse($dob)->age;        
        Student::create(array_merge($validated, ['age' => $age]));
        return response()->json(['success' => true, 'message' => 'Student added successfully']);
    }

    public function edit(REQUEST $request,$id){
        $students=Student::find($id);
        return view ('student.edit',compact('students'));
    }

    public function update(REQUEST $request,$id){
        $validated = $request->validate([
            'name' => 'required|string',
            'standard' => 'required|string',
            'dob' => 'required|date',
            'father_name' => 'required|string',
            'father_mobile' => 'required|numeric|digits:10',
            'email' => 'required|email|unique:students,email,' . $id,
            'gender' => 'required|string',
        ]);

        $students = Student::find($id);
        $dob =$validated['dob'];
        $age=carbon::parse($dob)->age;
        $students->update(array_merge($validated,['age'=>$age]));
        return response()->json(['success'=>true,'Message'=>'Data was updated successfully']);

    }
      
    public function delete(REQUEST $request,$id){
        
        $student= Student::find($id)->delete();
       
        return redirect()->route('student.index')->with('success','Data was deleted Succssfully deleted');
    }


    
}
