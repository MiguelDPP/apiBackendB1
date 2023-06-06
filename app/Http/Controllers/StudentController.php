<?php

namespace App\Http\Controllers;

use App\Models\student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    //
    
    public function index()
    {
        //
        $students = student::all();
        return $students; 
    }

    public function findClient(Request $request)
    {
        //
        $student = student::where('identification', $request->identification)->first();
        
        if($student){
            return response()->json([
                'message' => 'Client found',
                'student' => $student
            ], 200);
        }else{
            return response()->json([
                'message' => 'Client not found',
            ], 404);
        }
        
    }
}