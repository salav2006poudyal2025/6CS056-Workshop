<x-layouts.app :title="$course->name">
    <h1>{{ $course->name }}</h1>

    <dl class="details">
        <dt>Description</dt><dd>{{ $course->description ?: 'Not provided' }}</dd>
        <dt>Duration</dt><dd>{{ $course->duration }}</dd>
        <dt>Fee</dt><dd>{{ number_format((float) $course->fee, 2) }}</dd>
        <dt>Difficulty</dt><dd>{{ $course->difficulty }}</dd>
        <dt>Active</dt><dd>{{ $course->is_active ? 'Yes' : 'No' }}</dd>
    </dl>

    <div class="detail-actions">
        <a class="button" href="{{ route('courses.edit', $course) }}">Edit</a>
        <a class="button button-secondary" href="{{ route('courses.index') }}">Back to courses</a>
        <x-delete-form
            :action="route('courses.destroy', $course)"
            label="Delete Course"
        />
    </div>
</x-layouts.app>
