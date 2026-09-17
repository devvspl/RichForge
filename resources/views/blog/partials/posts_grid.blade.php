@if($posts->isEmpty())
    <div class="col-span-full bg-white border border-[#e5e7eb] rounded-2xl p-12 text-center space-y-4 shadow-sm">
        <div class="w-12 h-12 rounded-2xl bg-fuchsia-50 text-fuchsia-600 flex items-center justify-center mx-auto text-xl">
            <i class="ri-search-line"></i>
        </div>
        <div class="space-y-1">
            <h3 class="text-lg font-bold text-[#1a1a2e]">No articles found</h3>
            <p class="text-slate-500 text-xs sm:text-sm">
                @if(!empty($query))
                    No articles matched your search query "<span class="font-semibold text-slate-700">{{ $query }}</span>". Try searching with different keywords.
                @else
                    There are no blog posts available at the moment.
                @endif
            </p>
        </div>
        @if(!empty($query))
            <button type="button" onclick="clearBlogSearch()" class="px-4 py-2 bg-fuchsia-50 hover:bg-fuchsia-100 text-fuchsia-700 text-xs font-semibold rounded-xl border border-fuchsia-200 transition-colors inline-flex items-center gap-1.5">
                <i class="ri-close-line"></i> Clear Search Query
            </button>
        @endif
    </div>
@else
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach($posts as $post)
            <article class="bg-white border border-[#e5e7eb] rounded-2xl p-6 shadow-sm flex flex-col justify-between space-y-4 hover:-translate-y-1 hover:shadow-md hover:border-fuchsia-200/80 transition-all group">
                <div class="space-y-3">
                    <div class="flex items-center gap-2 text-xs font-mono font-semibold text-fuchsia-600 uppercase tracking-wider">
                        <i class="ri-calendar-line text-xs"></i>
                        <span>{{ $post->created_at->format('M d, Y') }}</span>
                        <span>&bull;</span>
                        <span class="text-slate-500 font-sans font-normal">By {{ $post->author }}</span>
                    </div>

                    <h2 class="font-bold font-serif text-xl text-[#1a1a2e] group-hover:text-fuchsia-600 transition-colors leading-snug">
                        <a href="{{ route('blog.show', $post->slug) }}">
                            {{ $post->title }}
                        </a>
                    </h2>

                    <p class="text-xs sm:text-sm text-[#475569] leading-relaxed line-clamp-3">
                        {{ $post->excerpt }}
                    </p>
                </div>

                <div class="pt-4 border-t border-slate-100 flex items-center justify-between">
                    <a href="{{ route('blog.show', $post->slug) }}" class="text-xs font-bold text-fuchsia-600 hover:text-fuchsia-700 hover:underline inline-flex items-center gap-1">
                        Read Article <i class="ri-arrow-right-line text-sm transition-transform group-hover:translate-x-1"></i>
                    </a>
                </div>
            </article>
        @endforeach
    </div>

    <!-- Pagination Controls -->
    @if($posts->hasPages())
        <div class="pt-6 flex flex-col sm:flex-row items-center justify-between gap-4 border-t border-slate-200/80">
            <div class="text-xs text-slate-500 font-medium">
                Showing <span class="font-semibold text-slate-800">{{ $posts->firstItem() }}</span> to <span class="font-semibold text-slate-800">{{ $posts->lastItem() }}</span> of <span class="font-semibold text-slate-800">{{ $posts->total() }}</span> articles
            </div>

            <nav class="inline-flex items-center gap-1.5" aria-label="Pagination">
                {{-- Previous Page Link --}}
                @if ($posts->onFirstPage())
                    <span class="px-3 py-2 text-xs font-medium text-slate-300 bg-slate-50 border border-slate-200 rounded-xl cursor-not-allowed inline-flex items-center gap-1">
                        <i class="ri-arrow-left-s-line"></i> Previous
                    </span>
                @else
                    <button type="button" onclick="paginateBlog({{ $posts->currentPage() - 1 }})" class="px-3 py-2 text-xs font-medium text-slate-700 bg-white border border-[#e5e7eb] hover:bg-slate-50 hover:text-fuchsia-600 rounded-xl transition-colors inline-flex items-center gap-1 shadow-sm">
                        <i class="ri-arrow-left-s-line"></i> Previous
                    </button>
                @endif

                {{-- Page Number Links --}}
                @foreach ($posts->getUrlRange(1, $posts->lastPage()) as $page => $url)
                    @if ($page == $posts->currentPage())
                        <span class="px-3 py-2 text-xs font-bold text-white bg-fuchsia-600 border border-fuchsia-600 rounded-xl shadow-sm">
                            {{ $page }}
                        </span>
                    @else
                        <button type="button" onclick="paginateBlog({{ $page }})" class="px-3 py-2 text-xs font-medium text-slate-700 bg-white border border-[#e5e7eb] hover:bg-slate-50 hover:text-fuchsia-600 rounded-xl transition-colors shadow-sm">
                            {{ $page }}
                        </button>
                    @endif
                @endforeach

                {{-- Next Page Link --}}
                @if ($posts->hasMorePages())
                    <button type="button" onclick="paginateBlog({{ $posts->currentPage() + 1 }})" class="px-3 py-2 text-xs font-medium text-slate-700 bg-white border border-[#e5e7eb] hover:bg-slate-50 hover:text-fuchsia-600 rounded-xl transition-colors inline-flex items-center gap-1 shadow-sm">
                        Next <i class="ri-arrow-right-s-line"></i>
                    </button>
                @else
                    <span class="px-3 py-2 text-xs font-medium text-slate-300 bg-slate-50 border border-slate-200 rounded-xl cursor-not-allowed inline-flex items-center gap-1">
                        Next <i class="ri-arrow-right-s-line"></i>
                    </span>
                @endif
            </nav>
        </div>
    @endif
@endif
