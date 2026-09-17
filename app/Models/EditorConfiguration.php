<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EditorConfiguration extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'height',
        'placeholder',
        'theme',
        'toolbar_json',
        'upload_enabled',
        'max_file_size_mb',
        'allowed_extensions_json',
        'dark_mode',
    ];

    protected $casts = [
        'toolbar_json' => 'array',
        'allowed_extensions_json' => 'array',
        'upload_enabled' => 'boolean',
        'dark_mode' => 'boolean',
        'height' => 'integer',
        'max_file_size_mb' => 'integer',
    ];

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }
}
