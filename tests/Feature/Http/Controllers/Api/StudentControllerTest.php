<?php

namespace Tests\Feature\Http\Controllers\Api;

use App\Models\Student;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class StudentControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_student_resource_supports_crud_and_formats_date_and_age(): void
    {
        $this->travelTo('2025-01-01 12:00:00');
        $studentData = [
            'name' => 'Ada Lovelace',
            'email' => 'ada@example.com',
            'phone' => '555-0101',
            'address' => 'London',
            'date_of_birth' => '2000-01-01',
        ];

        $created = $this->postJson('/api/students', $studentData)
            ->assertCreated()
            ->assertJsonPath('data.name', 'Ada Lovelace')
            ->assertJsonPath('data.date_of_birth', '2000-01-01')
            ->assertJsonPath('data.age', 25);

        $studentId = $created->json('data.id');
        $this->assertDatabaseHas('students', ['id' => $studentId, 'email' => 'ada@example.com']);

        $this->getJson("/api/students/{$studentId}")
            ->assertOk()
            ->assertJsonPath('data.id', $studentId)
            ->assertJsonPath('data.age', 25);

        $this->getJson('/api/students')
            ->assertOk()
            ->assertJsonCount(1, 'data');

        $studentData['name'] = 'Ada Byron';
        $this->putJson("/api/students/{$studentId}", $studentData)
            ->assertOk()
            ->assertJsonPath('data.name', 'Ada Byron');
        $this->assertDatabaseHas('students', ['id' => $studentId, 'name' => 'Ada Byron']);

        $this->deleteJson("/api/students/{$studentId}")
            ->assertNoContent();
        $this->assertDatabaseMissing('students', ['id' => $studentId]);
    }

    public function test_duplicate_student_email_returns_422_without_creating_a_record(): void
    {
        Student::query()->create([
            'name' => 'Existing Student',
            'email' => 'existing@example.com',
            'phone' => '555-0100',
        ]);

        $this->postJson('/api/students', [
            'name' => 'Another Student',
            'email' => 'existing@example.com',
            'phone' => '555-0102',
        ])
            ->assertUnprocessable()
            ->assertJsonPath('errors.email.0', 'The email has already been taken.');

        $this->assertDatabaseCount('students', 1);
    }
}
