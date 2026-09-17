<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Str;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'slug',
        'project_key',
        'status',
        'description',
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($project) {
            if (empty($project->slug)) {
                $project->slug = Str::slug($project->name) . '-' . Str::random(5);
            }
            if (empty($project->project_key)) {
                $project->project_key = 'rf_pub_' . Str::random(24);
            }
        });

        static::created(function ($project) {
            // Auto-create default editor configuration
            $project->configuration()->create([
                'height' => 350,
                'placeholder' => 'Start writing here...',
                'theme' => 'default',
                'upload_enabled' => true,
                'max_file_size_mb' => 10,
                'dark_mode' => false,
            ]);

            // Auto-create default domain (localhost)
            $project->domains()->create([
                'domain' => 'localhost',
                'is_active' => true,
            ]);

            // Auto-create default API Key
            $project->apiKeys()->create([
                'name' => 'Default Secret Key',
                'type' => 'secret',
                'prefix' => 'rf_sec_',
                'key_hash' => hash('sha256', $secKey = 'rf_sec_' . Str::random(32)),
                'display_key' => substr($secKey, 0, 10) . '...' . substr($secKey, -4),
            ]);
        });
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function apiKeys(): HasMany
    {
        return $this->hasMany(ProjectApiKey::class);
    }

    public function domains(): HasMany
    {
        return $this->hasMany(ProjectDomain::class);
    }

    public function configuration(): HasOne
    {
        return $this->hasOne(EditorConfiguration::class);
    }

    public function media(): HasMany
    {
        return $this->hasMany(Media::class);
    }

    public function usageRecords(): HasMany
    {
        return $this->hasMany(UsageRecord::class);
    }
}
