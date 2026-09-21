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
        ]);

        Plan::firstOrCreate(['slug' => 'pro'], [
            'name' => 'Developer Pro',
            'price_monthly' => 29.00,
            'max_projects' => 25,
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
    "link", "codeBlock", "source", "fullscreen"
  ],
  onChange: (html) => console.log("Updated HTML:", html),
  onError: (err) => console.error("Editor error:", err)
});
```',
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
                'published_at' => now()->subDays(1),
            ],
            [
                'title' => 'Customizing Toolbar Components in RichForge Editor',
                'slug' => 'customizing-toolbar-components-richforge-editor',
                'excerpt' => 'Guide to adding custom buttons, color pickers, and custom dropdown menus to the editor toolbar.',
                'content' => 'The RichForge editor toolbar is highly modular. You can easily register custom buttons, dropdown menus, and custom formatters using the JavaScript SDK API.',
                'author' => 'Frontend Engineering Team',
                'published_at' => now()->subDays(2),
            ],
            [
                'title' => 'Optimizing SDK Performance & Bundle Size',
                'slug' => 'optimizing-sdk-performance-bundle-size',
                'excerpt' => 'Best practices for fast loading times, lightweight asset delivery, and efficient DOM rendering.',
                'content' => 'Delivering a high-performance rich text editor requires lightweight scripts and minimal DOM overhead. Learn how RichForge ensures rapid load times across web applications.',
                'author' => 'Infrastructure Team',
                'published_at' => now()->subDays(3),
            ],
            [
                'title' => 'Building Collaborative Editors with WebSockets & CRDTs',
                'slug' => 'building-collaborative-editors-websockets-crdts',
                'excerpt' => 'Exploring operational transformation and real-time multi-user document editing architectures.',
                'content' => 'Real-time collaborative editing requires synchronization algorithms that prevent document divergence. Discover how RichForge connects with WebSocket backends for live collaboration.',
                'author' => 'Distributed Systems Team',
                'published_at' => now()->subDays(4),
            ],
            [
                'title' => 'Dark Mode and Custom CSS Theme Creation for Web Editors',
                'slug' => 'dark-mode-custom-css-theme-creation-web-editors',
                'excerpt' => 'How to design seamless dark themes and custom CSS variables for embeddable editor controls.',
                'content' => 'A great text editor adapts seamlessly to the host application look and feel. Learn how CSS custom properties allow instantaneous theme switching.',
                'author' => 'Design & UX Team',
                'published_at' => now()->subDays(5),
            ],
            [
                'title' => 'Handling Markdown and Clean HTML Output Conversion',
                'slug' => 'handling-markdown-clean-html-output-conversion',
                'excerpt' => 'Convert rich text documents back and forth between Markdown syntax and clean semantic HTML.',
                'content' => 'Developers often require bidirectional conversion between Markdown and HTML. Discover RichForge conversion utilities for fast client-side transformation.',
                'author' => 'Core SDK Team',
                'published_at' => now()->subDays(6),
            ],
            [
                'title' => 'Configuring Domain Whitelists for Public API Keys',
                'slug' => 'configuring-domain-whitelists-public-api-keys',
                'excerpt' => 'Secure your public embed keys against domain spoofing and unauthorized third-party embeds.',
                'content' => 'Protecting your public API key ensures third parties cannot hijack your project quota. Set up HTTP origin domain whitelisting in seconds.',
                'author' => 'Security & Compliance Team',
                'published_at' => now()->subDays(7),
            ],
        ];

        foreach ($posts as $post) {
            BlogPost::firstOrCreate(['slug' => $post['slug']], $post);
        }
    }
}
