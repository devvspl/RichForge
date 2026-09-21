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
        'dark_mode',
    ];

    protected $casts = [
        'toolbar_json' => 'array',
        'dark_mode' => 'boolean',
        'height' => 'integer',
    ];

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }
}
