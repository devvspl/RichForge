<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

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
                'dark_mode' => $config->dark_mode ?? false,
            ],
            'message' => 'Project configuration fetched successfully.'
        ]);
    }
}

