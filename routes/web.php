<?php

use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\Rule;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/students', function () {
    return view('student.list', ['students' => Student::all()]);
})->name('students.index');

Route::get('/students/create', function () {
    return view('student.create');
})->name('students.create');

Route::post('/students', function (Request $request) {
    $validated = $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'email', 'max:255', 'unique:students,email'],
        'phone' => ['required', 'string', 'max:20'],
        'address' => ['nullable', 'string', 'max:500'],
        'date_of_birth' => ['nullable', 'date'],
    ]);

    Student::create($validated);

    return redirect()->route('students.index')->with('success', 'Student created successfully.');
})->name('students.store');

Route::get('/students/{id}', function (int $id) {
    $student = Student::findOrFail($id);

    return view('student.detail', compact('student'));
})->name('students.show');

Route::get('/students/{id}/edit', function (int $id) {
    $student = Student::findOrFail($id);

    return view('student.edit', compact('student'));
})->name('students.edit');

Route::put('/students/{id}', function (Request $request, int $id) {
    $student = Student::findOrFail($id);

    $validated = $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => [
            'required',
            'email',
            'max:255',
            Rule::unique('students', 'email')->ignore($student->id),
        ],
        'phone' => ['required', 'string', 'max:20'],
        'address' => ['nullable', 'string', 'max:500'],
        'date_of_birth' => ['nullable', 'date'],
    ]);

    $student->update($validated);

    return redirect()->route('students.show', $student)->with('success', 'Student updated successfully.');
})->name('students.update');

Route::delete('/students/{id}', function (int $id) {
    $student = Student::findOrFail($id);

    $student->delete();

    return redirect()->route('students.index')->with('success', 'Student deleted successfully.');
})->name('students.destroy');

Route::get('/courses', function () {
    return view('course.list', ['courses' => Course::all()]);
})->name('courses.index');

Route::get('/courses/create', function () {
    return view('course.create');
})->name('courses.create');

Route::post('/courses', function (Request $request) {
    $validated = $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'description' => ['nullable', 'string'],
        'duration' => ['required', 'integer', 'min:1'],
        'fee' => ['required', 'numeric', 'min:0', 'max:99999999.99'],
        'difficulty' => ['required', 'in:Easy,Medium,Hard'],
        'is_active' => ['boolean'],
    ]);

    Course::create($validated + ['is_active' => false]);

    return redirect()->route('courses.index')->with('success', 'Course created successfully.');
})->name('courses.store');

Route::get('/courses/{id}', function (int $id) {
    $course = Course::findOrFail($id);

    return view('course.detail', compact('course'));
})->name('courses.show');

Route::get('/courses/{id}/edit', function (int $id) {
    $course = Course::findOrFail($id);

    return view('course.edit', compact('course'));
})->name('courses.edit');

Route::put('/courses/{id}', function (Request $request, int $id) {
    $course = Course::findOrFail($id);

    $validated = $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'description' => ['nullable', 'string'],
        'duration' => ['required', 'integer', 'min:1'],
        'fee' => ['required', 'numeric', 'min:0', 'max:99999999.99'],
        'difficulty' => ['required', 'in:Easy,Medium,Hard'],
        'is_active' => ['boolean'],
    ]);

    $course->update($validated + ['is_active' => false]);

    return redirect()->route('courses.show', $course)->with('success', 'Course updated successfully.');
})->name('courses.update');

Route::delete('/courses/{id}', function (int $id) {
    $course = Course::findOrFail($id);

    $course->delete();

    return redirect()->route('courses.index')->with('success', 'Course deleted successfully.');
})->name('courses.destroy');
