<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $query = trim($request->query('q', ''));

        $postsQuery = BlogPost::query();

        if (!empty($query)) {
            $postsQuery->where(function ($q) use ($query) {
                $q->where('title', 'like', "%{$query}%")
                  ->orWhere('excerpt', 'like', "%{$query}%")
                  ->orWhere('content', 'like', "%{$query}%")
                  ->orWhere('author', 'like', "%{$query}%");
            });
        }

        $posts = $postsQuery->latest()->paginate(6)->withQueryString();

        if ($request->ajax() || $request->wantsJson() || $request->header('X-Requested-With') === 'XMLHttpRequest') {
            $gridHtml = view('blog.partials.posts_grid', compact('posts', 'query'))->render();
            return response()->json([
                'html' => $gridHtml,
                'total' => $posts->total(),
                'current_page' => $posts->currentPage(),
                'last_page' => $posts->lastPage(),
            ]);
        }

        return view('blog.index', compact('posts', 'query'));
    }

    public function show(string $slug)
    {
        $post = BlogPost::where('slug', $slug)->firstOrFail();
        $recentPosts = BlogPost::where('id', '!=', $post->id)->latest()->take(3)->get();

        return view('blog.show', compact('post', 'recentPosts'));
    }
}
