<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Students</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 2rem; }
        table { border-collapse: collapse; margin-top: 1rem; width: 100%; }
        th, td { border: 1px solid #e6e6e6; padding: .6rem; text-align: left; }
        th { background-color: #f5f5f5; }
        a { text-decoration: none; color: #464feb; }
        .success { color: #147a42; }
    </style>
</head>
<body>
    <nav><a href="{{ route('students.index') }}">Students</a> | <a href="{{ route('courses.index') }}">Courses</a></nav>
    <h1>Students</h1>
    @if (session('success'))<p class="success">{{ session('success') }}</p>@endif
    <p><a href="{{ route('students.create') }}">Create Student</a></p>
    <table>
        <thead><tr><th>Name</th><th>Email</th><th>Phone</th><th>Actions</th></tr></thead>
        <tbody>
        @forelse ($students as $student)
            <tr>
                <td>{{ $student->name }}</td><td>{{ $student->email }}</td><td>{{ $student->phone }}</td>
                <td>
                    <a href="{{ route('students.show', $student) }}">View</a> |
                    <a href="{{ route('students.edit', $student) }}">Edit</a> |
                    <form method="POST" action="{{ route('students.destroy', $student) }}" style="display:inline">
                        @csrf @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr><td colspan="4">No students found.</td></tr>
        @endforelse
        </tbody>
    </table>
</body>
</html>
