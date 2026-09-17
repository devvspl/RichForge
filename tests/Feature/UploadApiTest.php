<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Project;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class UploadApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_image_upload_succeeds_with_valid_project_key(): void
    {
        Storage::fake('public');

        $user = User::factory()->create();
        $project = $user->projects()->create(['name' => 'Upload Test Project']);

        $file = UploadedFile::fake()->image('test_photo.png', 400, 400);

        $response = $this->withHeaders([
            'X-Project-Key' => $project->project_key,
        ])->postJson('/api/v1/upload', [
            'file' => $file,
        ]);

        $response->assertStatus(200);
        $response->assertJson(['success' => true]);

        $this->assertEquals(1, $project->media()->count());
    }

    public function test_upload_fails_without_project_key(): void
    {
        $file = UploadedFile::fake()->image('test_photo.png');

        $response = $this->postJson('/api/v1/upload', [
            'file' => $file,
        ]);

        $response->assertStatus(401);
    }
}
