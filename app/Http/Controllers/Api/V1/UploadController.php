<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Services\UploadService;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class UploadController extends Controller
{
    protected UploadService $uploadService;

    public function __construct(UploadService $uploadService)
    {
        $this->uploadService = $uploadService;
    }

    public function upload(Request $request): JsonResponse
    {
        $request->validate([
            'file' => 'required|file',
        ]);

        $project = $request->attributes->get('project');

        try {
            $result = $this->uploadService->handleUpload($project, $request->file('file'));

            return response()->json([
                'success' => true,
                'data' => $result,
                'message' => 'File uploaded successfully.'
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'code' => 'UPLOAD_ERROR',
                'message' => $e->getMessage()
            ], 400);
        }
    }
}
