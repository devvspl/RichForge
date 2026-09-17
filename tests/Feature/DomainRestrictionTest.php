<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Project;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DomainRestrictionTest extends TestCase
{
    use RefreshDatabase;

    public function test_api_blocks_unauthorized_domain_origin(): void
    {
        $user = User::factory()->create();
        $project = $user->projects()->create(['name' => 'Secure App']);
        
        // Remove localhost default domain for testing strict rejection
        $project->domains()->delete();
        $project->domains()->create(['domain' => 'allowed-app.com', 'is_active' => true]);

        $response = $this->withHeaders([
            'X-Project-Key' => $project->project_key,
            'Origin' => 'https://unauthorized-hacker-site.com',
        ])->getJson('/api/v1/project/config');

        $response->assertStatus(403);
        $response->assertJson([
            'success' => false,
            'code' => 'DOMAIN_NOT_ALLOWED'
        ]);
    }

    public function test_api_allows_whitelisted_domain_and_wildcards(): void
    {
        $user = User::factory()->create();
        $project = $user->projects()->create(['name' => 'Wildcard App']);
        $project->domains()->create(['domain' => '*.mysaas.com', 'is_active' => true]);

        $response = $this->withHeaders([
            'X-Project-Key' => $project->project_key,
            'Origin' => 'https://tenant1.mysaas.com',
        ])->getJson('/api/v1/project/config');

        $response->assertStatus(200);
        $response->assertJson(['success' => true]);
    }
}
