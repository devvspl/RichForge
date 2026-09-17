<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Project;
use App\Models\Plan;
use App\Models\BlogPost;
use App\Models\DocumentationPage;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Seed Demo & Admin User
        $admin = User::firstOrCreate(
            ['email' => 'admin@richforge.com'],
            [
                'name' => 'RichForge Admin',
                'password' => Hash::make('password123'),
                'is_admin' => true,
            ]
        );

        $developer = User::firstOrCreate(
            ['email' => 'dev@example.com'],
            [
                'name' => 'Demo Developer',
                'password' => Hash::make('password123'),
                'is_admin' => false,
            ]
        );

        // 2. Create Demo Projects for Developer
        if ($developer->projects()->count() === 0) {
            $p1 = $developer->projects()->create([
                'name' => 'My Production Web Application',
                'description' => 'Main blog and CMS rich text editor integration.',
                'project_key' => 'rf_pub_demo_prod_1234567890abcdef',
            ]);

            $p2 = $developer->projects()->create([
                'name' => 'Internal Support Portal',
                'description' => 'Ticket and knowledge base rich text editor.',
                'project_key' => 'rf_pub_demo_support_9876543210fedcba',
            ]);
        }

        // 3. Seed Free & Pro Plans
        Plan::firstOrCreate(['slug' => 'free'], [
            'name' => 'Community Free',
            'price_monthly' => 0.00,
            'max_projects' => 5,
            'max_storage_mb' => 1000,
            'max_uploads_per_month' => 5000,
        ]);

        Plan::firstOrCreate(['slug' => 'pro'], [
            'name' => 'Developer Pro',
            'price_monthly' => 29.00,
            'max_projects' => 25,
            'max_storage_mb' => 25000,
            'max_uploads_per_month' => 100000,
        ]);

        // 4. Seed Documentation Pages
        $docs = [
            [
                'title' => 'Getting Started in 5 Minutes',
                'slug' => 'getting-started',
                'category' => 'getting-started',
                'order' => 1,
                'content' => '## Getting Started with RichForge

Welcome to RichForge! Adding a fast, embeddable WYSIWYG editor to your website takes less than 5 minutes.

### Step 1: Create an Account & Project
Register your free developer account and create a project in the Dashboard to obtain your unique **Public Project Key** (`rf_pub_...`).

### Step 2: Include the Script & Stylesheet
Add the RichForge JavaScript SDK to your website `<head>` or before the closing `</body>` tag:

```html
<script src="http://localhost:8000/cdn/v1/richforge.js"></script>
<link rel="stylesheet" href="http://localhost:8000/cdn/v1/richforge.css" />
```

### Step 3: Initialize the Editor
Target any standard `<textarea>` element:

```html
<textarea id="my-editor">Start writing your content here...</textarea>

<script>
  RichForge.create("#my-editor", {
    projectKey: "rf_pub_demo_prod_1234567890abcdef",
    height: 400,
    placeholder: "Write something extraordinary..."
  });
</script>
```',
            ],
            [
                'title' => 'SDK Configuration & API Options',
                'slug' => 'configuration',
                'category' => 'sdk',
                'order' => 2,
                'content' => '## Configuration Reference

Customize toolbar layout, height, themes, and event handlers during initialization:

```js
const editor = RichForge.create("#editor", {
  projectKey: "rf_pub_xxxxxx",
  height: 500,
  theme: "default", // default, minimal, dark
  darkMode: false,
  placeholder: "Start typing...",
  toolbar: [
    "undo", "redo", "heading", "bold", "italic", "underline",
    "textColor", "alignment", "bulletList", "numberList",
    "link", "image", "table", "codeBlock", "source", "fullscreen"
  ],
  upload: {
    enabled: true
  },
  onChange: (html) => console.log("Updated HTML:", html),
  onUpload: (file) => console.log("Uploaded file:", file),
  onError: (err) => console.error("Editor error:", err)
});
```',
            ],
            [
                'title' => 'Image & File Upload Setup',
                'slug' => 'upload',
                'category' => 'uploads',
                'order' => 3,
                'content' => '## Image & File Upload API

RichForge provides built-in drag-and-drop file uploading directly to your secure server storage.

### Supported File Types
- **Images**: JPG, PNG, GIF, WEBP
- **Documents**: PDF, DOC, DOCX, XLS, XLSX, CSV, TXT, ZIP

### Server Storage Structure
Uploaded media is organized safely per project:
`storage/app/public/projects/{project_id}/uploads/{year}/{month}/{hash}.ext`',
            ],
        ];

        foreach ($docs as $doc) {
            DocumentationPage::firstOrCreate(['slug' => $doc['slug']], $doc);
        }

        // 5. Seed Blog Posts
        $posts = [
            [
                'title' => 'How to Embed a WYSIWYG Editor into Laravel Applications',
                'slug' => 'how-to-embed-wysiwyg-editor-laravel',
                'excerpt' => 'Learn how to integrate the RichForge JS SDK into Blade views with image upload handling.',
                'content' => 'Building modern content management systems requires a powerful, reliable editor. In this tutorial, we cover how to embed RichForge in a Laravel application with zero external dependencies.',
                'author' => 'RichForge Core Engineering',
                'published_at' => now(),
            ],
            [
                'title' => 'HTML Sanitization and XSS Prevention in Rich Text Editors',
                'slug' => 'html-sanitization-xss-prevention-rich-text-editor',
                'excerpt' => 'A deep dive into client-side and server-side HTML cleaning rules to protect your users.',
                'content' => 'Rich text editors allow user-submitted HTML. Without proper sanitization, malicious script tags or onerror event handlers can compromise application security. Learn how RichForge enforces strict XSS filters.',
                'author' => 'RichForge Security Team',
                'published_at' => now(),
            ],
        ];

        foreach ($posts as $post) {
            BlogPost::firstOrCreate(['slug' => $post['slug']], $post);
        }
    }
}
