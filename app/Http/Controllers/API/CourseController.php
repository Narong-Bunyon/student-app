<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Http\Resources\CourseResource;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the courses.
     */
    public function index()
    {
        // Using CourseResource collection for standardized JSON output
        return CourseResource::collection(Course::all());
    }

    /**
     * Store a newly created course in storage.
     */
    public function store(StoreCourseRequest $request)
    {
        // Validation is automatically handled by StoreCourseRequest
        $course = Course::create($request->validated());
        
        return response()->json([
            'message' => 'Course created successfully',
            'data' => new CourseResource($course)
        ], 201);
    }

    /**
     * Display the specified course.
     */
    public function show(Course $course)
    {
        return new CourseResource($course);
    }

    /**
     * Update the specified course in storage.
     */
    public function update(UpdateCourseRequest $request, Course $course)
    {
        // Validation is automatically handled by UpdateCourseRequest
        $course->update($request->validated());
        
        return response()->json([
            'message' => 'Course updated successfully',
            'data' => new CourseResource($course)
        ], 200);
    }

    /**
     * Remove the specified course from storage.
     */
    public function destroy(Course $course)
    {
        $course->delete();
        
        return response()->json([
            'message' => 'Course deleted successfully'
        ], 200);
    }
}
