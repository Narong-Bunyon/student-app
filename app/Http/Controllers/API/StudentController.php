<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Http\Resources\StudentResource;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        return StudentResource::collection(Student::all());
    }

    public function store(StoreStudentRequest $request)
    {
        $student = Student::create($request->validated());
        
        return response()->json([
            'message' => 'Student created successfully',
            'data' => new StudentResource($student)
        ], 201);
    }

    public function show(Student $student)
    {
        return new StudentResource($student);
    }

    public function update(UpdateStudentRequest $request, Student $student)
    {
        $student->update($request->validated());
        
        return response()->json([
            'message' => 'Student updated successfully',
            'data' => new StudentResource($student)
        ], 200);
    }

    public function destroy(Student $student)
    {
        $student->delete();
        
        return response()->json([
            'message' => 'Student deleted successfully'
        ], 200);
    }
}
