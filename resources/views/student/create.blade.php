<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Student</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 2rem; }
        label { display: block; margin-top: 1rem; }
        input, textarea { display: block; margin-top: .25rem; max-width: 32rem; padding: .4rem; width: 100%; }
        .error { color: #b42318; }
        nav { margin-bottom: 1.5rem; }
        a { text-decoration: none; color: #464feb; }
    </style>
</head>
<body>
    <nav><a href="{{ route('students.index') }}">Students</a> | <a href="{{ route('courses.index') }}">Courses</a></nav>
    <h1>Create Student</h1>

    @if ($errors->any())
        <div class="error">
            <strong>Please fix the following errors:</strong>
            <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
        </div>
    @endif

    <form method="POST" action="{{ route('students.store') }}">
        @csrf
        <label>Name <input type="text" name="name" value="{{ old('name') }}" required></label>
        <label>Email <input type="email" name="email" value="{{ old('email') }}" required></label>
        <label>Phone <input type="text" name="phone" value="{{ old('phone') }}" required></label>
        <label>Address <textarea name="address" rows="4">{{ old('address') }}</textarea></label>
        <label>Date of birth <input type="date" name="date_of_birth" value="{{ old('date_of_birth') }}"></label>
        <p><button type="submit">Create Student</button> <a href="{{ route('students.index') }}">Cancel</a></p>
    </form>
</body>
</html>
