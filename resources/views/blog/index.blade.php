@extends('layouts.app')

@section('title', 'Developer Blog - RichForge')
@section('meta_description', 'Articles, tutorials, and security insights for web developers building with RichForge WYSIWYG editor SDK.')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 space-y-10">
    <!-- Hero Header -->
    <div class="text-center max-w-3xl mx-auto space-y-3">
        <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-fuchsia-50 border border-fuchsia-200 text-fuchsia-700 text-xs font-semibold shadow-sm">
            <i class="ri-article-line text-fuchsia-600"></i> Engineering & Insights
        </div>
        <h1 class="text-3xl sm:text-5xl font-serif font-extrabold text-[#1a1a2e] tracking-tight">
            RichForge Developer Blog
        </h1>
        <p class="text-[#64748b] text-sm sm:text-base leading-relaxed font-medium">
            Articles, tutorials, and security insights for web developers.
        </p>
    </div>

    <!-- Search Bar & Controls -->
    <div class="max-w-xl mx-auto">
        <div class="relative">
            <i class="ri-search-line absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 text-lg"></i>
            <input type="text"
                   id="blog-search-input"
                   value="{{ $query }}"
                   placeholder="Search articles..."
                   class="w-full pl-11 pr-10 py-3.5 bg-white border border-[#e2e8f0] text-[#1a1a2e] placeholder-[#94a3b8] rounded-2xl text-sm shadow-sm focus:outline-none focus:ring-2 focus:ring-fuchsia-500 focus:border-transparent transition-all">
            <button type="button"
                    id="blog-search-clear-btn"
                    onclick="clearBlogSearch()"
                    class="{{ empty($query) ? 'hidden' : '' }} absolute right-3.5 top-1/2 -translate-y-1/2 text-slate-400 hover:text-slate-600 p-1 rounded-lg transition-colors">
                <i class="ri-close-circle-fill text-lg"></i>
            </button>
        </div>
    </div>

    <!-- Posts Grid & Pagination Container -->
    <div id="blog-posts-container" class="space-y-10 min-h-[400px]">
        @include('blog.partials.posts_grid', ['posts' => $posts, 'query' => $query])
    </div>
</div>

<!-- AJAX Search & Pagination Script -->
<script>
    let searchDebounceTimer = null;

    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('blog-search-input');
        const clearBtn = document.getElementById('blog-search-clear-btn');

        if (searchInput) {
            searchInput.addEventListener('input', function(e) {
                const val = e.target.value;
                if (clearBtn) {
                    clearBtn.classList.toggle('hidden', val.trim() === '');
                }
                clearTimeout(searchDebounceTimer);
                searchDebounceTimer = setTimeout(() => {
                    loadBlogData(1, val.trim(), true);
                }, 400);
            });
        }

        // Handle Browser Back/Forward buttons
        window.addEventListener('popstate', function(e) {
            const urlParams = new URLSearchParams(window.location.search);
            const q = urlParams.get('q') || '';
            const page = parseInt(urlParams.get('page')) || 1;

            if (searchInput) {
                searchInput.value = q;
                if (clearBtn) clearBtn.classList.toggle('hidden', q === '');
            }

            loadBlogData(page, q, false);
        });
    });

    function paginateBlog(page) {
        const searchInput = document.getElementById('blog-search-input');
        const q = searchInput ? searchInput.value.trim() : '';
        loadBlogData(page, q, true);
    }

    function clearBlogSearch() {
        const searchInput = document.getElementById('blog-search-input');
        const clearBtn = document.getElementById('blog-search-clear-btn');
        if (searchInput) searchInput.value = '';
        if (clearBtn) clearBtn.classList.add('hidden');
        loadBlogData(1, '', true);
    }

    function loadBlogData(page = 1, query = '', updateHistory = true) {
        const container = document.getElementById('blog-posts-container');
        if (!container) return;

        // Render loading skeleton
        container.innerHTML = `
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 animate-pulse">
                ${Array(6).fill(0).map(() => `
                    <div class="bg-white border border-[#e5e7eb] rounded-2xl p-6 shadow-sm space-y-4">
                        <div class="h-3 bg-slate-200 rounded w-1/3"></div>
                        <div class="h-5 bg-slate-200 rounded w-3/4"></div>
                        <div class="space-y-2">
                            <div class="h-3 bg-slate-150 bg-slate-100 rounded w-full"></div>
                            <div class="h-3 bg-slate-150 bg-slate-100 rounded w-5/6"></div>
                        </div>
                        <div class="pt-4 border-t border-slate-100 flex justify-between">
                            <div class="h-4 bg-slate-200 rounded w-1/4"></div>
                        </div>
                    </div>
                `).join('')}
            </div>
        `;

        // Update URL state if requested
        const params = new URLSearchParams();
        if (query) params.set('q', query);
        if (page > 1) params.set('page', page);

        const relativeUrl = window.location.pathname + (params.toString() ? '?' + params.toString() : '');

        if (updateHistory) {
            history.pushState({ page, query }, '', relativeUrl);
        }

        // Fetch server response via AJAX
        fetch(relativeUrl, {
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json'
            }
        })
        .then(response => {
            if (!response.ok) throw new Error('Network response error');
            return response.json();
        })
        .then(data => {
            container.innerHTML = data.html;
            // Smooth scroll to top of grid
            container.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
        })
        .catch(err => {
            console.error('Error fetching blog posts:', err);
            container.innerHTML = `
                <div class="col-span-full bg-red-50 border border-red-200 rounded-2xl p-8 text-center text-red-700 text-sm">
                    <i class="ri-error-warning-line text-xl mb-1 block"></i>
                    Unable to load blog articles. Please check your connection and try again.
                </div>
            `;
        });
    }
</script>
@endsection
