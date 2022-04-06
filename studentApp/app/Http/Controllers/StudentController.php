<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    //Retrieving of Data
    public function Getdata(Request $request){
        return response()->json(Student::get(), 200);
    }

     //Retrieving of Data by ID
     public function GetdatabyID($id){
        return response()->json(Student::find($id), 200);
    }

    //Adding of Data
    public function AddData(Request $request){
        $student = Student::create($request->all());
        return response()->json($student, 201);
    }

    public function UpdateData(Request $request, Student $student){

        $student->update($request->all());
        return response()->json($student, 200);
    }

    //deleting Data
    public function DeleteData(Student $student){
        $student->delete();
        return response()->json(null, 204);

    }

    /*
    *       Web Function
    */

    public function home(){
        $data = DB::select('SELECT * FROM students');
        return view('welcome',['student'=>$data]);

    }
}
