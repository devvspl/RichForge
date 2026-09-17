@extends('layouts.app')

@section('title', 'Developer Blog - RichForge')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 space-y-10">
    <div class="text-center max-w-3xl mx-auto">
        <h1 class="text-4xl font-extrabold text-white">RichForge Developer Blog</h1>
        <p class="text-slate-400 text-sm mt-2">Articles, tutorials, and security insights for web developers.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach($posts as $post)
            <div class="bg-slate-900/80 border border-slate-800 rounded-2xl p-6 shadow-xl flex flex-col justify-between space-y-4 hover:border-slate-700 transition-all">
                <div class="space-y-2">
                    <span class="text-[11px] font-mono text-indigo-400 uppercase tracking-wider">{{ $post->created_at->format('M d, Y') }} • By {{ $post->author }}</span>
                    <h2 class="font-bold text-lg text-white">
                        <a href="{{ route('blog.show', $post->slug) }}" class="hover:text-indigo-400 transition-colors">
                            {{ $post->title }}
                        </a>
                    </h2>
                    <p class="text-xs text-slate-400 leading-relaxed">{{ $post->excerpt }}</p>
                </div>

                <a href="{{ route('blog.show', $post->slug) }}" class="text-xs font-semibold text-indigo-400 hover:text-indigo-300">
                    Read Article →
                </a>
            </div>
        @endforeach
    </div>
</div>
@endsection
