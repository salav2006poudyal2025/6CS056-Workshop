<!DOCTYPE html>
<html lang="en">
<head><meta charset="UTF-8"><title>Edit Student</title><style>body{font-family:Arial,sans-serif;margin:2rem}label{display:block;margin-top:1rem}input,textarea{display:block;margin-top:.25rem;max-width:32rem;padding:.4rem;width:100%}.error{color:#b42318}a{color:#464feb;text-decoration:none}</style></head>
<body>
    <nav><a href="{{ route('students.index') }}">Students</a> | <a href="{{ route('courses.index') }}">Courses</a></nav>
    <h1>Edit Student</h1>
    @if ($errors->any())<div class="error"><strong>Please fix the following errors:</strong><ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>@endif
    <form method="POST" action="{{ route('students.update', $student) }}">
        @csrf @method('PUT')
        <label>Name <input type="text" name="name" value="{{ old('name', $student->name) }}" required></label>
        <label>Email <input type="email" name="email" value="{{ old('email', $student->email) }}" required></label>
        <label>Phone <input type="text" name="phone" value="{{ old('phone', $student->phone) }}" required></label>
        <label>Address <textarea name="address" rows="4">{{ old('address', $student->address) }}</textarea></label>
        <label>Date of birth <input type="date" name="date_of_birth" value="{{ old('date_of_birth', $student->date_of_birth?->format('Y-m-d')) }}"></label>
        <p><button type="submit">Update Student</button> <a href="{{ route('students.show', $student) }}">Cancel</a></p>
    </form>
</body>
</html>
