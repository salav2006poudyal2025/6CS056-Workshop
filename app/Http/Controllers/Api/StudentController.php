<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Student\StoreStudentRequest;
use App\Http\Requests\Student\UpdateStudentRequest;
use App\Http\Resources\StudentResource;
use App\Models\Student;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class StudentController extends Controller
{
    public function index(): JsonResponse
    {
        return StudentResource::collection(Student::query()->get())
            ->response()
            ->setStatusCode(Response::HTTP_OK);
    }

    public function store(StoreStudentRequest $request): JsonResponse
    {
        $student = Student::query()->create($request->validated());

        return StudentResource::make($student)
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Student $student): JsonResponse
    {
        return StudentResource::make($student)
            ->response()
            ->setStatusCode(Response::HTTP_OK);
    }

    public function update(UpdateStudentRequest $request, Student $student): JsonResponse
    {
        $student->update($request->validated());

        return StudentResource::make($student)
            ->response()
            ->setStatusCode(Response::HTTP_OK);
    }

    public function destroy(Student $student): JsonResponse
    {
        $student->delete();

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
