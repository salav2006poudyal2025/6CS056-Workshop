<x-layouts.app title="Edit Student">
    <h1>Edit Student</h1>

    <form method="POST" action="{{ route('students.update', $student) }}" class="form">
        @csrf
        @method('PUT')
        <x-students.form :student="$student" />
        <div class="form-actions">
            <button type="submit" class="button">Update Student</button>
            <a class="button button-secondary" href="{{ route('students.show', $student) }}">Cancel</a>
        </div>
    </form>
</x-layouts.app>
