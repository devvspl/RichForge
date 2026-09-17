@extends('layouts.app')

@section('title', 'Editor Online Playground & Code Generator - RichForge')
@section('meta_description', 'Test the RichForge Rich Text Editor online and generate ready-to-copy code snippets for HTML, JS, Laravel, React, Vue, Angular, and WordPress.')

@section('content')
<div class="max-w-[1600px] mx-auto px-4 sm:px-6 lg:px-8 py-8 space-y-6" x-data="playground()">
    <!-- 3-Column Split Layout -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
        
        <!-- LEFT COLUMN: Configuration Controls -->
        <div class="lg:col-span-3 bg-white border border-slate-200 rounded-2xl p-6 shadow-sm space-y-5">
            <h3 class="font-bold text-xs text-slate-900 uppercase tracking-wider border-b border-slate-100 pb-3 flex items-center gap-2">
                <i class="ri-settings-4-line text-fuchsia-600"></i> 1. Editor Config
            </h3>

            <div>
                <label class="block text-xs font-semibold text-slate-700 mb-1">Public Project Key</label>
                <input type="text" x-model="config.projectKey" @input="updateEditor()" class="w-full px-3 py-2 bg-slate-50 border border-slate-200 rounded-xl text-xs font-mono text-fuchsia-700 focus:border-fuchsia-500">
                <span class="text-[10px] text-slate-400 mt-1 block">Default public demo key</span>
            </div>

            <div>
                <label class="block text-xs font-semibold text-slate-700 mb-1">Editor Height (px)</label>
                <input type="number" x-model.number="config.height" @input="updateEditor()" min="200" max="800" class="w-full px-3 py-2 bg-slate-50 border border-slate-200 rounded-xl text-xs text-slate-800">
            </div>

            <div>
                <label class="block text-xs font-semibold text-slate-700 mb-1">Theme</label>
                <select x-model="config.theme" @change="updateEditor()" class="w-full px-3 py-2 bg-slate-50 border border-slate-200 rounded-xl text-xs text-slate-800">
                    <option value="default">Default Theme</option>
                    <option value="minimal">Minimal Theme</option>
                    <option value="dark">Dark Theme</option>
                </select>
            </div>

            <div>
                <label class="block text-xs font-semibold text-slate-700 mb-1">Placeholder Text</label>
                <input type="text" x-model="config.placeholder" @input="updateEditor()" class="w-full px-3 py-2 bg-slate-50 border border-slate-200 rounded-xl text-xs text-slate-800">
            </div>

            <div class="space-y-3 pt-3 border-t border-slate-100">
                <label class="flex items-center gap-2 cursor-pointer text-xs text-slate-700 font-medium">
                    <input type="checkbox" x-model="config.uploadEnabled" @change="updateEditor()" class="rounded border-slate-300 text-fuchsia-600 focus:ring-fuchsia-500">
                    Enable Upload API
                </label>

                <label class="flex items-center gap-2 cursor-pointer text-xs text-slate-700 font-medium">
                    <input type="checkbox" x-model="config.darkMode" @change="updateEditor()" class="rounded border-slate-300 text-fuchsia-600 focus:ring-fuchsia-500">
                    Dark Mode UI
                </label>
            </div>
        </div>

        <!-- CENTER COLUMN: Live Working Editor -->
        <div class="lg:col-span-5 bg-white border border-slate-200 rounded-2xl p-6 shadow-sm flex flex-col justify-between space-y-4">
            <div class="flex items-center justify-between border-b border-slate-100 pb-3">
                <h3 class="font-bold text-xs text-slate-900 uppercase tracking-wider flex items-center gap-2">
                    <i class="ri-terminal-box-line text-fuchsia-600"></i> 2. Live Editor Instance
                </h3>
                <span class="text-[11px] text-emerald-600 font-semibold flex items-center gap-1.5">
                    <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span> Active SDK
                </span>
            </div>

            <!-- Live Editor Container -->
            <div class="flex-grow">
                <textarea id="playground-target-editor">
<h2>Welcome to RichForge Playground ✨</h2>
<p>This is a live working instance of the <strong>RichForge Rich Text Editor</strong> SDK.</p>
<ul>
  <li>Try bold, italic, headings, lists, tables, and code formatting.</li>
  <li>Drag & drop images directly into the editor box.</li>
  <li>HTML Output updates dynamically in real-time!</li>
