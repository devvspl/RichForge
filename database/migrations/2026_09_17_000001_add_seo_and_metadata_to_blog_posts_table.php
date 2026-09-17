<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('blog_posts', function (Blueprint $table) {
            $table->string('meta_title')->nullable()->after('published_at');
            $table->text('meta_description')->nullable()->after('meta_title');
            $table->string('focus_keyword')->nullable()->after('meta_description');
            $table->string('canonical_url')->nullable()->after('focus_keyword');
            $table->string('robots')->default('index, follow')->after('canonical_url');
            $table->string('featured_image')->nullable()->after('robots');
            $table->string('featured_image_alt')->nullable()->after('featured_image');
            $table->string('og_title')->nullable()->after('featured_image_alt');
            $table->text('og_description')->nullable()->after('og_title');
            $table->string('og_image')->nullable()->after('og_description');
            $table->string('category')->nullable()->after('og_image');
            $table->string('tags')->nullable()->after('category');
        });
    }

    public function down(): void
    {
        Schema::table('blog_posts', function (Blueprint $table) {
            $table->dropColumn([
                'meta_title',
                'meta_description',
                'focus_keyword',
                'canonical_url',
                'robots',
                'featured_image',
                'featured_image_alt',
                'og_title',
                'og_description',
                'og_image',
                'category',
                'tags',
            ]);
        });
    }
};
