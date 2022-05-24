<?php

namespace App\Http\Controllers;
use App\Author;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function showAllStudents(){
        return response()->json(Student::all());
    }

    public function showOneStudent($id){
        return response()->json(Student::find($id));
    }

    public function create(Request $request){
        $student = Student::create($request->all());
        return response()->json($student,201);
    }

    public function update($id, Request $request){
        $student = Student::findOrFail($id);
        $student->update($request->all());

        return response()->json($student,200);
    }

    // delete
    public function delete($id){
        Student::findOrFail($id)->delete();
        return response('Deleted Successfuly',200);
    }


}
