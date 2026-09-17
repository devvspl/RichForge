<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;

class ProjectApiController extends Controller
{
    public function config(Request $request): JsonResponse
    {
        $project = $request->attributes->get('project');
        $config = $project->configuration;

        return response()->json([
            'success' => true,
            'data' => [
                'project_name' => $project->name,
                'project_key' => $project->project_key,
                'height' => $config->height ?? 350,
                'placeholder' => $config->placeholder ?? 'Start typing...',
                'theme' => $config->theme ?? 'default',
                'upload_enabled' => $config->upload_enabled ?? true,
                'dark_mode' => $config->dark_mode ?? false,
            ],
            'message' => 'Project configuration fetched successfully.'
        ]);
    }

    public function deleteUpload(Request $request, int $id): JsonResponse
    {
        $project = $request->attributes->get('project');
        $media = Media::where('project_id', $project->id)->where('id', $id)->first();

        if (!$media) {
            return response()->json([
                'success' => false,
                'code' => 'NOT_FOUND',
                'message' => 'Media file not found for this project.'
            ], 404);
        }

        if (Storage::exists($media->disk_path)) {
            Storage::delete($media->disk_path);
        }

        $media->delete();

        return response()->json([
            'success' => true,
            'message' => 'File deleted successfully.'
        ]);
    }
}
