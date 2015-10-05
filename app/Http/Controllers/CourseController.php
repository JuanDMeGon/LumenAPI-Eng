<?php namespace App\Http\Controllers;

use App\Course;

class CourseController extends Controller
{
	public function index()
	{
		$courses = Course::all();

		return $this->createSuccessResponse($courses, 200);
	}

	public function show($id)
	{
		$course = Course::find($id);

		if($course)
		{
			return $this->createSuccessResponse($course, 200);
		}

		return $this->createErrorResponse("The course whith id {$id}, does not exists", 404);
	}
}