@extends('layouts.app')

@section('title', 'Online Rich Text Editor Demo - RichForge')
@section('meta_description', 'Test the RichForge embeddable WYSIWYG editor online with live HTML output, image uploads, and formatting toolbar.')

@section('content')
<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-12 space-y-8">
    <div class="text-center space-y-2">
        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-indigo-500/10 text-indigo-400 text-xs font-semibold border border-indigo-500/30">
            ⚡ Standalone Editor Demo
        </div>
        <h1 class="text-3xl font-extrabold text-white">Public RichForge Editor Demo</h1>
        <p class="text-slate-400 text-sm">Experience the RichForge Rich Text Editor SDK in action without registration.</p>
    </div>

    <div class="bg-slate-900/80 border border-slate-800 rounded-2xl p-6 shadow-xl space-y-6">
        <textarea id="standalone-public-demo-editor">
<h1>RichForge WYSIWYG Editor</h1>
<p>This is a live unauthenticated demonstration of the RichForge Editor.</p>
<p>Try formatting text, adding tables, blockquotes, code blocks, or drag & drop an image into the editor!</p>
        </textarea>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                if (window.RichForge) {
                    RichForge.create('#standalone-public-demo-editor', {
                        projectKey: 'rf_pub_demo_prod_1234567890abcdef',
                        height: 400,
                        placeholder: 'Start writing...'
                    });
                }
            });
        </script>
    </div>
</div>
@endsection
