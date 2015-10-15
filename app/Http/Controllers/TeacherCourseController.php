<?php namespace App\Http\Controllers;

use App\Teacher;

class TeacherCourseController extends Controller
{
	public function index($teacher_id)
	{
		$teacher = Teacher::find($teacher_id);

		if($teacher)
		{
			$courses = $teacher->courses;

			return $this->createSuccessResponse($courses, 200);
		}

		return $this->createErrorResponse('Does not exists a teacher with the given id', 404);	
	}

	public function store()
	{
		return __METHOD__;		
	}

	public function update()
	{
		return __METHOD__;		
	}

	public function destroy()
	{
		return __METHOD__;		
	}
}