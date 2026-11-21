<x-layouts.app title="Create Student">
    <h1>Create Student</h1>

    <form method="POST" action="{{ route('students.store') }}" class="form">
        @csrf
        <x-students.form />
        <div class="form-actions">
            <button type="submit" class="button">Create Student</button>
            <a class="button button-secondary" href="{{ route('students.index') }}">Cancel</a>
        </div>
    </form>
</x-layouts.app>
