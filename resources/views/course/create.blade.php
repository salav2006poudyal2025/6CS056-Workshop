<x-layouts.app title="Create Course">
    <h1>Create Course</h1>

    <form method="POST" action="{{ route('courses.store') }}" class="form">
        @csrf
        @include('course._form')
        <div class="form-actions">
            <button type="submit" class="button">Create Course</button>
            <a class="button button-secondary" href="{{ route('courses.index') }}">Cancel</a>
        </div>
    </form>
</x-layouts.app>
