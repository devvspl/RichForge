@extends('layouts.dashboard')

@section('title', 'Manage Blog Posts - Admin Console')
@section('header_title', 'Blog Posts Management')

@section('content')
<div class="space-y-6">
    <!-- Top Header Bar -->
    <div class="p-6 sm:p-8 rounded-3xl bg-gradient-to-r from-fuchsia-50/80 via-purple-50/50 to-indigo-50/80 border border-fuchsia-200/80 shadow-sm flex flex-col md:flex-row items-start md:items-center justify-between gap-4">
        <div>
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-fuchsia-100 text-fuchsia-700 text-xs font-semibold border border-fuchsia-200 mb-2">
                <i class="ri-article-line"></i> Blog Administration
            </div>
            <h2 class="text-2xl font-extrabold text-[#1a1a2e]">Blog Posts Console</h2>
            <p class="text-xs text-slate-600 mt-1">Create, edit, publish, and manage developer articles and insights.</p>
        </div>
        <div class="flex items-center gap-3">
            <a href="{{ route('admin.dashboard') }}" class="px-4 py-2.5 bg-white hover:bg-slate-50 text-xs font-bold text-slate-700 rounded-xl border border-slate-200 shadow-sm flex items-center gap-2">
                <i class="ri-arrow-left-line"></i> Admin Console
            </a>
            <a href="{{ route('admin.blogs.create') }}" class="px-5 py-2.5 bg-fuchsia-600 hover:bg-fuchsia-500 text-xs font-bold text-white rounded-xl shadow-md shadow-fuchsia-600/20 flex items-center gap-2">
                <i class="ri-add-line text-sm"></i> Create New Post
            </a>
        </div>
    </div>

    @if(session('success'))
        <div class="p-4 bg-emerald-50 border border-emerald-200 rounded-2xl text-xs font-semibold text-emerald-800 flex items-center justify-between shadow-sm">
            <div class="flex items-center gap-2">
                <i class="ri-checkbox-circle-fill text-emerald-600 text-base"></i>
                <span>{{ session('success') }}</span>
            </div>
        </div>
    @endif

    <!-- Search & Filter Bar -->
    <div class="bg-white border border-slate-200 rounded-2xl p-4 shadow-sm flex flex-col sm:flex-row items-center justify-between gap-4">
        <form method="GET" action="{{ route('admin.blogs.index') }}" class="w-full sm:w-80 relative">
            <i class="ri-search-line absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-400 text-sm"></i>
            <input type="text" name="search" value="{{ $search }}" placeholder="Search posts..." class="w-full pl-9 pr-4 py-2 bg-slate-50 border border-slate-200 rounded-xl text-xs text-[#1a1a2e] focus:outline-none focus:ring-2 focus:ring-fuchsia-500">
        </form>

        <div class="text-xs text-slate-500 font-medium">
            Total Articles: <span class="font-bold text-[#1a1a2e]">{{ $posts->total() }}</span>
        </div>
    </div>

    <!-- Blog Posts Table Card -->
    <div class="bg-white border border-slate-200 rounded-2xl shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse text-xs">
                <thead>
                    <tr class="bg-slate-50/80 border-b border-slate-200 text-slate-500 font-semibold uppercase tracking-wider">
                        <th class="py-3.5 px-6">Title & Excerpt</th>
                        <th class="py-3.5 px-4">Author</th>
                        <th class="py-3.5 px-4">Published Date</th>
                        <th class="py-3.5 px-6 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-slate-700">
                    @forelse($posts as $post)
                        <tr class="hover:bg-slate-50/60 transition-colors">
                            <td class="py-4 px-6">
                                <span class="font-bold text-slate-900 text-sm block leading-snug">{{ $post->title }}</span>
                                <span class="text-[11px] font-mono text-slate-400 block mt-0.5">/blog/{{ $post->slug }}</span>
                                <p class="text-slate-500 text-xs mt-1 line-clamp-1 max-w-lg">{{ $post->excerpt }}</p>
                            </td>
                            <td class="py-4 px-4 font-medium text-slate-800">
                                {{ $post->author }}
                            </td>
                            <td class="py-4 px-4 font-mono text-slate-500 text-[11px]">
                                {{ $post->published_at ? $post->published_at->format('M d, Y') : 'Draft' }}
                            </td>
                            <td class="py-4 px-6 text-right whitespace-nowrap">
                                <div class="inline-flex items-center justify-end gap-1.5">
                                    <a href="{{ route('blog.show', $post->slug) }}" target="_blank" class="px-2.5 py-1.5 bg-slate-100 hover:bg-slate-200 text-slate-700 font-medium rounded-xl text-xs border border-slate-200 transition-colors inline-flex items-center gap-1.5" title="View Public Post">
                                        <i class="ri-external-link-line text-xs"></i> View
                                    </a>
                                    <a href="{{ route('admin.blogs.edit', $post->id) }}" class="px-2.5 py-1.5 bg-fuchsia-50 hover:bg-fuchsia-100 text-fuchsia-700 font-bold rounded-xl text-xs border border-fuchsia-200 transition-colors inline-flex items-center gap-1.5" title="Edit Post">
                                        <i class="ri-edit-line text-xs"></i> Edit
                                    </a>
                                    <form action="{{ route('admin.blogs.destroy', $post->id) }}" method="POST" class="inline-block m-0 p-0" onsubmit="return confirm('Are you sure you want to delete this blog post?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="px-2.5 py-1.5 bg-red-50 hover:bg-red-100 text-red-700 font-bold rounded-xl text-xs border border-red-200 transition-colors inline-flex items-center gap-1.5" title="Delete Post">
                                            <i class="ri-delete-bin-line text-xs"></i> Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="py-12 text-center text-slate-500">
                                <i class="ri-article-line text-2xl text-slate-300 block mb-1"></i>
                                No blog posts found. Click "Create New Post" to publish an article.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($posts->hasPages())
            <div class="p-4 border-t border-slate-100">
                {{ $posts->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
