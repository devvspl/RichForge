<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // 1. Projects
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('project_key')->unique(); // rf_pub_xxxxxxxxx
            $table->string('status')->default('active'); // active, suspended
            $table->text('description')->nullable();
            $table->timestamps();
        });

        // 2. Project API Keys (Secret & Public keys)
        Schema::create('project_api_keys', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->enum('type', ['public', 'secret'])->default('secret');
            $table->string('prefix');
            $table->string('key_hash')->unique();
            $table->string('display_key')->nullable();
            $table->timestamp('last_used_at')->nullable();
            $table->timestamp('expires_at')->nullable();
            $table->timestamps();
        });

        // 3. Project Whitelisted Domains
        Schema::create('project_domains', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->constrained()->onDelete('cascade');
            $table->string('domain'); // e.g. localhost, example.com, *.example.com
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        // 4. Editor Configurations
        Schema::create('editor_configurations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->constrained()->onDelete('cascade');
            $table->integer('height')->default(350);
            $table->text('placeholder')->nullable();
            $table->string('theme')->default('default');
            $table->json('toolbar_json')->nullable();
            $table->boolean('upload_enabled')->default(true);
            $table->integer('max_file_size_mb')->default(10);
            $table->json('allowed_extensions_json')->nullable();
            $table->boolean('dark_mode')->default(false);
            $table->timestamps();
        });

        // 5. Media Management
        Schema::create('media', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->constrained()->onDelete('cascade');
            $table->string('filename');
            $table->string('original_name');
            $table->string('mime_type');
            $table->bigInteger('size'); // in bytes
            $table->string('dimensions')->nullable();
            $table->string('disk_path');
            $table->string('public_url');
            $table->timestamps();
        });

        // 6. Usage Analytics
        Schema::create('usage_records', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->constrained()->onDelete('cascade');
            $table->date('date');
            $table->bigInteger('api_requests')->default(0);
            $table->bigInteger('editor_loads')->default(0);
            $table->bigInteger('uploads_count')->default(0);
            $table->bigInteger('storage_bytes')->default(0);
            $table->timestamps();

            $table->unique(['project_id', 'date']);
        });

        // 7. Billing Plans (Billing-ready)
        Schema::create('plans', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->decimal('price_monthly', 8, 2)->default(0.00);
            $table->integer('max_projects')->default(5);
            $table->bigInteger('max_storage_mb')->default(1000);
            $table->bigInteger('max_uploads_per_month')->default(5000);
            $table->timestamps();
        });

        // 8. Subscriptions
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('plan_id')->constrained()->onDelete('cascade');
            $table->string('status')->default('active');
            $table->timestamp('ends_at')->nullable();
            $table->timestamps();
        });

        // 9. Blog Posts
        Schema::create('blog_posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('excerpt')->nullable();
            $table->longText('content');
            $table->string('author')->default('RichForge Team');
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
        });

        // 10. Documentation Pages
        Schema::create('documentation_pages', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('category')->default('getting-started');
            $table->integer('order')->default(0);
            $table->longText('content');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('documentation_pages');
        Schema::dropIfExists('blog_posts');
        Schema::dropIfExists('subscriptions');
        Schema::dropIfExists('plans');
        Schema::dropIfExists('usage_records');
        Schema::dropIfExists('media');
        Schema::dropIfExists('editor_configurations');
        Schema::dropIfExists('project_domains');
        Schema::dropIfExists('project_api_keys');
        Schema::dropIfExists('projects');
    }
};
