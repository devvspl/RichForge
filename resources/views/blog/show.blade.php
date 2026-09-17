@extends('layouts.app')

@section('title', $post->effective_meta_title . ' - RichForge Blog')
@section('meta_description', $post->effective_meta_description)

@push('head')
    <meta name="robots" content="{{ $post->robots ?? 'index, follow' }}">
    <link rel="canonical" href="{{ $post->canonical_url ?: route('blog.show', $post->slug) }}">

    <!-- Open Graph Social Tags -->
    <meta property="og:title" content="{{ $post->effective_og_title }}">
    <meta property="og:description" content="{{ $post->effective_og_description }}">
    <meta property="og:type" content="article">
    <meta property="og:url" content="{{ route('blog.show', $post->slug) }}">
    @if($post->effective_og_image)
        <meta property="og:image" content="{{ $post->effective_og_image }}">
    @endif

    <!-- Twitter Card Meta -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $post->effective_og_title }}">
    <meta name="twitter:description" content="{{ $post->effective_og_description }}">
    @if($post->effective_og_image)
        <meta name="twitter:image" content="{{ $post->effective_og_image }}">
    @endif

    <!-- Structured Data (JSON-LD Article) -->
    <script type="application/ld+json">
    {
      "@@context": "https://schema.org",
      "@type": "Article",
      "headline": {{ json_encode($post->effective_meta_title) }},
      "description": {{ json_encode($post->effective_meta_description) }},
      "image": {{ json_encode($post->effective_og_image ?: asset('images/logo-var1.jpg')) }},
      "author": {
        "@type": "Person",
        "name": {{ json_encode($post->author) }}
      },
      "publisher": {
        "@type": "Organization",
        "name": "RichForge Platform",
        "logo": {
          "@type": "ImageObject",
          "url": {{ json_encode(asset('images/logo-var1.jpg')) }}
        }
      },
      "datePublished": {{ json_encode($post->published_at ? $post->published_at->toIso8601String() : $post->created_at->toIso8601String()) }},
      "dateModified": {{ json_encode($post->updated_at->toIso8601String()) }}
    }
    </script>

    @if(!empty($post->faqs) && count($post->faqs) > 0)
        @php
            $faqSchemaItems = [];
            foreach ($post->faqs as $faq) {
                if (!empty($faq['question']) && !empty($faq['answer'])) {
                    $faqSchemaItems[] = [
                        '@type' => 'Question',
                        'name' => $faq['question'],
                        'acceptedAnswer' => [
                            '@type' => 'Answer',
                            'text' => $faq['answer'],
                        ],
                    ];
                }
            }
        @endphp

        @if(count($faqSchemaItems) > 0)
            <!-- Structured Data (JSON-LD FAQPage for Google Search Rich Snippets) -->
            <script type="application/ld+json">
            {
              "@@context": "https://schema.org",
              "@type": "FAQPage",
              "mainEntity": {!! json_encode($faqSchemaItems, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
            }
            </script>
        @endif
    @endif
@endpush

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12 space-y-10">
    <!-- Navigation Back Link & Header -->
    <div class="space-y-4">
        <a href="{{ route('blog.index') }}" class="inline-flex items-center gap-1.5 text-xs font-bold text-fuchsia-600 hover:text-fuchsia-700 hover:underline transition-colors">
            <i class="ri-arrow-left-line"></i> Back to Developer Blog
        </a>

        <div class="space-y-4">
            @if($post->category)
                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-fuchsia-50 text-fuchsia-700 text-xs font-bold border border-fuchsia-200">
                    <i class="ri-price-tag-3-line"></i> {{ $post->category }}
                </span>
            @endif

            <h1 class="text-3xl sm:text-4xl md:text-5xl font-serif font-extrabold text-[#1a1a2e] tracking-tight leading-tight">
                {{ $post->title }}
            </h1>
            
            <div class="flex flex-wrap items-center gap-4 text-xs font-mono text-[#64748b] border-b border-slate-200/80 pb-6">
                <span class="inline-flex items-center gap-1 text-fuchsia-600 font-semibold uppercase tracking-wider">
                    <i class="ri-calendar-event-line"></i> {{ $post->created_at->format('F d, Y') }}
                </span>
                <span>&bull;</span>
                <span class="inline-flex items-center gap-1">
                    <i class="ri-user-line"></i> By {{ $post->author }}
                </span>
                <span>&bull;</span>
                <span class="inline-flex items-center gap-1">
                    <i class="ri-time-line"></i> ~{{ max(1, ceil(str_word_count(strip_tags($post->content)) / 200)) }} min read
                </span>
            </div>
        </div>
    </div>

    <!-- Article Content Card -->
    <article class="bg-white border border-[#e5e7eb] rounded-2xl p-6 sm:p-10 shadow-sm text-[#334155] text-base leading-relaxed space-y-6">
        @if($post->featured_image)
            <div class="rounded-xl overflow-hidden border border-slate-200 shadow-sm mb-6">
                <img src="{{ $post->featured_image }}" alt="{{ $post->featured_image_alt ?: $post->title }}" class="w-full max-h-96 object-cover">
            </div>
        @endif

        <div class="prose max-w-none text-[#334155] leading-relaxed space-y-4">
            {!! Str::markdown($post->content) !!}
        </div>

        @if($post->tags)
            <div class="pt-6 border-t border-slate-100 flex flex-wrap items-center gap-2">
                <span class="text-xs font-bold text-slate-500 uppercase font-mono">Tags:</span>
                @foreach(explode(',', $post->tags) as $tag)
                    @if(trim($tag))
                        <span class="px-2.5 py-1 bg-slate-100 text-slate-700 text-xs rounded-lg font-mono border border-slate-200">
                            #{{ trim($tag) }}
                        </span>
                    @endif
                @endforeach
            </div>
        @endif
    </article>

    <!-- ARTICLE FAQS ACCORDION SECTION -->
    @if(!empty($post->faqs) && count($post->faqs) > 0)
        <div class="bg-white border border-[#e5e7eb] rounded-2xl p-6 sm:p-8 shadow-sm space-y-6" x-data="{ activeIndex: 0 }">
            <div class="border-b border-slate-100 pb-3">
                <h3 class="font-serif font-bold text-xl text-[#1a1a2e] flex items-center gap-2">
                    <i class="ri-question-answer-line text-fuchsia-600"></i> Frequently Asked Questions
                </h3>
                <p class="text-xs text-slate-500 mt-1">Quick answers to common questions about this article.</p>
            </div>

            <div class="space-y-3">
                @foreach($post->faqs as $index => $faq)
                    @if(!empty($faq['question']))
                        <div class="border border-slate-200/80 rounded-xl overflow-hidden transition-colors" :class="activeIndex === {{ $index }} ? 'bg-fuchsia-50/30 border-fuchsia-200' : 'bg-slate-50/50'">
                            <button type="button"
                                    @click="activeIndex = activeIndex === {{ $index }} ? null : {{ $index }}"
                                    class="w-full p-4 text-left font-bold text-sm text-[#1a1a2e] flex items-center justify-between gap-4">
                                <span class="flex items-center gap-2">
                                    <i class="ri-question-line text-fuchsia-600"></i>
                                    {{ $faq['question'] }}
                                </span>
                                <i class="ri-arrow-down-s-line text-lg text-slate-400 transition-transform" :class="activeIndex === {{ $index }} ? 'rotate-180 text-fuchsia-600' : ''"></i>
                            </button>

                            <div x-show="activeIndex === {{ $index }}" x-transition class="px-4 pb-4 text-xs sm:text-sm text-slate-600 leading-relaxed border-t border-slate-100 pt-3">
                                {{ $faq['answer'] }}
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    @endif

    <!-- Recent Posts Section -->
    @if(isset($recentPosts) && $recentPosts->count() > 0)
        <div class="pt-8 border-t border-slate-200/80 space-y-6">
            <h3 class="font-serif font-bold text-xl text-[#1a1a2e]">More Articles from RichForge</h3>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach($recentPosts as $recent)
                    <div class="bg-white border border-[#e5e7eb] rounded-2xl p-5 shadow-sm space-y-3 hover:-translate-y-1 hover:shadow-md hover:border-fuchsia-200 transition-all flex flex-col justify-between">
                        <div class="space-y-2">
                            <span class="text-[10px] font-mono font-semibold text-fuchsia-600 uppercase">{{ $recent->created_at->format('M d, Y') }}</span>
                            <h4 class="font-bold text-sm text-[#1a1a2e] hover:text-fuchsia-600 transition-colors line-clamp-2">
                                <a href="{{ route('blog.show', $recent->slug) }}">{{ $recent->title }}</a>
                            </h4>
                        </div>

                        <a href="{{ route('blog.show', $recent->slug) }}" class="text-xs font-bold text-fuchsia-600 hover:underline flex items-center gap-1">
                            Read Article <i class="ri-arrow-right-line"></i>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
</div>

<style>
    /* Styling for rendered markdown content in light theme */
    .prose h1, .prose h2, .prose h3, .prose h4 {
        color: #1a1a2e !important;
        font-family: "Fraunces", serif !important;
        font-weight: 800 !important;
        margin-top: 1.5em !important;
        margin-bottom: 0.5em !important;
    }
    .prose h2 { font-size: 1.5rem !important; }
    .prose h3 { font-size: 1.25rem !important; }
    .prose p { margin-bottom: 1rem !important; line-height: 1.75 !important; }
    .prose a { color: #c026d3 !important; text-decoration: underline !important; font-weight: 600 !important; }
    .prose pre {
        background-color: #020617 !important;
        color: #e2e8f0 !important;
        border: 1px solid #1e293b !important;
        padding: 1.25rem !important;
        border-radius: 1rem !important;
        font-family: "JetBrains Mono", monospace !important;
        font-size: 0.825rem !important;
        overflow-x: auto !important;
        margin: 1.25rem 0 !important;
    }
    .prose code {
        font-family: "JetBrains Mono", monospace !important;
        background-color: #f1f5f9 !important;
        color: #c026d3 !important;
        padding: 0.2rem 0.4rem !important;
        border-radius: 0.375rem !important;
        font-size: 0.85em !important;
    }
    .prose pre code {
        background-color: transparent !important;
        color: inherit !important;
        padding: 0 !important;
    }
    .prose ul { list-style-type: disc !important; padding-left: 1.5rem !important; margin-bottom: 1rem !important; }
    .prose ol { list-style-type: decimal !important; padding-left: 1.5rem !important; margin-bottom: 1rem !important; }
</style>
@endsection
