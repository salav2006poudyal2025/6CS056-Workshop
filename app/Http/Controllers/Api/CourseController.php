<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Course\StoreCourseRequest;
use App\Http\Requests\Course\UpdateCourseRequest;
use App\Http\Resources\CourseResource;
use App\Models\Course;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class CourseController extends Controller
{
    public function index(): JsonResponse
    {
        return CourseResource::collection(Course::query()->get())
            ->response()
            ->setStatusCode(Response::HTTP_OK);
    }

    public function store(StoreCourseRequest $request): JsonResponse
    {
        $course = Course::query()->create($request->validated());

        return CourseResource::make($course)
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Course $course): JsonResponse
    {
        return CourseResource::make($course)
            ->response()
            ->setStatusCode(Response::HTTP_OK);
    }

    public function update(UpdateCourseRequest $request, Course $course): JsonResponse
    {
        $course->update($request->validated());

        return CourseResource::make($course)
            ->response()
            ->setStatusCode(Response::HTTP_OK);
    }

    public function destroy(Course $course): JsonResponse
    {
        $course->delete();

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
