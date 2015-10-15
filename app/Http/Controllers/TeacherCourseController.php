<?php namespace App\Http\Controllers;

use App\Teacher;
use App\Course;

use Illuminate\Http\Request;

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

	public function store(Request $request, $teacher_id)
	{
		$teacher = Teacher::find($teacher_id);

		if($teacher)
		{
			$this->validateRequest($request);

			$course = Course::create
			(
				[
					'title' => $request->get('title'),
					'description' => $request->get('description'),
					'value' => $request->get('value'),
					'teacher_id' => $teacher->id
				]
			);

			return $this->createSuccessResponse("The course with id {$course->id} has been created and associated with the teacher with id {$teacher->id}", 201);
		}

		return $this->createErrorResponse("The teacher with id {$teacher_id} does not exists", 404);
	}

	public function update()
	{
		return __METHOD__;		
	}

	public function destroy()
	{
		return __METHOD__;		
	}

	function validateRequest($request)
	{
		$rules =
		[
			'title' => 'required',
			'description' => 'required',
			'value' => 'required|numeric'
		];

		$this->validate($request, $rules);
	}
}