<x-layouts.app title="Edit Course">
    <h1>Edit Course</h1>

    <form method="POST" action="{{ route('courses.update', $course) }}" class="form">
        @csrf
        @method('PUT')
        @include('course._form', ['course' => $course])
        <div class="form-actions">
            <button type="submit" class="button">Update Course</button>
            <a class="button button-secondary" href="{{ route('courses.show', $course) }}">Cancel</a>
        </div>
    </form>
</x-layouts.app>
