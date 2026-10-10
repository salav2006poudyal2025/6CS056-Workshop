<!DOCTYPE html>
<html lang="en">
<head><meta charset="UTF-8"><title>{{ $student->name }}</title><style>body{font-family:Arial,sans-serif;margin:2rem}a{color:#464feb;text-decoration:none}.success{color:#147a42}dt{font-weight:bold;margin-top:1rem}</style></head>
<body>
    <nav><a href="{{ route('students.index') }}">Students</a> | <a href="{{ route('courses.index') }}">Courses</a></nav>
    <h1>{{ $student->name }}</h1>
    @if (session('success'))<p class="success">{{ session('success') }}</p>@endif
    <dl>
        <dt>Email</dt><dd>{{ $student->email }}</dd>
        <dt>Phone</dt><dd>{{ $student->phone }}</dd>
        <dt>Address</dt><dd>{{ $student->address ?: 'Not provided' }}</dd>
        <dt>Date of birth</dt><dd>{{ $student->date_of_birth?->format('Y-m-d') ?: 'Not provided' }}</dd>
    </dl>
    <p><a href="{{ route('students.edit', $student) }}">Edit</a> | <a href="{{ route('students.index') }}">Back to students</a></p>
    <form method="POST" action="{{ route('students.destroy', $student) }}">@csrf @method('DELETE')<button type="submit">Delete Student</button></form>
</body>
</html>
