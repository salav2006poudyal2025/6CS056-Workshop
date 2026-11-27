<?php

namespace Tests\Feature\Http\Controllers\Api;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CourseControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_course_resource_supports_crud_and_serializes_course_attributes(): void
    {
        $courseData = [
            'name' => 'API Development',
            'description' => 'Build REST APIs.',
            'duration' => 8,
            'fee' => 1250.5,
            'difficulty' => 'Medium',
            'is_active' => false,
        ];

        $created = $this->postJson('/api/courses', $courseData)
            ->assertCreated()
            ->assertJsonPath('data.name', 'API Development')
            ->assertJsonPath('data.duration', 8)
            ->assertJsonPath('data.fee', '1250.50')
            ->assertJsonPath('data.difficulty', 'Medium')
            ->assertJsonPath('data.is_active', false);

        $courseId = $created->json('data.id');
        $this->assertDatabaseHas('courses', [
            'id' => $courseId,
            'fee' => '1250.50',
            'is_active' => false,
        ]);

        $this->getJson("/api/courses/{$courseId}")
            ->assertOk()
            ->assertJsonPath('data.id', $courseId);

        $this->getJson('/api/courses')
            ->assertOk()
            ->assertJsonCount(1, 'data');

        $courseData['name'] = 'Advanced API Development';
        $courseData['is_active'] = true;
        $this->putJson("/api/courses/{$courseId}", $courseData)
            ->assertOk()
            ->assertJsonPath('data.name', 'Advanced API Development')
            ->assertJsonPath('data.is_active', true);
        $this->assertDatabaseHas('courses', [
            'id' => $courseId,
            'name' => 'Advanced API Development',
            'is_active' => true,
        ]);

        $this->deleteJson("/api/courses/{$courseId}")
            ->assertNoContent();
        $this->assertDatabaseMissing('courses', ['id' => $courseId]);
    }

    public function test_invalid_course_attributes_return_422_without_creating_a_record(): void
    {
        $this->postJson('/api/courses', [
            'name' => 'Invalid Course',
            'description' => null,
            'duration' => 0,
            'fee' => -1,
            'difficulty' => 'Expert',
        ])
            ->assertUnprocessable()
            ->assertJsonValidationErrors(['duration', 'fee', 'difficulty']);

        $this->assertDatabaseCount('courses', 0);
    }
}