</ul>
                </textarea>
            </div>
        </div>

        <!-- RIGHT COLUMN: Generated Integration Code -->
        <div class="lg:col-span-4 bg-white border border-slate-200 rounded-2xl p-6 shadow-sm space-y-4">
            <div class="flex items-center justify-between border-b border-slate-100 pb-3">
                <h3 class="font-bold text-xs text-slate-900 uppercase tracking-wider flex items-center gap-2">
                    <i class="ri-file-code-line text-fuchsia-600"></i> 3. Integration Code
                </h3>
                <button @click="copyCode()" class="px-3 py-1 bg-fuchsia-600 hover:bg-fuchsia-500 text-white font-semibold text-xs rounded-lg transition-colors flex items-center gap-1 shadow-sm">
                    <i class="ri-file-copy-line"></i> Copy Code
                </button>
            </div>

            <!-- Framework Tabs -->
            <div class="flex gap-2 overflow-x-auto pb-2 border-b border-slate-100 text-xs font-semibold">
                <button @click="framework = 'html'" :class="framework === 'html' ? 'bg-fuchsia-600 text-white' : 'bg-slate-100 text-slate-600 hover:text-slate-900 hover:bg-slate-200'" class="px-2.5 py-1 rounded-lg transition-colors">HTML</button>
                <button @click="framework = 'js'" :class="framework === 'js' ? 'bg-fuchsia-600 text-white' : 'bg-slate-100 text-slate-600 hover:text-slate-900 hover:bg-slate-200'" class="px-2.5 py-1 rounded-lg transition-colors">JS / NPM</button>
                <button @click="framework = 'laravel'" :class="framework === 'laravel' ? 'bg-fuchsia-600 text-white' : 'bg-slate-100 text-slate-600 hover:text-slate-900 hover:bg-slate-200'" class="px-2.5 py-1 rounded-lg transition-colors">Laravel</button>
                <button @click="framework = 'react'" :class="framework === 'react' ? 'bg-fuchsia-600 text-white' : 'bg-slate-100 text-slate-600 hover:text-slate-900 hover:bg-slate-200'" class="px-2.5 py-1 rounded-lg transition-colors">React</button>
                <button @click="framework = 'vue'" :class="framework === 'vue' ? 'bg-fuchsia-600 text-white' : 'bg-slate-100 text-slate-600 hover:text-slate-900 hover:bg-slate-200'" class="px-2.5 py-1 rounded-lg transition-colors">Vue</button>
                <button @click="framework = 'php'" :class="framework === 'php' ? 'bg-fuchsia-600 text-white' : 'bg-slate-100 text-slate-600 hover:text-slate-900 hover:bg-slate-200'" class="px-2.5 py-1 rounded-lg transition-colors">PHP</button>
            </div>

            <!-- Code Output Display -->
            <div class="bg-slate-950 p-4 rounded-xl border border-slate-800 font-mono text-xs text-fuchsia-300 overflow-x-auto min-h-[320px]">
                <pre><code x-text="getCodeSnippet()"></code></pre>
            </div>
        </div>

    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
<script>
function playground() {
    return {
        editorInstance: null,
        framework: 'html',
        config: {
            projectKey: '{{ $defaultKey }}',
            height: 350,
            theme: 'default',
            placeholder: 'Start writing content here...',
            uploadEnabled: true,
            darkMode: false
        },
        init() {
            this.$nextTick(() => {
                this.updateEditor();
            });
        },
        updateEditor() {
            if (this.editorInstance) {
                this.editorInstance.destroy();
            }
            if (window.RichForge) {
                this.editorInstance = RichForge.create('#playground-target-editor', {
                    projectKey: this.config.projectKey,
                    height: this.config.height,
                    theme: this.config.theme,
                    placeholder: this.config.placeholder,
                    darkMode: this.config.darkMode,
                    upload: { enabled: this.config.uploadEnabled }
                });
            }
        },
        esc(str) {
            return String(str).replace(/\\/g, '\\\\').replace(/'/g, "\\'");
        },
        getCodeSnippet() {
            const key = this.esc(this.config.projectKey || 'rf_pub_xxxx');
            const h = this.config.height;
            const theme = this.esc(this.config.theme);
            const origin = window.location.origin;
            const CLOSE = '<' + '/script>';
            const OPEN = '<' + 'script';

            if (this.framework === 'html') {
                return `<link rel="stylesheet" href="${origin}/cdn/v1/richforge.css" />
${OPEN} src="${origin}/cdn/v1/richforge.js">${CLOSE}

<textarea id="editor">${CLOSE}

${OPEN}>
RichForge.create('#editor', {
    projectKey: '${key}',
    height: ${h},
    theme: '${theme}'
});
${CLOSE}`;
            }

            if (this.framework === 'js') {
                return `// npm install @richforge/editor
import { RichForge } from '@richforge/editor';
import '@richforge/editor/dist/richforge.css';

const editor = RichForge.create('#editor', {
    projectKey: '${key}',
    height: ${h}
});`;
            }

            if (this.framework === 'laravel') {
                return `<!-- Blade View Integration -->
@@push('styles')
    <link rel="stylesheet" href="${origin}/cdn/v1/richforge.css" />
@@endpush

<textarea id="content" name="content">@{{ old('content') }}</textarea>

@@push('scripts')
    ${OPEN} src="${origin}/cdn/v1/richforge.js">${CLOSE}
    ${OPEN}>
        RichForge.create('#content', {
            projectKey: '${key}',
            height: ${h}
        });
    ${CLOSE}
@@endpush`;
            }

            if (this.framework === 'react') {
                return `import React, { useEffect, useRef } from 'react';
import { RichForge } from '@richforge/editor';

export function RichForgeEditor() {
    const editorRef = useRef(null);

    useEffect(() => {
        if (editorRef.current) {
            RichForge.create(editorRef.current, {
                projectKey: '${key}',
                height: ${h}
            });
        }
    }, []);

    return <textarea ref={editorRef} />;
}`;
            }

            if (this.framework === 'vue') {
                return `<template>
  <textarea ref="editorEl"></textarea>
</template>

${OPEN} setup>
import { onMounted, ref } from 'vue';
import { RichForge } from '@richforge/editor';

const editorEl = ref(null);

onMounted(() => {
  RichForge.create(editorEl.value, {
    projectKey: '${key}',
    height: ${h}
  });
});
${CLOSE}`;
            }

            if (this.framework === 'php') {
                return `<\x3Fphp
// HTML form with RichForge editor
?>
<link rel="stylesheet" href="${origin}/cdn/v1/richforge.css" />
${OPEN} src="${origin}/cdn/v1/richforge.js">${CLOSE}

<form method="POST" action="save.php">
    <textarea id="content" name="content"></textarea>
    <button type="submit">Save</button>
</form>

${OPEN}>
    RichForge.create('#content', { projectKey: '${key}' });
${CLOSE}`;
            }

            return '';
        },
        copyCode() {
            navigator.clipboard.writeText(this.getCodeSnippet());
            alert('Integration code snippet copied to clipboard!');
        }
    }
}
</script>
@endpush
