@extends('layouts.dashboard')

@section('title', 'Quick Start Onboarding - RichForge')
@section('header_title', 'Developer Onboarding')

@section('content')
<div class="max-w-4xl mx-auto space-y-8">
    <div class="text-center space-y-2">
        <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-fuchsia-500/10 text-fuchsia-400 text-xs font-semibold border border-fuchsia-500/30">
            <i class="ri-rocket-line"></i> Quick Setup Guide
        </div>
        <h2 class="text-3xl font-extrabold text-white tracking-tight">Your project is ready!</h2>
        <p class="text-slate-400 text-sm">Follow these simple steps to embed RichForge in under 5 minutes.</p>
    </div>

    <!-- Step 1: Project Details & Public Key -->
    <div class="bg-slate-900/80 border border-slate-800 rounded-2xl p-6 shadow-xl space-y-4">
        <div class="flex items-center gap-3">
            <span class="w-8 h-8 rounded-xl bg-fuchsia-600 flex items-center justify-center font-bold text-white text-sm">1</span>
            <h3 class="font-bold text-lg text-white">Your Public Project Key</h3>
        </div>
        <p class="text-slate-400 text-xs">Copy your public project key. This key is safe to use in frontend JavaScript SDK initializations.</p>
        
        <div class="flex items-center gap-3 bg-slate-950 p-4 rounded-xl border border-slate-800">
            <code class="font-mono text-fuchsia-400 text-sm flex-grow select-all">{{ $project->project_key }}</code>
            <button onclick="navigator.clipboard.writeText('{{ $project->project_key }}'); alert('Public Project Key copied to clipboard!');" class="px-4 py-2 bg-fuchsia-600 hover:bg-fuchsia-500 text-white font-bold text-xs rounded-xl transition-colors flex items-center gap-1.5">
                <i class="ri-file-copy-line"></i> Copy Key
            </button>
        </div>
    </div>

    <!-- Step 2: Copy Integration Code Snippet -->
    <div class="bg-slate-900/80 border border-slate-800 rounded-2xl p-6 shadow-xl space-y-4">
        <div class="flex items-center gap-3">
            <span class="w-8 h-8 rounded-xl bg-fuchsia-600 flex items-center justify-center font-bold text-white text-sm">2</span>
            <h3 class="font-bold text-lg text-white">Add RichForge to Your Website</h3>
        </div>
        <p class="text-slate-400 text-xs">Include the CDN scripts and initialize the editor on any standard `<textarea>` element.</p>

        <div class="relative bg-slate-950 p-4 rounded-xl border border-slate-800 font-mono text-xs text-slate-200 overflow-x-auto">
<pre><code>&lt;!-- 1. Include RichForge Stylesheet and JS SDK --&gt;
&lt;link rel="stylesheet" href="{{ asset('cdn/v1/richforge.css') }}" /&gt;
&lt;script src="{{ asset('cdn/v1/richforge.js') }}"&gt;&lt;/script&gt;

&lt;!-- 2. Add Target Textarea --&gt;
&lt;textarea id="my-editor" name="content"&gt;Start writing your content...&lt;/textarea&gt;

&lt;!-- 3. Initialize RichForge --&gt;
&lt;script&gt;
RichForge.create('#my-editor', {
    projectKey: '{{ $project->project_key }}',
    height: 400,
    placeholder: 'Write content here...'
});
&lt;/script&gt;</code></pre>
            <button onclick="navigator.clipboard.writeText(this.parentElement.querySelector('pre').innerText); alert('Integration code copied to clipboard!');" class="absolute top-3 right-3 px-3 py-1.5 bg-slate-800 hover:bg-slate-700 text-slate-200 text-xs rounded-lg border border-slate-700 flex items-center gap-1">
                <i class="ri-file-copy-line"></i> Copy Snippet
            </button>
        </div>
    </div>

    <!-- Step 3: Test in Playground or View Project -->
    <div class="flex items-center justify-between pt-4">
        <a href="{{ route('projects.show', $project->id) }}" class="px-5 py-2.5 bg-slate-800 hover:bg-slate-700 text-slate-200 font-semibold text-sm rounded-xl border border-slate-700">
            ← Configure Project Settings
        </a>
        <a href="{{ route('playground') }}" class="px-6 py-2.5 bg-fuchsia-600 hover:bg-fuchsia-500 text-white font-bold text-sm rounded-xl shadow-lg shadow-fuchsia-600/25 transition-all flex items-center gap-2">
            <span>Test in Live Playground</span>
            <i class="ri-arrow-right-line"></i>
        </a>
    </div>
</div>
@endsection
