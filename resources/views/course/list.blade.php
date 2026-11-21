<x-layouts.app title="Courses">
    <div class="page-heading">
        <h1>Courses</h1>
        <a class="button" href="{{ route('courses.create') }}">Create Course</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Duration</th>
                <th>Fee</th>
                <th>Difficulty</th>
                <th>Active</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($courses as $course)
                <tr>
                    <td>{{ $course->name }}</td>
                    <td>{{ $course->duration }}</td>
                    <td>{{ number_format((float) $course->fee, 2) }}</td>
                    <td>{{ $course->difficulty }}</td>
                    <td>{{ $course->is_active ? 'Yes' : 'No' }}</td>
                    <td class="actions">
                        <a class="button button-secondary" href="{{ route('courses.show', $course) }}">View</a>
                        <a class="button button-secondary" href="{{ route('courses.edit', $course) }}">Edit</a>
                        <x-delete-form
                            :action="route('courses.destroy', $course)"
                            label="Delete"
                        />
                    </td>
                </tr>
            @empty
                <tr><td colspan="6">No courses found.</td></tr>
            @endforelse
        </tbody>
    </table>
</x-layouts.app>
