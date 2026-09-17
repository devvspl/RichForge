@extends('layouts.app')

@section('title', 'Frequently Asked Questions - RichForge')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-16 space-y-8">
    <div class="text-center space-y-2">
        <h1 class="text-3xl font-extrabold text-white">RichForge FAQ</h1>
        <p class="text-slate-400 text-sm">Answers to common questions about the RichForge editor SDK & platform.</p>
    </div>

    <div class="space-y-6">
        <div class="bg-slate-900/80 border border-slate-800 p-6 rounded-2xl space-y-2">
            <h3 class="font-bold text-white text-base">Is RichForge proprietary software?</h3>
            <p class="text-xs text-slate-400 leading-relaxed">No. RichForge is an original developer platform and standalone JavaScript editor library designed specifically for web developers.</p>
        </div>

        <div class="bg-slate-900/80 border border-slate-800 p-6 rounded-2xl space-y-2">
            <h3 class="font-bold text-white text-base">How does image uploading work?</h3>
            <p class="text-xs text-slate-400 leading-relaxed">When an image is pasted or dropped into the editor, RichForge sends a secure request to `/api/v1/upload` with your public project key. The server stores the image safely and returns a public URL which is automatically inserted into your document.</p>
        </div>
    </div>
</div>
@endsection
