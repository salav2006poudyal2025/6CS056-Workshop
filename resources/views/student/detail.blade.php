<x-layouts.app :title="$student->name">
    <h1>{{ $student->name }}</h1>

    <dl class="details">
        <dt>Email</dt><dd>{{ $student->email }}</dd>
        <dt>Phone</dt><dd>{{ $student->phone }}</dd>
        <dt>Address</dt><dd>{{ $student->address ?: 'Not provided' }}</dd>
        <dt>Date of birth</dt><dd>{{ $student->date_of_birth?->format('Y-m-d') ?: 'Not provided' }}</dd>
        <dt>Age</dt><dd>{{ $student->age ?? 'Not available' }}</dd>
    </dl>

    <div class="detail-actions">
        <a class="button" href="{{ route('students.edit', $student) }}">Edit</a>
        <a class="button button-secondary" href="{{ route('students.index') }}">Back to students</a>
        <x-delete-form
            :action="route('students.destroy', $student)"
            label="Delete Student"
        />
    </div>
</x-layouts.app>
