<?php

namespace App\Services;

use App\Models\Project;
use App\Models\Media;
use App\Models\UsageRecord;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class UploadService
{
    protected array $allowedMimes = [
        // Images
        'image/jpeg', 'image/png', 'image/gif', 'image/webp',
        // Documents
        'application/pdf', 'application/msword',
        'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
        'application/vnd.ms-excel',
        'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
        'text/csv', 'text/plain', 'application/zip'
    ];

    public function handleUpload(Project $project, UploadedFile $file): array
    {
        $config = $project->configuration;

        // Check if upload is enabled for project
        if ($config && !$config->upload_enabled) {
            throw new \Exception("File uploading is disabled for this project.");
        }

        // Validate MIME type
        $mime = $file->getMimeType();
        if (!in_array($mime, $this->allowedMimes)) {
            throw new \Exception("Invalid file type. Allowed types: JPG, PNG, GIF, WEBP, PDF, DOC, DOCX, XLS, XLSX, CSV, TXT, ZIP.");
        }

        // Validate max file size
        $maxBytes = ($config ? $config->max_file_size_mb : 10) * 1024 * 1024;
        if ($file->getSize() > $maxBytes) {
            $maxMb = $config ? $config->max_file_size_mb : 10;
            throw new \Exception("File size exceeds maximum allowed limit of {$maxMb}MB.");
        }

        // Generate safe random filename
        $extension = strtolower($file->getClientOriginalExtension() ?: 'bin');
        $randomFilename = Str::uuid()->toString() . '.' . $extension;

        // Directory structure: storage/app/public/projects/{project_id}/uploads/{year}/{month}/
        $year = date('Y');
        $month = date('m');
        $relativePath = "projects/{$project->id}/uploads/{$year}/{$month}";
        
        $path = $file->storeAs("public/{$relativePath}", $randomFilename);
        $publicUrl = asset("storage/{$relativePath}/{$randomFilename}");

        // Measure image dimensions if applicable
        $dimensions = null;
        if (str_starts_with($mime, 'image/')) {
            $imageInfo = @getimagesize($file->getRealPath());
            if ($imageInfo) {
                $dimensions = "{$imageInfo[0]}x{$imageInfo[1]}";
            }
        }

        // Save record in database
        $media = Media::create([
            'project_id' => $project->id,
            'filename' => $randomFilename,
            'original_name' => $file->getClientOriginalName(),
            'mime_type' => $mime,
            'size' => $file->getSize(),
            'dimensions' => $dimensions,
            'disk_path' => $path,
            'public_url' => $publicUrl,
        ]);

        // Record usage analytics
        $today = date('Y-m-d');
        $usage = UsageRecord::firstOrCreate(
            ['project_id' => $project->id, 'date' => $today],
            ['api_requests' => 0, 'editor_loads' => 0, 'uploads_count' => 0, 'storage_bytes' => 0]
        );
        $usage->increment('uploads_count');
        $usage->increment('storage_bytes', $file->getSize());

        return [
            'id' => $media->id,
            'url' => $publicUrl,
            'filename' => $media->filename,
            'original_name' => $media->original_name,
            'mime_type' => $media->mime_type,
            'size' => $media->size,
            'dimensions' => $media->dimensions,
        ];
    }
}
