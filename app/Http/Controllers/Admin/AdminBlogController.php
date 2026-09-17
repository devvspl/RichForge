<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdminBlogController extends Controller
{
    public function index(Request $request)
    {
        $search = trim($request->query('search', ''));
        $query = BlogPost::query();

        if (!empty($search)) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('author', 'like', "%{$search}%")
                  ->orWhere('excerpt', 'like', "%{$search}%")
                  ->orWhere('category', 'like', "%{$search}%")
                  ->orWhere('tags', 'like', "%{$search}%");
            });
        }

        $posts = $query->latest()->paginate(10)->withQueryString();

        return view('admin.blogs.index', compact('posts', 'search'));
    }

    public function create()
    {
        return view('admin.blogs.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:blog_posts,slug',
            'excerpt' => 'required|string',
            'content' => 'required|string',
            'author' => 'required|string|max:255',
            'published_at' => 'nullable|date',
            'is_published' => 'nullable|boolean',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'focus_keyword' => 'nullable|string|max:255',
            'canonical_url' => 'nullable|url|max:255',
            'robots' => 'nullable|string|max:50',
            'featured_image' => 'nullable|string|max:500',
            'featured_image_file' => 'nullable|image|max:5120',
            'featured_image_alt' => 'nullable|string|max:255',
            'og_title' => 'nullable|string|max:255',
            'og_description' => 'nullable|string',
            'og_image' => 'nullable|string|max:500',
            'og_image_file' => 'nullable|image|max:5120',
            'category' => 'nullable|string|max:255',
            'tags' => 'nullable|string|max:255',
            'faqs' => 'nullable|array',
            'faqs.*.question' => 'nullable|string|max:255',
            'faqs.*.answer' => 'nullable|string',
        ]);

        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title']);
        }

        if (empty($validated['published_at'])) {
            $validated['published_at'] = now();
        }

        if (empty($validated['robots'])) {
            $validated['robots'] = 'index, follow';
        }

        // Handle Featured Image Upload
        if ($request->hasFile('featured_image_file')) {
            $path = $request->file('featured_image_file')->store('blog', 'public');
            $validated['featured_image'] = Storage::url($path);
        }

        // Handle OG Image Upload
        if ($request->hasFile('og_image_file')) {
            $path = $request->file('og_image_file')->store('blog', 'public');
            $validated['og_image'] = Storage::url($path);
        }

        // Require Alt Text if a featured image exists (file or URL)
        if (!empty($validated['featured_image']) && empty($validated['featured_image_alt'])) {
            $validated['featured_image_alt'] = $validated['title'];
        }

        // Clean FAQs array
        if (!empty($validated['faqs'])) {
            $validated['faqs'] = array_values(array_filter($validated['faqs'], function ($faq) {
                return !empty(trim($faq['question'] ?? '')) || !empty(trim($faq['answer'] ?? ''));
            }));
        }

        BlogPost::create($validated);

        return redirect()->route('admin.blogs.index')->with('success', 'Blog post created successfully!');
    }

    public function edit(int $id)
    {
        $post = BlogPost::findOrFail($id);
        return view('admin.blogs.edit', compact('post'));
    }

    public function update(Request $request, int $id)
    {
        $post = BlogPost::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:blog_posts,slug,' . $id,
            'excerpt' => 'required|string',
            'content' => 'required|string',
            'author' => 'required|string|max:255',
            'published_at' => 'nullable|date',
            'is_published' => 'nullable|boolean',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'focus_keyword' => 'nullable|string|max:255',
            'canonical_url' => 'nullable|url|max:255',
            'robots' => 'nullable|string|max:50',
            'featured_image' => 'nullable|string|max:500',
            'featured_image_file' => 'nullable|image|max:5120',
            'featured_image_alt' => 'nullable|string|max:255',
            'og_title' => 'nullable|string|max:255',
            'og_description' => 'nullable|string',
            'og_image' => 'nullable|string|max:500',
            'og_image_file' => 'nullable|image|max:5120',
            'category' => 'nullable|string|max:255',
            'tags' => 'nullable|string|max:255',
            'faqs' => 'nullable|array',
            'faqs.*.question' => 'nullable|string|max:255',
            'faqs.*.answer' => 'nullable|string',
        ]);

        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title']);
        }

        // Handle Featured Image Upload
        if ($request->hasFile('featured_image_file')) {
            $path = $request->file('featured_image_file')->store('blog', 'public');
            $validated['featured_image'] = Storage::url($path);
        }

        // Handle OG Image Upload
        if ($request->hasFile('og_image_file')) {
            $path = $request->file('og_image_file')->store('blog', 'public');
            $validated['og_image'] = Storage::url($path);
        }

        // Ensure Alt text if featured image present
        if (!empty($validated['featured_image']) && empty($validated['featured_image_alt'])) {
            $validated['featured_image_alt'] = $post->featured_image_alt ?: $validated['title'];
        }

        // Clean FAQs array
        if (isset($validated['faqs'])) {
            $validated['faqs'] = array_values(array_filter($validated['faqs'], function ($faq) {
                return !empty(trim($faq['question'] ?? '')) || !empty(trim($faq['answer'] ?? ''));
            }));
        } else {
            $validated['faqs'] = [];
        }

        $post->update($validated);

        return redirect()->route('admin.blogs.index')->with('success', 'Blog post updated successfully!');
    }

    public function destroy(int $id)
    {
        $post = BlogPost::findOrFail($id);
        $post->delete();

        return redirect()->route('admin.blogs.index')->with('success', 'Blog post deleted successfully!');
    }
}
