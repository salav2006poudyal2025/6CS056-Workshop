<!DOCTYPE html>
<html lang="en">
<head><meta charset="UTF-8"><title>{{ $course->name }}</title><style>body{font-family:Arial,sans-serif;margin:2rem}a{color:#464feb;text-decoration:none}.success{color:#147a42}dt{font-weight:bold;margin-top:1rem}</style></head>
<body>
    <nav><a href="{{ route('students.index') }}">Students</a> | <a href="{{ route('courses.index') }}">Courses</a></nav>
    <h1>{{ $course->name }}</h1>
    @if (session('success'))<p class="success">{{ session('success') }}</p>@endif
    <dl><dt>Description</dt><dd>{{ $course->description ?: 'Not provided' }}</dd><dt>Duration</dt><dd>{{ $course->duration }}</dd><dt>Fee</dt><dd>{{ number_format((float) $course->fee, 2) }}</dd><dt>Difficulty</dt><dd>{{ $course->difficulty }}</dd><dt>Active</dt><dd>{{ $course->is_active ? 'Yes' : 'No' }}</dd></dl>
    <p><a href="{{ route('courses.edit', $course) }}">Edit</a> | <a href="{{ route('courses.index') }}">Back to courses</a></p>
    <form method="POST" action="{{ route('courses.destroy', $course) }}">@csrf @method('DELETE')<button type="submit">Delete Course</button></form>
</body>
</html>
