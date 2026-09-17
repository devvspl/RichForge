<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Project;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProjectTest extends TestCase
{
    use RefreshDatabase;

    public function test_authenticated_user_can_create_project(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post('/projects', [
            'name' => 'Laravel App Integration',
            'description' => 'Testing editor setup',
        ]);

        $this->assertEquals(1, $user->projects()->count());
        $project = $user->projects()->first();
        $this->assertStringStartsWith('rf_pub_', $project->project_key);
    }

    public function test_user_cannot_access_other_users_project(): void
    {
        $user1 = User::factory()->create();
        $user2 = User::factory()->create();

        $project = $user1->projects()->create(['name' => 'User 1 Project']);

        $response = $this->actingAs($user2)->get("/projects/{$project->id}");
        $response->assertStatus(404);
    }
}
