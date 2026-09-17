@extends('layouts.app')

@section('title', $post->title . ' - RichForge Blog')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12 space-y-8">
    <div class="space-y-3">
        <a href="{{ route('blog.index') }}" class="text-xs text-indigo-400 font-semibold hover:underline">← Back to Developer Blog</a>
        <h1 class="text-3xl sm:text-4xl font-extrabold text-white tracking-tight">{{ $post->title }}</h1>
        <div class="text-xs text-slate-400 font-mono">
            Published {{ $post->created_at->format('F d, Y') }} • By {{ $post->author }}
        </div>
    </div>

    <div class="bg-slate-900/80 border border-slate-800 rounded-2xl p-8 shadow-xl text-slate-300 text-sm leading-relaxed space-y-4">
        {!! Str::markdown($post->content) !!}
    </div>
</div>
@endsection
