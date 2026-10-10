<!DOCTYPE html>
<html lang="en">
<head><meta charset="UTF-8"><title>Courses</title><style>body{font-family:Arial,sans-serif;margin:2rem}table{border-collapse:collapse;margin-top:1rem;width:100%}th,td{border:1px solid #e6e6e6;padding:.6rem;text-align:left}th{background-color:#f5f5f5}a{color:#464feb;text-decoration:none}.success{color:#147a42}</style></head>
<body>
    <nav><a href="{{ route('students.index') }}">Students</a> | <a href="{{ route('courses.index') }}">Courses</a></nav>
    <h1>Courses</h1>
    @if (session('success'))<p class="success">{{ session('success') }}</p>@endif
    <p><a href="{{ route('courses.create') }}">Create Course</a></p>
    <table><thead><tr><th>Name</th><th>Duration</th><th>Fee</th><th>Difficulty</th><th>Active</th><th>Actions</th></tr></thead><tbody>
    @forelse ($courses as $course)
        <tr><td>{{ $course->name }}</td><td>{{ $course->duration }}</td><td>{{ number_format((float) $course->fee, 2) }}</td><td>{{ $course->difficulty }}</td><td>{{ $course->is_active ? 'Yes' : 'No' }}</td><td><a href="{{ route('courses.show', $course) }}">View</a> | <a href="{{ route('courses.edit', $course) }}">Edit</a> | <form method="POST" action="{{ route('courses.destroy', $course) }}" style="display:inline">@csrf @method('DELETE')<button type="submit">Delete</button></form></td></tr>
    @empty
        <tr><td colspan="6">No courses found.</td></tr>
    @endforelse
    </tbody></table>
</body>
</html>
