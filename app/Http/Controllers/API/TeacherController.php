<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use App\Http\Requests\StoreTeacherRequest;
use App\Http\Requests\UpdateTeacherRequest;
use App\Http\Resources\TeacherResource;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()
    {
        return TeacherResource::collection(Teacher::all());
    }

    public function store(StoreTeacherRequest $request)
    {
        $teacher = Teacher::create($request->validated());
        
        return response()->json([
            'message' => 'Teacher created successfully',
            'data' => new TeacherResource($teacher)
        ], 201);
    }

    public function show(Teacher $teacher)
    {
        return new TeacherResource($teacher);
    }

    public function update(UpdateTeacherRequest $request, Teacher $teacher)
    {
        $teacher->update($request->validated());
        
        return response()->json([
            'message' => 'Teacher updated successfully',
            'data' => new TeacherResource($teacher)
        ], 200);
    }

    public function destroy(Teacher $teacher)
    {
        $teacher->delete();
        
        return response()->json([
            'message' => 'Teacher deleted successfully'
        ], 200);
    }
}
