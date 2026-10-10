<!DOCTYPE html>
<html lang="en">
<head><meta charset="UTF-8"><title>Edit Course</title><style>body{font-family:Arial,sans-serif;margin:2rem}label{display:block;margin-top:1rem}input,textarea,select{display:block;margin-top:.25rem;max-width:32rem;padding:.4rem;width:100%}.error{color:#b42318}a{color:#464feb;text-decoration:none}</style></head>
<body>
    <nav><a href="{{ route('students.index') }}">Students</a> | <a href="{{ route('courses.index') }}">Courses</a></nav>
    <h1>Edit Course</h1>
    @if ($errors->any())<div class="error"><strong>Please fix the following errors:</strong><ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>@endif
    <form method="POST" action="{{ route('courses.update', $course) }}">
        @csrf @method('PUT')
        <label>Name <input type="text" name="name" value="{{ old('name', $course->name) }}" required></label>
        <label>Description <textarea name="description" rows="5">{{ old('description', $course->description) }}</textarea></label>
        <label>Duration (days) <input type="number" name="duration" value="{{ old('duration', $course->duration) }}" min="1" required></label>
        <label>Fee <input type="number" name="fee" value="{{ old('fee', $course->fee) }}" min="0" max="99999999.99" step="0.01" required></label>
        <label>Difficulty <select name="difficulty" required>@foreach (['Easy', 'Medium', 'Hard'] as $difficulty)<option value="{{ $difficulty }}" @selected(old('difficulty', $course->difficulty) === $difficulty)>{{ $difficulty }}</option>@endforeach</select></label>
        <label><input type="hidden" name="is_active" value="0"><input type="checkbox" name="is_active" value="1" @checked(old('is_active', $course->is_active))> Active</label>
        <p><button type="submit">Update Course</button> <a href="{{ route('courses.show', $course) }}">Cancel</a></p>
    </form>
</body>
</html>
