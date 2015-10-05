<?php namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

use Illuminate\Http\Request;

class Controller extends BaseController
{
    public function createSuccessResponse($data, $code)
    {
    	return response()->json(['data' => $data], $code);
    }

    public function createErrorResponse($message, $code)
    {
    	return response()->json(['message' => $message, 'code' => $code], $code);
    }

    protected function buildFailedValidationResponse(Request $request, array $errors)
    {
        return $this->createErrorResponse($errors, 422);
    }
}
