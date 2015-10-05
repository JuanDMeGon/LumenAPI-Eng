<?php namespace App\Http\Controllers;

use App\Teacher;

use Illuminate\Http\Request;

class TeacherController extends Controller
{
	public function index()
	{
		$teachers = Teacher::all();

		return $this->createSuccessResponse($teachers, 200);
	}

	public function show($id)
	{
		$teacher = Teacher::find($id);

		if($teacher)
		{
			return $this->createSuccessResponse($teacher, 200);
		}

		return $this->createErrorResponse("The teacher whith id {$id}, does not exists", 404);
	}

	public function store(Request $request)
	{
		$this->validateRequest($request);

		$teacher = Teacher::create($request->all());

		return $this->createSuccessResponse("The teacher with id {$teacher->id} has been created", 201);		
	}

	public function update(Request $request, $student_id)
	{
		$teacher = Teacher::find($student_id);

		if($teacher)
		{
			$this->validateRequest($request);

			$teacher->name = $request->get('name');
			$teacher->phone = $request->get('phone');
			$teacher->address = $request->get('address');
			$teacher->profession = $request->get('profession');

			$teacher->save();

			return $this->createSuccessResponse("The teacher with id {$teacher->id} has been updated", 200);
		}

		return $this->createErrorResponse('The teacher with the specified id does not exists.', 404);
	}

	public function destroy()
	{
		return __METHOD__;		
	}

	function validateRequest($request)
	{
		$rules =
		[
			'name' => 'required',
			'phone' => 'required|numeric',
			'address' => 'required',
			'profession' => 'required|in:engineering,math,physics'
		];

		$this->validate($request, $rules);
	}
}