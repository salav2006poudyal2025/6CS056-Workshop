<x-layouts.app title="Students">
    <div class="page-heading">
        <h1>Students</h1>
        <a class="button" href="{{ route('students.create') }}">Create Student</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($students as $student)
                <tr>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->phone }}</td>
                    <td class="actions">
                        <a class="button button-secondary" href="{{ route('students.show', $student) }}">View</a>
                        <a class="button button-secondary" href="{{ route('students.edit', $student) }}">Edit</a>
                        <x-delete-form
                            :action="route('students.destroy', $student)"
                            label="Delete"
                        />
                    </td>
                </tr>
            @empty
                <tr><td colspan="4">No students found.</td></tr>
            @endforelse
        </tbody>
    </table>
</x-layouts.app>
