<nav class="navbar">
    <a class="navbar-brand" href="{{ route('students.index') }}">Training Institute</a>
    <div class="navbar-links">
        <a class="{{ request()->routeIs('students.*') ? 'active' : '' }}" href="{{ route('students.index') }}">Students</a>
        <a class="{{ request()->routeIs('courses.*') ? 'active' : '' }}" href="{{ route('courses.index') }}">Courses</a>
    </div>
</nav>
