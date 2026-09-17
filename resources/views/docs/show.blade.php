@extends('layouts.app')

@section('title', ($doc ? $doc->title : 'Documentation') . ' - RichForge Docs')

@push('styles')
<style>
.docs-content {
    color: #334155;
    font-size: 0.875rem;
    line-height: 1.75;
}

.docs-content h1, .docs-content h2, .docs-content h3, .docs-content h4 {
    color: #1a1a2e;
    font-family: 'Fraunces', serif;
    font-weight: 700;
    margin-top: 1.5em;
    margin-bottom: 0.5em;
    line-height: 1.3;
}

.docs-content h2 {
    font-size: 1.35rem;
    border-bottom: 1px solid #f1f5f9;
    padding-bottom: 0.4rem;
}

.docs-content h3 {
    font-size: 1.15rem;
}

.docs-content p {
    margin-bottom: 1em;
    color: #334155;
}

.docs-content ul, .docs-content ol {
    margin-bottom: 1em;
    padding-left: 1.5em;
    color: #334155;
}

.docs-content ul {
    list-style-type: disc;
}

.docs-content ol {
    list-style-type: decimal;
}

.docs-content li {
    margin-bottom: 0.35em;
}

.docs-content strong {
    color: #1a1a2e;
    font-weight: 700;
}

.docs-content a {
    color: #c026d3;
    font-weight: 600;
    text-decoration: underline;
}

.docs-content a:hover {
    color: #a21caf;
}

/* Inline Code Pill */
.docs-content :not(pre) > code {
    background-color: #f1f5f9;
    color: #0f172a;
    border: 1px solid #e2e8f0;
    padding: 0.15rem 0.4rem;
    border-radius: 0.375rem;
    font-family: 'JetBrains Mono', monospace;
    font-size: 0.8em;
}

/* Code Snippet Block (Kept Dark Terminal Style for deliberate contrast) */
.docs-content pre {
    background-color: #0f172a !important;
    color: #f0abfc !important;
    border: 1px solid #1e293b;
    border-radius: 1rem;
    padding: 1.25rem;
    overflow-x: auto;
    font-family: 'JetBrains Mono', monospace;
    font-size: 0.8rem;
    line-height: 1.6;
    margin-top: 1.25em;
    margin-bottom: 1.25em;
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
}

.docs-content pre code {
    background-color: transparent !important;
    color: inherit !important;
    border: none !important;
    padding: 0 !important;
}
</style>
@endpush

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
        
        <!-- Left Sidebar Navigation -->
        <aside class="lg:col-span-3 space-y-6">
            <div class="bg-white border border-slate-200 rounded-2xl p-4 shadow-sm">
                <h3 class="px-3 text-xs font-bold text-slate-500 uppercase tracking-wider mb-3">Documentation</h3>
                <nav class="space-y-4">
                    @foreach($navigation as $category => $pages)
                        <div>
                            <span class="px-3 text-[11px] font-bold text-slate-500 uppercase tracking-wider block mb-1">
                                {{ str_replace('-', ' ', $category) }}
                            </span>
                            <ul class="space-y-1 text-xs">
                                @foreach($pages as $page)
                                    <li>
                                        <a href="{{ route('docs.show', $page->slug) }}" class="block px-3 py-1.5 rounded-lg transition-colors {{ (optional($doc)->slug === $page->slug) ? 'bg-fuchsia-100 text-fuchsia-700 font-semibold border border-fuchsia-200' : 'text-slate-600 hover:text-fuchsia-600 hover:bg-slate-50 font-medium' }}">
                                            {{ $page->title }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endforeach
                </nav>
            </div>
        </aside>

        <!-- Main Content Area -->
        <main class="lg:col-span-9 bg-white border border-slate-200 rounded-2xl p-8 shadow-sm space-y-6">
            @if($doc)
                <div class="border-b border-slate-100 pb-4">
                    <span class="text-xs font-mono text-fuchsia-600 uppercase tracking-wider font-semibold">Docs / {{ $doc->category }}</span>
                    <h1 class="text-3xl font-extrabold text-[#1a1a2e] mt-1 font-serif">{{ $doc->title }}</h1>
                </div>

                <div class="docs-content">
                    {!! Str::markdown($doc->content) !!}
                </div>
            @else
                <div class="text-center py-12 text-slate-500">
                    <p>No documentation pages found.</p>
                </div>
            @endif
        </main>
    </div>
</div>
@endsection
