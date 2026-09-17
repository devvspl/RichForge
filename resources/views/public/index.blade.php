@extends('layouts.app')

@section('title', 'Free Rich Text Editor for Developers - Embeddable WYSIWYG SDK | RichForge')
@section('meta_description', 'Free developer-focused Rich Text Editor platform. Embed a powerful, secure, customizable WYSIWYG editor into your Laravel, React, Vue, PHP, or HTML application in minutes.')

@section('content')

<!-- ==========================================
     1. HERO SECTION (SOLID LIGHT SLATE BG)
=========================================== -->
<section class="py-16 sm:py-24 bg-[#f8f9fc] text-slate-900 relative overflow-hidden border-b border-slate-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12 relative z-10 text-center">

        <!-- Main Hero Card Container -->
        <div class="max-w-4xl mx-auto bg-white/95 border border-[#e5e7eb] rounded-3xl p-8 sm:p-12 shadow-xl shadow-fuchsia-100/50 space-y-8">
            
            <!-- Announcement Pill -->
            <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-fuchsia-100 border border-fuchsia-200 text-fuchsia-700 text-xs sm:text-sm font-semibold shadow-sm">
                <i class="ri-sparkling-fill text-fuchsia-600"></i>
                <span>RichForge 1.0 Editor SDK is Now Live!</span>
                <span class="bg-fuchsia-600 text-white text-[10px] font-mono px-2.5 py-0.5 rounded-full uppercase tracking-wider font-bold">v1.0.0</span>
            </div>

            <!-- Headline & Subheadline -->
            <div class="space-y-6">
                <h1 class="text-4xl sm:text-6xl md:text-7xl font-serif font-extrabold tracking-tight leading-tight text-[#1a1a2e]">
                    Free Rich Text Editor <br class="hidden sm:inline">
                    <span class="text-fuchsia-600">for Developers</span>
                </h1>

                <p class="text-lg sm:text-2xl text-[#4b5563] max-w-3xl mx-auto font-normal leading-relaxed">
                    Embed a powerful, secure, customizable <span class="font-serif italic text-fuchsia-600">WYSIWYG editor</span> into your web application in less than 2 minutes.
                </p>
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-wrap items-center justify-center gap-4 pt-4">
                <a href="{{ route('register') }}" class="px-8 py-4 bg-fuchsia-600 hover:bg-fuchsia-500 text-white font-bold text-base sm:text-lg rounded-2xl shadow-xl shadow-fuchsia-600/30 transition-all transform hover:-translate-y-0.5 hover:scale-105 flex items-center gap-2.5">
                    <i class="ri-rocket-line text-xl"></i>
                    <span>Start Building Free</span>
                </a>
                <a href="#demo" class="px-8 py-4 bg-white hover:bg-slate-50 text-slate-800 font-bold text-base sm:text-lg rounded-2xl border border-[#e5e7eb] hover:border-fuchsia-300 transition-all flex items-center gap-2.5 shadow-sm">
                    <i class="ri-play-circle-line text-xl text-fuchsia-600"></i>
                    <span>Try Live Editor</span>
                </a>
            </div>

        </div>

        <!-- Developer Trust Light Cards -->
        <div class="max-w-4xl mx-auto grid grid-cols-1 sm:grid-cols-3 gap-6 text-slate-700">
            <div class="flex items-center justify-center gap-3.5 p-5 rounded-2xl bg-white border border-[#e5e7eb] hover:border-fuchsia-300 transition-all shadow-md hover:-translate-y-1">
                <div class="w-11 h-11 rounded-xl bg-fuchsia-100 text-fuchsia-600 flex items-center justify-center text-2xl font-bold shrink-0">
                    <i class="ri-code-s-slash-line"></i>
                </div>
                <div class="text-left">
                    <h3 class="font-bold text-sm text-[#1a1a2e]">Developer-friendly</h3>
                    <p class="text-xs text-[#4b5563]">Vanilla JS, 0 dependencies</p>
                </div>
            </div>

            <div class="flex items-center justify-center gap-3.5 p-5 rounded-2xl bg-white border border-[#e5e7eb] hover:border-purple-300 transition-all shadow-md hover:-translate-y-1">
                <div class="w-11 h-11 rounded-xl bg-purple-100 text-purple-600 flex items-center justify-center text-2xl font-bold shrink-0">
                    <i class="ri-coin-line"></i>
                </div>
                <div class="text-left">
                    <h3 class="font-bold text-sm text-[#1a1a2e]">Free to start</h3>
                    <p class="text-xs text-[#4b5563]">No credit card required</p>
                </div>
            </div>

            <div class="flex items-center justify-center gap-3.5 p-5 rounded-2xl bg-white border border-[#e5e7eb] hover:border-pink-300 transition-all shadow-md hover:-translate-y-1">
                <div class="w-11 h-11 rounded-xl bg-pink-100 text-pink-600 flex items-center justify-center text-2xl font-bold shrink-0">
                    <i class="ri-terminal-box-line"></i>
                </div>
                <div class="text-left">
                    <h3 class="font-bold text-sm text-[#1a1a2e]">Easy integration</h3>
                    <p class="text-xs text-[#4b5563]">2 lines of JS snippet</p>
                </div>
            </div>
        </div>

    </div>
</section>

<!-- ==========================================
     2. LIVE EDITOR DEMO SECTION (SOLID WHITE BG + MAC TERMINAL IDE CARD KEPT DARK)
=========================================== -->
<section id="demo" class="py-16 sm:py-24 px-4 sm:px-8 bg-white text-slate-900 border-b border-slate-200">
    <div class="max-w-7xl mx-auto space-y-12">
        
        <div class="text-center max-w-3xl mx-auto space-y-3">
            <div class="inline-flex items-center gap-2 px-4 py-1 rounded-full bg-fuchsia-100 text-fuchsia-700 text-xs font-semibold uppercase tracking-wider border border-fuchsia-200">
                <i class="ri-play-circle-line"></i> Interactive Playground
            </div>
            <h2 class="text-3xl sm:text-5xl font-serif font-extrabold text-[#1a1a2e] tracking-tight">
                Try the <span class="text-fuchsia-600">Live Editor</span>
            </h2>
            <p class="text-[#4b5563] text-base sm:text-lg">
                Format text, upload images, insert code blocks, and view clean generated HTML output live.
            </p>
        </div>

        <!-- Mac Terminal IDE Console Card Container (Kept Dark as deliberate developer contrast element) -->
        <div class="bg-slate-900 rounded-3xl shadow-2xl border-2 border-slate-700 overflow-hidden space-y-0">
            
            <!-- Mac Terminal Header with Red/Yellow/Green Dots & Tabs -->
            <div class="bg-slate-950 px-6 py-4 flex flex-wrap items-center justify-between gap-4 border-b border-slate-800">
                <div class="flex items-center gap-3">
                    <div class="flex items-center gap-2">
                        <span class="w-3.5 h-3.5 rounded-full bg-rose-500 inline-block"></span>
                        <span class="w-3.5 h-3.5 rounded-full bg-amber-500 inline-block"></span>
                        <span class="w-3.5 h-3.5 rounded-full bg-emerald-500 inline-block"></span>
                    </div>
                    <span class="text-xs font-mono text-slate-400 ml-2 border-l border-slate-800 pl-3 hidden sm:inline">richforge-ide-v1.0.js</span>
                </div>

                <!-- Tab Toggle Buttons -->
                <div class="flex items-center gap-2">
                    <button id="tab-btn-editor" onclick="switchDemoTab('editor')" class="px-4 py-2 rounded-xl text-xs sm:text-sm font-bold bg-fuchsia-600 text-white flex items-center gap-2 transition-all shadow-md shadow-fuchsia-600/30">
                        <i class="ri-edit-2-line"></i> LIVE EDITOR
                    </button>
                    <button id="tab-btn-code" onclick="switchDemoTab('code')" class="px-4 py-2 rounded-xl text-xs sm:text-sm font-bold bg-slate-800 text-slate-300 hover:text-white flex items-center gap-2 transition-all">
                        <i class="ri-code-s-slash-line"></i> HTML / JAVASCRIPT CODE
                    </button>
                </div>

                <!-- Copy Code Button -->
                <button onclick="copyGeneratedHtml()" class="px-4 py-2 bg-slate-800 hover:bg-slate-700 text-slate-200 text-xs font-bold rounded-xl border border-slate-700 flex items-center gap-2 transition-colors">
                    <i class="ri-file-copy-line text-fuchsia-400"></i>
                    <span id="copy-code-btn-text">Copy Code</span>
                </button>
            </div>

            <!-- Live Editor View Container -->
            <div id="demo-tab-editor-container" class="p-6 sm:p-8 bg-white text-slate-900">
                <textarea id="home-demo-editor">
<h2>Build Once. Edit Anywhere. 🚀</h2>
<p>RichForge provides a lightweight, enterprise-ready WYSIWYG editor engine engineered specifically for developers.</p>

<h3>Key Advantages:</h3>
<ul>
  <li><strong>Instant Setup:</strong> Include script tag and initialize in 10 seconds.</li>
  <li><strong>Clean HTML Output:</strong> Sanitized, valid HTML5 with zero messy inline styling bloat.</li>
  <li><strong>Built-in Image Uploader:</strong> Direct drag-and-drop file uploading with secure CORS validation.</li>
</ul>
                </textarea>
            </div>

            <!-- Code Output View Container -->
            <div id="demo-tab-code-container" class="hidden p-6 sm:p-8 bg-slate-950 font-mono text-slate-200 text-xs sm:text-sm overflow-x-auto">
<pre id="generated-html-code" class="text-fuchsia-300">&lt;!-- RichForge Embed Snippet --&gt;
&lt;link rel="stylesheet" href="https://cdn.richforge.io/v1/richforge.css"&gt;
&lt;script src="https://cdn.richforge.io/v1/richforge.js"&gt;&lt;/script&gt;

&lt;textarea id="my-editor"&gt;&lt;/textarea&gt;

&lt;script&gt;
  RichForge.create('#my-editor', {
    projectKey: 'YOUR_PROJECT_KEY',
    height: 400,
    theme: 'default'
  });
&lt;/script&gt;</pre>
            </div>

            <!-- Terminal Footer Status Bar Card -->
            <div class="bg-slate-950 px-6 py-2.5 border-t border-slate-800/80 flex items-center justify-between text-[11px] text-slate-400 font-mono">
                <div class="flex items-center gap-3">
                    <span class="flex items-center gap-1.5 text-emerald-400 font-bold">
                        <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span> READY
                    </span>
                    <span>Engine: RichForge v1.0</span>
                </div>
                <div>Format: HTML5 UTF-8</div>
            </div>

        </div>

    </div>
</section>

<!-- ==========================================
     3. HOW IT WORKS SECTION (SOLID LIGHT LAVENDER BG #f5f3fa)
=========================================== -->
<section id="how-it-works" class="py-16 sm:py-24 px-4 sm:px-8 bg-[#f5f3fa] text-slate-900 border-b border-slate-200">
    <div class="max-w-7xl mx-auto space-y-14">
        
        <div class="text-center max-w-3xl mx-auto space-y-3">
            <div class="inline-flex items-center gap-2 px-4 py-1 rounded-full bg-fuchsia-100 text-fuchsia-700 text-xs font-semibold border border-fuchsia-200">
                <i class="ri-flow-chart"></i> Simple 5-Step Process
            </div>
            <h2 class="text-3xl sm:text-5xl font-serif font-extrabold text-[#1a1a2e] tracking-tight">
                How <span class="text-fuchsia-600">RichForge Works</span>
            </h2>
            <p class="text-[#4b5563] text-base sm:text-lg">
                Go from registration to live rich text editing in 5 seamless steps.
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-5 gap-6">

            <!-- Step 1 Card -->
            <div class="bg-white border border-[#e5e7eb] rounded-3xl p-6 text-center space-y-4 hover:border-fuchsia-300 hover:shadow-xl transition-all group transform hover:-translate-y-1 relative shadow-md">
                <span class="text-[10px] font-mono uppercase tracking-wider text-fuchsia-700 font-bold block bg-fuchsia-100 py-1 px-3 rounded-full w-max mx-auto border border-fuchsia-200">Step 01</span>
                <div class="w-14 h-14 rounded-2xl bg-fuchsia-600 text-white font-extrabold text-2xl flex items-center justify-center mx-auto shadow-lg shadow-fuchsia-600/30 group-hover:scale-110 transition-transform">
                    1
                </div>
                <h3 class="font-serif font-bold text-[#1a1a2e] text-lg">Create Account</h3>
                <p class="text-xs text-[#4b5563] leading-relaxed">Sign up for a free developer account in under 30 seconds.</p>
            </div>

            <!-- Step 2 Card -->
            <div class="bg-white border border-[#e5e7eb] rounded-3xl p-6 text-center space-y-4 hover:border-purple-300 hover:shadow-xl transition-all group transform hover:-translate-y-1 relative shadow-md">
                <span class="text-[10px] font-mono uppercase tracking-wider text-purple-700 font-bold block bg-purple-100 py-1 px-3 rounded-full w-max mx-auto border border-purple-200">Step 02</span>
                <div class="w-14 h-14 rounded-2xl bg-purple-600 text-white font-extrabold text-2xl flex items-center justify-center mx-auto shadow-lg shadow-purple-600/30 group-hover:scale-110 transition-transform">
                    2
                </div>
                <h3 class="font-serif font-bold text-[#1a1a2e] text-lg">Create Project</h3>
                <p class="text-xs text-[#4b5563] leading-relaxed">Create a project workspace and specify allowed domain origins.</p>
            </div>

            <!-- Step 3 Card -->
            <div class="bg-white border border-[#e5e7eb] rounded-3xl p-6 text-center space-y-4 hover:border-pink-300 hover:shadow-xl transition-all group transform hover:-translate-y-1 relative shadow-md">
                <span class="text-[10px] font-mono uppercase tracking-wider text-pink-700 font-bold block bg-pink-100 py-1 px-3 rounded-full w-max mx-auto border border-pink-200">Step 03</span>
                <div class="w-14 h-14 rounded-2xl bg-pink-600 text-white font-extrabold text-2xl flex items-center justify-center mx-auto shadow-lg shadow-pink-600/30 group-hover:scale-110 transition-transform">
                    3
                </div>
                <h3 class="font-serif font-bold text-[#1a1a2e] text-lg">Get Project Key</h3>
                <p class="text-xs text-[#4b5563] leading-relaxed">Copy your public API key (`rf_pub_...`) from your developer dashboard.</p>
            </div>

            <!-- Step 4 Card -->
            <div class="bg-white border border-[#e5e7eb] rounded-3xl p-6 text-center space-y-4 hover:border-indigo-300 hover:shadow-xl transition-all group transform hover:-translate-y-1 relative shadow-md">
                <span class="text-[10px] font-mono uppercase tracking-wider text-indigo-700 font-bold block bg-indigo-100 py-1 px-3 rounded-full w-max mx-auto border border-indigo-200">Step 04</span>
                <div class="w-14 h-14 rounded-2xl bg-indigo-600 text-white font-extrabold text-2xl flex items-center justify-center mx-auto shadow-lg shadow-indigo-600/30 group-hover:scale-110 transition-transform">
                    4
                </div>
                <h3 class="font-serif font-bold text-[#1a1a2e] text-lg">Copy Snippet</h3>
                <p class="text-xs text-[#4b5563] leading-relaxed">Copy the 2-line JavaScript snippet tailored for your tech stack.</p>
            </div>

            <!-- Step 5 Card -->
            <div class="bg-white border border-[#e5e7eb] rounded-3xl p-6 text-center space-y-4 hover:border-emerald-300 hover:shadow-xl transition-all group transform hover:-translate-y-1 relative shadow-md">
                <span class="text-[10px] font-mono uppercase tracking-wider text-emerald-700 font-bold block bg-emerald-100 py-1 px-3 rounded-full w-max mx-auto border border-emerald-200">Step 05</span>
                <div class="w-14 h-14 rounded-2xl bg-emerald-600 text-white font-extrabold text-2xl flex items-center justify-center mx-auto shadow-lg shadow-emerald-600/30 group-hover:scale-110 transition-transform">
                    5
                </div>
                <h3 class="font-serif font-bold text-[#1a1a2e] text-lg">Embed & Launch</h3>
                <p class="text-xs text-[#4b5563] leading-relaxed">Paste snippet into your frontend and enjoy full WYSIWYG editing!</p>
            </div>

        </div>

    </div>
</section>

<!-- ==========================================
     4. WHY RICHFORGE SECTION (SOLID WHITE BG)
=========================================== -->
<section id="product" class="py-16 sm:py-24 px-4 sm:px-8 bg-white text-slate-900 border-b border-slate-200">
    <div class="max-w-7xl mx-auto space-y-14">
        
        <div class="text-center max-w-3xl mx-auto space-y-3">
            <div class="inline-flex items-center gap-2 px-4 py-1 rounded-full bg-fuchsia-100 text-fuchsia-700 text-xs font-semibold border border-fuchsia-200">
                <i class="ri-star-line"></i> Platform Benefits
            </div>
            <h2 class="text-3xl sm:text-5xl font-serif font-extrabold tracking-tight text-[#1a1a2e]">
                Why Developers Choose <span class="text-fuchsia-600 italic">RichForge</span>
            </h2>
            <p class="text-[#4b5563] text-base sm:text-lg">
                Engineered from the ground up to eliminate complex editor integration headaches.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            
            <!-- Bento Card 1 (Span 2) -->
            <div class="md:col-span-2 bg-white border border-[#e5e7eb] p-8 rounded-3xl space-y-5 hover:border-fuchsia-300 transition-all transform hover:-translate-y-1 shadow-lg relative overflow-hidden group">
                <div class="flex items-center justify-between">
                    <div class="w-12 h-12 rounded-2xl bg-fuchsia-100 text-fuchsia-600 flex items-center justify-center text-2xl font-bold">
                        <i class="ri-flash-line"></i>
                    </div>
                    <span class="text-xs font-mono bg-fuchsia-100 text-fuchsia-700 px-3 py-1 rounded-full border border-fuchsia-200 font-bold">Instant Embed</span>
                </div>
                <h3 class="font-serif font-bold text-2xl text-[#1a1a2e]">Zero Build Configuration Required</h3>
                <p class="text-sm text-[#4b5563] leading-relaxed">
                    No heavy Webpack configs, complex npm bundlers, or CSS conflicts. Include standard CDN script tags or ESM modules and initialize in seconds.
                </p>
                <!-- Code Snippet inside Bento Card 1 (Kept Dark for Contrast) -->
                <div class="bg-slate-900 rounded-2xl p-4 font-mono text-xs text-fuchsia-300 border border-slate-800 flex items-center justify-between shadow-inner">
                    <span>RichForge.create('#editor', { projectKey: 'rf_pub_...' });</span>
                    <i class="ri-checkbox-circle-fill text-emerald-400 text-base"></i>
                </div>
            </div>

            <!-- Bento Card 2 -->
            <div class="bg-white border border-[#e5e7eb] p-8 rounded-3xl space-y-5 hover:border-purple-300 transition-all transform hover:-translate-y-1 shadow-lg">
                <div class="w-12 h-12 rounded-2xl bg-purple-100 text-purple-600 flex items-center justify-center text-2xl font-bold">
                    <i class="ri-equalizer-line"></i>
                </div>
                <h3 class="font-serif font-bold text-xl text-[#1a1a2e]">Full Customization</h3>
                <p class="text-sm text-[#4b5563] leading-relaxed">Fine-tune toolbar items, color themes, editor height, custom CSS stylesheets, and HTML sanitization rules.</p>
            </div>

            <!-- Bento Card 3 -->
            <div class="bg-white border border-[#e5e7eb] p-8 rounded-3xl space-y-5 hover:border-pink-300 transition-all transform hover:-translate-y-1 shadow-lg">
                <div class="w-12 h-12 rounded-2xl bg-pink-100 text-pink-600 flex items-center justify-center text-2xl font-bold">
                    <i class="ri-terminal-line"></i>
                </div>
                <h3 class="font-serif font-bold text-xl text-[#1a1a2e]">Developer First API</h3>
                <p class="text-sm text-[#4b5563] leading-relaxed">Rich JS event hooks (`onChange`, `onFocus`), full API documentation, and code generators for 8 frameworks.</p>
            </div>

            <!-- Bento Card 4 -->
            <div class="bg-white border border-[#e5e7eb] p-8 rounded-3xl space-y-5 hover:border-indigo-300 transition-all transform hover:-translate-y-1 shadow-lg">
                <div class="w-12 h-12 rounded-2xl bg-indigo-100 text-indigo-600 flex items-center justify-center text-2xl font-bold">
                    <i class="ri-shield-check-line"></i>
                </div>
                <h3 class="font-serif font-bold text-xl text-[#1a1a2e]">Enterprise Security</h3>
                <p class="text-sm text-[#4b5563] leading-relaxed">Built-in XSS input sanitization, domain origin whitelisting (`*.yourdomain.com`), and authenticated media upload keys.</p>
            </div>

            <!-- Bento Card 5 -->
            <div class="bg-white border border-[#e5e7eb] p-8 rounded-3xl space-y-5 hover:border-cyan-300 transition-all transform hover:-translate-y-1 shadow-lg">
                <div class="w-12 h-12 rounded-2xl bg-cyan-100 text-cyan-600 flex items-center justify-center text-2xl font-bold">
                    <i class="ri-smartphone-line"></i>
                </div>
                <h3 class="font-serif font-bold text-xl text-[#1a1a2e]">Fully Responsive</h3>
                <p class="text-sm text-[#4b5563] leading-relaxed">Fluid toolbar collapse and touch-optimized controls engineered for mobile, tablet, laptop, and desktop screens.</p>
            </div>

        </div>

    </div>
</section>

<!-- ==========================================
     5. EDITOR FEATURES SECTION (SOLID LIGHT LAVENDER BG #f5f3fa)
=========================================== -->
<section id="features" class="py-16 sm:py-24 px-4 sm:px-8 bg-[#f5f3fa] text-slate-900 border-b border-slate-200">
    <div class="max-w-7xl mx-auto space-y-14">
        
        <div class="text-center max-w-3xl mx-auto space-y-3">
            <div class="inline-flex items-center gap-2 px-4 py-1 rounded-full bg-fuchsia-100 text-fuchsia-700 text-xs font-semibold uppercase tracking-wider border border-fuchsia-200">
                <i class="ri-function-line"></i> Powerful Toolkit
            </div>
            <h2 class="text-3xl sm:text-5xl font-serif font-extrabold text-[#1a1a2e] tracking-tight">
                Complete <span class="text-fuchsia-600">Editor Features</span>
            </h2>
            <p class="text-[#4b5563] text-base sm:text-lg">
                Everything you need to give your users a modern rich text creation experience.
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            
            <!-- Tool Tile Card 1 -->
            <div class="bg-white border-t-4 border-fuchsia-500 border-x border-b border-[#e5e7eb] rounded-3xl p-6 space-y-4 hover:border-t-fuchsia-600 shadow-md hover:shadow-xl transition-all transform hover:-translate-y-1">
                <div class="flex items-center justify-between">
                    <div class="w-12 h-12 rounded-2xl bg-fuchsia-100 text-fuchsia-600 flex items-center justify-center text-2xl font-bold">
                        <i class="ri-bold"></i>
                    </div>
                    <span class="text-[10px] bg-fuchsia-100 text-fuchsia-700 font-mono px-2.5 py-0.5 rounded-full uppercase font-bold">Core</span>
                </div>
                <h3 class="font-serif font-bold text-[#1a1a2e] text-lg">Text Formatting</h3>
                <p class="text-xs text-[#4b5563] leading-relaxed">Bold, Italic, Underline, Strikethrough, Subscript, and Superscript controls.</p>
            </div>

            <!-- Tool Tile Card 2 -->
            <div class="bg-white border-t-4 border-purple-500 border-x border-b border-[#e5e7eb] rounded-3xl p-6 space-y-4 hover:border-t-purple-600 shadow-md hover:shadow-xl transition-all transform hover:-translate-y-1">
                <div class="flex items-center justify-between">
                    <div class="w-12 h-12 rounded-2xl bg-purple-100 text-purple-600 flex items-center justify-center text-2xl font-bold">
                        <i class="ri-image-line"></i>
                    </div>
                    <span class="text-[10px] bg-purple-100 text-purple-700 font-mono px-2.5 py-0.5 rounded-full uppercase font-bold">Media</span>
                </div>
                <h3 class="font-serif font-bold text-[#1a1a2e] text-lg">Image & Storage</h3>
                <p class="text-xs text-[#4b5563] leading-relaxed">Direct image upload, URL embeds, image resizing, and alignment tools.</p>
            </div>

            <!-- Tool Tile Card 3 -->
            <div class="bg-white border-t-4 border-pink-500 border-x border-b border-[#e5e7eb] rounded-3xl p-6 space-y-4 hover:border-t-pink-600 shadow-md hover:shadow-xl transition-all transform hover:-translate-y-1">
                <div class="flex items-center justify-between">
                    <div class="w-12 h-12 rounded-2xl bg-pink-100 text-pink-600 flex items-center justify-center text-2xl font-bold">
                        <i class="ri-table-2"></i>
                    </div>
                    <span class="text-[10px] bg-pink-100 text-pink-700 font-mono px-2.5 py-0.5 rounded-full uppercase font-bold">Tables</span>
                </div>
                <h3 class="font-serif font-bold text-[#1a1a2e] text-lg">Data Tables</h3>
                <p class="text-xs text-[#4b5563] leading-relaxed">Dynamic table creation, row & column addition, deletion, and cell shading.</p>
            </div>

            <!-- Tool Tile Card 4 -->
            <div class="bg-white border-t-4 border-indigo-500 border-x border-b border-[#e5e7eb] rounded-3xl p-6 space-y-4 hover:border-t-indigo-600 shadow-md hover:shadow-xl transition-all transform hover:-translate-y-1">
                <div class="flex items-center justify-between">
                    <div class="w-12 h-12 rounded-2xl bg-indigo-100 text-indigo-600 flex items-center justify-center text-2xl font-bold">
                        <i class="ri-code-box-line"></i>
                    </div>
                    <span class="text-[10px] bg-indigo-100 text-indigo-700 font-mono px-2.5 py-0.5 rounded-full uppercase font-bold">Code</span>
                </div>
                <h3 class="font-serif font-bold text-[#1a1a2e] text-lg">Code Blocks</h3>
                <p class="text-xs text-[#4b5563] leading-relaxed">Inline code elements and multi-language syntax-highlighted code blocks.</p>
            </div>

            <!-- Tool Tile Card 5 -->
            <div class="bg-white border-t-4 border-emerald-500 border-x border-b border-[#e5e7eb] rounded-3xl p-6 space-y-4 hover:border-t-emerald-600 shadow-md hover:shadow-xl transition-all transform hover:-translate-y-1">
                <div class="flex items-center justify-between">
                    <div class="w-12 h-12 rounded-2xl bg-emerald-100 text-emerald-600 flex items-center justify-center text-2xl font-bold">
                        <i class="ri-list-unordered"></i>
                    </div>
                    <span class="text-[10px] bg-emerald-100 text-emerald-700 font-mono px-2.5 py-0.5 rounded-full uppercase font-bold">Lists</span>
                </div>
                <h3 class="font-serif font-bold text-[#1a1a2e] text-lg">Lists & Tasks</h3>
                <p class="text-xs text-[#4b5563] leading-relaxed">Bullet lists, ordered numbered lists, and interactive checkbox task lists.</p>
            </div>

            <!-- Tool Tile Card 6 -->
            <div class="bg-white border-t-4 border-cyan-500 border-x border-b border-[#e5e7eb] rounded-3xl p-6 space-y-4 hover:border-t-cyan-600 shadow-md hover:shadow-xl transition-all transform hover:-translate-y-1">
                <div class="flex items-center justify-between">
                    <div class="w-12 h-12 rounded-2xl bg-cyan-100 text-cyan-600 flex items-center justify-center text-2xl font-bold">
                        <i class="ri-link"></i>
                    </div>
                    <span class="text-[10px] bg-cyan-100 text-cyan-700 font-mono px-2.5 py-0.5 rounded-full uppercase font-bold">Links</span>
                </div>
                <h3 class="font-serif font-bold text-[#1a1a2e] text-lg">Hyperlinks</h3>
                <p class="text-xs text-[#4b5563] leading-relaxed">URL insertion, target blank attributes, link title tooltips, and unlink.</p>
            </div>

            <!-- Tool Tile Card 7 -->
            <div class="bg-white border-t-4 border-orange-500 border-x border-b border-[#e5e7eb] rounded-3xl p-6 space-y-4 hover:border-t-orange-600 shadow-md hover:shadow-xl transition-all transform hover:-translate-y-1">
                <div class="flex items-center justify-between">
                    <div class="w-12 h-12 rounded-2xl bg-orange-100 text-orange-600 flex items-center justify-center text-2xl font-bold">
                        <i class="ri-code-view"></i>
                    </div>
                    <span class="text-[10px] bg-orange-100 text-orange-700 font-mono px-2.5 py-0.5 rounded-full uppercase font-bold">Source</span>
                </div>
                <h3 class="font-serif font-bold text-[#1a1a2e] text-lg">HTML Source Mode</h3>
                <p class="text-xs text-[#4b5563] leading-relaxed">Toggle raw HTML source view and inspect sanitized output in real-time.</p>
            </div>

            <!-- Tool Tile Card 8 -->
            <div class="bg-white border-t-4 border-fuchsia-500 border-x border-b border-[#e5e7eb] rounded-3xl p-6 space-y-4 hover:border-t-fuchsia-600 shadow-md hover:shadow-xl transition-all transform hover:-translate-y-1">
                <div class="flex items-center justify-between">
                    <div class="w-12 h-12 rounded-2xl bg-fuchsia-100 text-fuchsia-600 flex items-center justify-center text-2xl font-bold">
                        <i class="ri-plug-line"></i>
                    </div>
                    <span class="text-[10px] bg-fuchsia-100 text-fuchsia-700 font-mono px-2.5 py-0.5 rounded-full uppercase font-bold">Plugins</span>
                </div>
                <h3 class="font-serif font-bold text-[#1a1a2e] text-lg">Plugin Hooks</h3>
                <p class="text-xs text-[#4b5563] leading-relaxed">Extend toolbar actions with custom plugin hooks and third-party widgets.</p>
            </div>

        </div>

    </div>
</section>

<!-- ==========================================
     6. IMAGE & FILE UPLOAD SECTION (SOLID WHITE BG)
=========================================== -->
<section id="uploads" class="py-16 sm:py-24 px-4 sm:px-8 bg-white text-slate-900 border-b border-slate-200">
    <div class="max-w-7xl mx-auto space-y-12">
        
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            
            <!-- Left Column Container Card -->
            <div class="bg-white border border-[#e5e7eb] rounded-3xl p-8 space-y-6 shadow-xl">
                <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-pink-100 text-pink-700 text-xs font-semibold uppercase tracking-wider border border-pink-200">
                    <i class="ri-upload-cloud-line"></i> Enterprise Storage Engine
                </div>

                <h2 class="text-3xl sm:text-5xl font-serif font-extrabold text-[#1a1a2e] tracking-tight leading-tight">
                    Seamless Image & <br>
                    <span class="text-fuchsia-600">File Upload API</span>
                </h2>

                <p class="text-[#4b5563] text-base sm:text-lg leading-relaxed">
                    RichForge includes an end-to-end media upload pipeline. Drag images directly into the editor or paste screenshots from your clipboard.
                </p>

                <div class="space-y-4 pt-2">
                    <div class="flex items-start gap-3.5 p-4 rounded-2xl bg-[#f8f9fc] border border-[#e5e7eb]">
                        <div class="w-8 h-8 rounded-full bg-fuchsia-600 text-white flex items-center justify-center text-sm font-bold shrink-0 mt-0.5 shadow-md">
                            <i class="ri-check-line"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-[#1a1a2e] text-sm">Drag & Drop Uploads</h4>
                            <p class="text-xs text-[#4b5563] mt-0.5">Drop PNG, JPG, WebP, GIF files directly onto the editor canvas.</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-3.5 p-4 rounded-2xl bg-[#f8f9fc] border border-[#e5e7eb]">
                        <div class="w-8 h-8 rounded-full bg-purple-600 text-white flex items-center justify-center text-sm font-bold shrink-0 mt-0.5 shadow-md">
                            <i class="ri-check-line"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-[#1a1a2e] text-sm">Clipboard Paste Upload</h4>
                            <p class="text-xs text-[#4b5563] mt-0.5">Paste screenshots straight from your system clipboard into your content.</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-3.5 p-4 rounded-2xl bg-[#f8f9fc] border border-[#e5e7eb]">
                        <div class="w-8 h-8 rounded-full bg-pink-600 text-white flex items-center justify-center text-sm font-bold shrink-0 mt-0.5 shadow-md">
                            <i class="ri-check-line"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-[#1a1a2e] text-sm">Secure Server Storage</h4>
                            <p class="text-xs text-[#4b5563] mt-0.5">Files stored with MIME validation, size limits, and unique UUID paths.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column Interactive Upload Showcase Card -->
            <div class="bg-white border-2 border-dashed border-fuchsia-300 rounded-3xl p-8 sm:p-10 shadow-xl space-y-6 relative overflow-hidden">
                <div class="border-2 border-dashed border-fuchsia-200 hover:border-fuchsia-400 rounded-2xl p-10 text-center space-y-4 bg-[#f8f9fc] transition-colors cursor-pointer">
                    <div class="w-16 h-16 rounded-2xl bg-fuchsia-100 text-fuchsia-600 flex items-center justify-center text-3xl font-bold mx-auto shadow-sm">
                        <i class="ri-upload-2-line"></i>
                    </div>
                    <div>
                        <h4 class="font-serif font-bold text-lg text-[#1a1a2e]">Drag & drop files to upload</h4>
                        <p class="text-xs text-[#4b5563] mt-1">Supports PNG, JPG, GIF, WebP up to 10MB</p>
                    </div>
                    <span class="inline-block px-5 py-2.5 bg-fuchsia-600 hover:bg-fuchsia-500 text-white rounded-xl text-xs font-bold transition-colors shadow-lg shadow-fuchsia-600/30">
                        Browse Computer
                    </span>
                </div>
                
                <div class="bg-[#f8f9fc] rounded-2xl p-4 flex items-center justify-between text-xs border border-[#e5e7eb]">
                    <div class="flex items-center gap-3">
                        <i class="ri-image-2-line text-fuchsia-600 text-xl"></i>
                        <div>
                            <span class="font-bold text-[#1a1a2e] block">hero-banner.webp</span>
                            <span class="text-[#4b5563] text-[10px]">1.2 MB • Upload Complete</span>
                        </div>
                    </div>
                    <span class="text-emerald-700 font-bold flex items-center gap-1 bg-emerald-100 px-2.5 py-1 rounded-full border border-emerald-200">
                        <i class="ri-checkbox-circle-fill text-emerald-600"></i> Saved
                    </span>
                </div>
            </div>

        </div>

    </div>
</section>

<!-- ==========================================
     7. CUSTOMIZATION SECTION (SOLID LIGHT LAVENDER BG #f5f3fa)
=========================================== -->
<section id="customization" class="py-16 sm:py-24 px-4 sm:px-8 bg-[#f5f3fa] text-slate-900 border-b border-slate-200">
    <div class="max-w-7xl mx-auto space-y-14">
        
        <div class="text-center max-w-3xl mx-auto space-y-3">
            <div class="inline-flex items-center gap-2 px-4 py-1 rounded-full bg-indigo-100 text-indigo-700 text-xs font-semibold border border-indigo-200">
                <i class="ri-paint-brush-line"></i> Complete Control
            </div>
            <h2 class="text-3xl sm:text-5xl font-serif font-extrabold tracking-tight text-[#1a1a2e]">
                Fully <span class="text-fuchsia-600 italic">Customizable</span> Editor
            </h2>
            <p class="text-[#4b5563] text-base sm:text-lg">
                Adapt every aspect of the editor to match your application's brand identity.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            
            <div class="bg-white border border-[#e5e7eb] p-6 rounded-3xl space-y-4 hover:border-fuchsia-300 transition-all transform hover:-translate-y-1 shadow-md hover:shadow-xl">
                <div class="w-12 h-12 rounded-2xl bg-fuchsia-100 text-fuchsia-600 flex items-center justify-center text-2xl font-bold">
                    <i class="ri-tools-line"></i>
                </div>
                <h3 class="font-serif font-bold text-lg text-[#1a1a2e]">Toolbar Items</h3>
                <p class="text-xs text-[#4b5563] leading-relaxed">Choose exact toolbar buttons or create minimalist slim toolbars for comments and quick forms.</p>
                <div class="pt-2 flex items-center gap-2">
                    <span class="w-3 h-3 rounded-full bg-fuchsia-500"></span>
                    <span class="w-3 h-3 rounded-full bg-purple-500"></span>
                    <span class="w-3 h-3 rounded-full bg-emerald-500"></span>
                </div>
            </div>

            <div class="bg-white border border-[#e5e7eb] p-6 rounded-3xl space-y-4 hover:border-purple-300 transition-all transform hover:-translate-y-1 shadow-md hover:shadow-xl">
                <div class="w-12 h-12 rounded-2xl bg-purple-100 text-purple-600 flex items-center justify-center text-2xl font-bold">
                    <i class="ri-palette-line"></i>
                </div>
                <h3 class="font-serif font-bold text-lg text-[#1a1a2e]">Themes & CSS</h3>
                <p class="text-xs text-[#4b5563] leading-relaxed">Switch between Light, Dark, High-Contrast, or pass custom CSS stylesheets seamlessly.</p>
                <div class="pt-2 flex items-center gap-2 text-[10px] font-mono text-purple-700">
                    <span class="bg-purple-100 px-2 py-0.5 rounded border border-purple-200">theme: 'default'</span>
                </div>
            </div>

            <div class="bg-white border border-[#e5e7eb] p-6 rounded-3xl space-y-4 hover:border-pink-300 transition-all transform hover:-translate-y-1 shadow-md hover:shadow-xl">
                <div class="w-12 h-12 rounded-2xl bg-pink-100 text-pink-600 flex items-center justify-center text-2xl font-bold">
                    <i class="ri-aspect-ratio-line"></i>
                </div>
                <h3 class="font-serif font-bold text-lg text-[#1a1a2e]">Height & Dimensions</h3>
                <p class="text-xs text-[#4b5563] leading-relaxed">Set fixed px heights (`height: 500`), min/max boundaries, or auto-resizing canvas.</p>
                <div class="pt-2 flex items-center gap-2 text-[10px] font-mono text-pink-700">
                    <span class="bg-pink-100 px-2 py-0.5 rounded border border-pink-200">height: 450</span>
                </div>
            </div>

            <div class="bg-white border border-[#e5e7eb] p-6 rounded-3xl space-y-4 hover:border-indigo-300 transition-all transform hover:-translate-y-1 shadow-md hover:shadow-xl">
                <div class="w-12 h-12 rounded-2xl bg-indigo-100 text-indigo-600 flex items-center justify-center text-2xl font-bold">
                    <i class="ri-code-box-line"></i>
                </div>
                <h3 class="font-serif font-bold text-lg text-[#1a1a2e]">HTML Output</h3>
                <p class="text-xs text-[#4b5563] leading-relaxed">Configure output format: clean HTML5 markup, Markdown syntax, or JSON tree structures.</p>
                <div class="pt-2 flex items-center gap-2 text-[10px] font-mono text-indigo-700">
                    <span class="bg-indigo-100 px-2 py-0.5 rounded border border-indigo-200">output: 'html5'</span>
                </div>
            </div>

        </div>

    </div>
</section>

<!-- ==========================================
     8. FRAMEWORKS / INTEGRATIONS SECTION (SOLID WHITE BG)
=========================================== -->
<section id="integrations" class="py-16 sm:py-20 px-4 sm:px-8 bg-white text-slate-900 border-b border-slate-200">
    <div class="max-w-7xl mx-auto space-y-12">
        
        <div class="text-center max-w-3xl mx-auto space-y-3">
            <div class="inline-flex items-center gap-2 px-4 py-1 rounded-full bg-fuchsia-100 text-fuchsia-700 text-xs font-semibold uppercase tracking-wider border border-fuchsia-200">
                <i class="ri-cpu-line"></i> Framework Support
            </div>
            <h2 class="text-3xl sm:text-5xl font-serif font-extrabold text-[#1a1a2e] tracking-tight">
                Integrates with <span class="text-fuchsia-600">Every Tech Stack</span>
            </h2>
            <p class="text-[#4b5563] text-base sm:text-lg">
                Ready-to-use integration code generators available for all major web frameworks.
            </p>
        </div>

        <!-- Auto-Sliding Infinite Framework Marquee -->
        <div class="marquee-container py-4">
            <div class="marquee-track gap-6">
                <!-- Set 1 -->
                <div class="flex items-center gap-6 shrink-0">
                    <div class="bg-white border border-[#e5e7eb] px-6 py-4 rounded-2xl shadow-md hover:border-fuchsia-400 transition-colors flex items-center gap-3.5">
                        <i class="ri-command-line text-3xl text-red-500"></i>
                        <span class="font-bold text-sm text-[#1a1a2e]">Laravel</span>
                    </div>
                    <div class="bg-white border border-[#e5e7eb] px-6 py-4 rounded-2xl shadow-md hover:border-fuchsia-400 transition-colors flex items-center gap-3.5">
                        <i class="ri-code-s-slash-line text-3xl text-purple-600"></i>
                        <span class="font-bold text-sm text-[#1a1a2e]">PHP</span>
                    </div>
                    <div class="bg-white border border-[#e5e7eb] px-6 py-4 rounded-2xl shadow-md hover:border-fuchsia-400 transition-colors flex items-center gap-3.5">
                        <i class="ri-reactjs-line text-3xl text-cyan-500"></i>
                        <span class="font-bold text-sm text-[#1a1a2e]">React</span>
                    </div>
                    <div class="bg-white border border-[#e5e7eb] px-6 py-4 rounded-2xl shadow-md hover:border-fuchsia-400 transition-colors flex items-center gap-3.5">
                        <i class="ri-vuejs-line text-3xl text-emerald-500"></i>
                        <span class="font-bold text-sm text-[#1a1a2e]">Vue.js</span>
                    </div>
                    <div class="bg-white border border-[#e5e7eb] px-6 py-4 rounded-2xl shadow-md hover:border-fuchsia-400 transition-colors flex items-center gap-3.5">
                        <i class="ri-angularjs-line text-3xl text-red-500"></i>
                        <span class="font-bold text-sm text-[#1a1a2e]">Angular</span>
                    </div>
                    <div class="bg-white border border-[#e5e7eb] px-6 py-4 rounded-2xl shadow-md hover:border-fuchsia-400 transition-colors flex items-center gap-3.5">
                        <i class="ri-wordpress-line text-3xl text-blue-600"></i>
                        <span class="font-bold text-sm text-[#1a1a2e]">WordPress</span>
                    </div>
                    <div class="bg-white border border-[#e5e7eb] px-6 py-4 rounded-2xl shadow-md hover:border-fuchsia-400 transition-colors flex items-center gap-3.5">
                        <i class="ri-javascript-line text-3xl text-amber-500"></i>
                        <span class="font-bold text-sm text-[#1a1a2e]">JavaScript</span>
                    </div>
                    <div class="bg-white border border-[#e5e7eb] px-6 py-4 rounded-2xl shadow-md hover:border-fuchsia-400 transition-colors flex items-center gap-3.5">
                        <i class="ri-html5-line text-3xl text-orange-500"></i>
                        <span class="font-bold text-sm text-[#1a1a2e]">HTML5</span>
                    </div>
                </div>

                <!-- Set 2 (Duplicate for Smooth Loop) -->
                <div class="flex items-center gap-6 shrink-0">
                    <div class="bg-white border border-[#e5e7eb] px-6 py-4 rounded-2xl shadow-md hover:border-fuchsia-400 transition-colors flex items-center gap-3.5">
                        <i class="ri-command-line text-3xl text-red-500"></i>
                        <span class="font-bold text-sm text-[#1a1a2e]">Laravel</span>
                    </div>
                    <div class="bg-white border border-[#e5e7eb] px-6 py-4 rounded-2xl shadow-md hover:border-fuchsia-400 transition-colors flex items-center gap-3.5">
                        <i class="ri-code-s-slash-line text-3xl text-purple-600"></i>
                        <span class="font-bold text-sm text-[#1a1a2e]">PHP</span>
                    </div>
                    <div class="bg-white border border-[#e5e7eb] px-6 py-4 rounded-2xl shadow-md hover:border-fuchsia-400 transition-colors flex items-center gap-3.5">
                        <i class="ri-reactjs-line text-3xl text-cyan-500"></i>
                        <span class="font-bold text-sm text-[#1a1a2e]">React</span>
                    </div>
                    <div class="bg-white border border-[#e5e7eb] px-6 py-4 rounded-2xl shadow-md hover:border-fuchsia-400 transition-colors flex items-center gap-3.5">
                        <i class="ri-vuejs-line text-3xl text-emerald-500"></i>
                        <span class="font-bold text-sm text-[#1a1a2e]">Vue.js</span>
                    </div>
                    <div class="bg-white border border-[#e5e7eb] px-6 py-4 rounded-2xl shadow-md hover:border-fuchsia-400 transition-colors flex items-center gap-3.5">
                        <i class="ri-angularjs-line text-3xl text-red-500"></i>
                        <span class="font-bold text-sm text-[#1a1a2e]">Angular</span>
                    </div>
                    <div class="bg-white border border-[#e5e7eb] px-6 py-4 rounded-2xl shadow-md hover:border-fuchsia-400 transition-colors flex items-center gap-3.5">
                        <i class="ri-wordpress-line text-3xl text-blue-600"></i>
                        <span class="font-bold text-sm text-[#1a1a2e]">WordPress</span>
                    </div>
                    <div class="bg-white border border-[#e5e7eb] px-6 py-4 rounded-2xl shadow-md hover:border-fuchsia-400 transition-colors flex items-center gap-3.5">
                        <i class="ri-javascript-line text-3xl text-amber-500"></i>
                        <span class="font-bold text-sm text-[#1a1a2e]">JavaScript</span>
                    </div>
                    <div class="bg-white border border-[#e5e7eb] px-6 py-4 rounded-2xl shadow-md hover:border-fuchsia-400 transition-colors flex items-center gap-3.5">
                        <i class="ri-html5-line text-3xl text-orange-500"></i>
                        <span class="font-bold text-sm text-[#1a1a2e]">HTML5</span>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

<!-- ==========================================
     9. USE CASES SECTION (SOLID LIGHT LAVENDER BG #f5f3fa)
=========================================== -->
<section id="use-cases" class="py-16 sm:py-24 px-4 sm:px-8 bg-[#f5f3fa] text-slate-900 border-b border-slate-200">
    <div class="max-w-7xl mx-auto space-y-14">
        
        <div class="text-center max-w-3xl mx-auto space-y-3">
            <div class="inline-flex items-center gap-2 px-4 py-1 rounded-full bg-purple-100 text-purple-700 text-xs font-semibold uppercase tracking-wider border border-purple-200">
                <i class="ri-layout-grid-line"></i> Industry Applications
            </div>
            <h2 class="text-3xl sm:text-5xl font-serif font-extrabold text-[#1a1a2e] tracking-tight">
                Built for Every <span class="text-fuchsia-600">Use Case</span>
            </h2>
            <p class="text-[#4b5563] text-base sm:text-lg">
                Powering content editing across thousands of modern web platforms.
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            
            <div class="bg-white border border-[#e5e7eb] rounded-3xl p-6 relative overflow-hidden group hover:border-fuchsia-300 hover:shadow-xl transition-all transform hover:-translate-y-1 space-y-3 shadow-md">
                <div class="h-1.5 w-full bg-fuchsia-500 absolute top-0 left-0"></div>
                <div class="w-12 h-12 bg-fuchsia-100 text-fuchsia-600 rounded-2xl flex items-center justify-center text-2xl font-bold">
                    <i class="ri-layout-3-line"></i>
                </div>
                <h3 class="font-serif font-bold text-[#1a1a2e] text-base">Content Management (CMS)</h3>
                <p class="text-xs text-[#4b5563] leading-relaxed">Rich article & page editing for custom headless CMS platforms.</p>
            </div>

            <div class="bg-white border border-[#e5e7eb] rounded-3xl p-6 relative overflow-hidden group hover:border-purple-300 hover:shadow-xl transition-all transform hover:-translate-y-1 space-y-3 shadow-md">
                <div class="h-1.5 w-full bg-purple-500 absolute top-0 left-0"></div>
                <div class="w-12 h-12 bg-purple-100 text-purple-600 rounded-2xl flex items-center justify-center text-2xl font-bold">
                    <i class="ri-user-star-line"></i>
                </div>
                <h3 class="font-serif font-bold text-[#1a1a2e] text-base">Customer CRM</h3>
                <p class="text-xs text-[#4b5563] leading-relaxed">Rich HTML email composition, support ticketing, and lead notes.</p>
            </div>

            <div class="bg-white border border-[#e5e7eb] rounded-3xl p-6 relative overflow-hidden group hover:border-pink-300 hover:shadow-xl transition-all transform hover:-translate-y-1 space-y-3 shadow-md">
                <div class="h-1.5 w-full bg-pink-500 absolute top-0 left-0"></div>
                <div class="w-12 h-12 bg-pink-100 text-pink-600 rounded-2xl flex items-center justify-center text-2xl font-bold">
                    <i class="ri-article-line"></i>
                </div>
                <h3 class="font-serif font-bold text-[#1a1a2e] text-base">Blogging Engines</h3>
                <p class="text-xs text-[#4b5563] leading-relaxed">Publish formatted blog posts with embedded images and code blocks.</p>
            </div>

            <div class="bg-white border border-[#e5e7eb] rounded-3xl p-6 relative overflow-hidden group hover:border-indigo-300 hover:shadow-xl transition-all transform hover:-translate-y-1 space-y-3 shadow-md">
                <div class="h-1.5 w-full bg-indigo-500 absolute top-0 left-0"></div>
                <div class="w-12 h-12 bg-indigo-100 text-indigo-600 rounded-2xl flex items-center justify-center text-2xl font-bold">
                    <i class="ri-shopping-cart-line"></i>
                </div>
                <h3 class="font-serif font-bold text-[#1a1a2e] text-base">E-Commerce Stores</h3>
                <p class="text-xs text-[#4b5563] leading-relaxed">Format detailed product descriptions, specs tables, and customer reviews.</p>
            </div>

            <div class="bg-white border border-[#e5e7eb] rounded-3xl p-6 relative overflow-hidden group hover:border-emerald-300 hover:shadow-xl transition-all transform hover:-translate-y-1 space-y-3 shadow-md">
                <div class="h-1.5 w-full bg-emerald-500 absolute top-0 left-0"></div>
                <div class="w-12 h-12 bg-emerald-100 text-emerald-600 rounded-2xl flex items-center justify-center text-2xl font-bold">
                    <i class="ri-graduation-cap-line"></i>
                </div>
                <h3 class="font-serif font-bold text-[#1a1a2e] text-base">Education (LMS)</h3>
                <p class="text-xs text-[#4b5563] leading-relaxed">Create course lesson content, student assignments, and quizzes.</p>
            </div>

            <div class="bg-white border border-[#e5e7eb] rounded-3xl p-6 relative overflow-hidden group hover:border-cyan-300 hover:shadow-xl transition-all transform hover:-translate-y-1 space-y-3 shadow-md">
                <div class="h-1.5 w-full bg-cyan-500 absolute top-0 left-0"></div>
                <div class="w-12 h-12 bg-cyan-100 text-cyan-600 rounded-2xl flex items-center justify-center text-2xl font-bold">
                    <i class="ri-dashboard-line"></i>
                </div>
                <h3 class="font-serif font-bold text-[#1a1a2e] text-base">Admin Dashboards</h3>
                <p class="text-xs text-[#4b5563] leading-relaxed">SaaS backoffice admin panels, announcement builders, and updates.</p>
            </div>

            <div class="bg-white border border-[#e5e7eb] rounded-3xl p-6 relative overflow-hidden group hover:border-orange-300 hover:shadow-xl transition-all transform hover:-translate-y-1 space-y-3 shadow-md">
                <div class="h-1.5 w-full bg-orange-500 absolute top-0 left-0"></div>
                <div class="w-12 h-12 bg-orange-100 text-orange-600 rounded-2xl flex items-center justify-center text-2xl font-bold">
                    <i class="ri-book-read-line"></i>
                </div>
                <h3 class="font-serif font-bold text-[#1a1a2e] text-base">Documentation Portals</h3>
                <p class="text-xs text-[#4b5563] leading-relaxed">Technical documentation, API guides, and knowledge base wikis.</p>
            </div>

            <div class="bg-white border border-[#e5e7eb] rounded-3xl p-6 relative overflow-hidden group hover:border-fuchsia-300 hover:shadow-xl transition-all transform hover:-translate-y-1 space-y-3 shadow-md">
                <div class="h-1.5 w-full bg-fuchsia-500 absolute top-0 left-0"></div>
                <div class="w-12 h-12 bg-fuchsia-100 text-fuchsia-600 rounded-2xl flex items-center justify-center text-2xl font-bold">
                    <i class="ri-briefcase-line"></i>
                </div>
                <h3 class="font-serif font-bold text-[#1a1a2e] text-base">Job Portals</h3>
                <p class="text-xs text-[#4b5563] leading-relaxed">Post rich formatted job descriptions, candidate requirements, and notes.</p>
            </div>

        </div>

    </div>
</section>

<!-- ==========================================
     10. DEVELOPER PLATFORM SECTION (SOLID WHITE BG)
=========================================== -->
<section id="developer-platform" class="py-16 sm:py-24 px-4 sm:px-8 bg-white text-slate-900 border-b border-slate-200">
    <div class="max-w-7xl mx-auto space-y-12">
        
        <div class="text-center max-w-3xl mx-auto space-y-3">
            <div class="inline-flex items-center gap-2 px-4 py-1 rounded-full bg-fuchsia-100 text-fuchsia-700 text-xs font-semibold border border-fuchsia-200">
                <i class="ri-terminal-window-line"></i> Full Stack Developer Suite
            </div>
            <h2 class="text-3xl sm:text-5xl font-serif font-extrabold tracking-tight text-[#1a1a2e]">
                Complete <span class="text-fuchsia-600 italic">Developer Platform</span>
            </h2>
            <p class="text-[#4b5563] text-base sm:text-lg">
                Manage your API keys, whitelisted domains, uploads, and analytics from your dedicated dashboard.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            
            <div class="bg-white border border-[#e5e7eb] p-8 rounded-3xl space-y-5 hover:border-fuchsia-300 transition-all transform hover:-translate-y-1 shadow-lg">
                <div class="flex items-center justify-between">
                    <div class="w-12 h-12 rounded-2xl bg-fuchsia-100 text-fuchsia-600 flex items-center justify-center text-2xl font-bold">
                        <i class="ri-key-2-line"></i>
                    </div>
                    <span class="text-[10px] font-mono bg-emerald-100 text-emerald-700 px-2.5 py-1 rounded-full border border-emerald-200 font-bold">Active Keys</span>
                </div>
                <h3 class="font-serif font-bold text-xl text-[#1a1a2e]">Project Keys</h3>
                <p class="text-xs text-[#4b5563] leading-relaxed">Separate Public API keys for frontend embed and Secret API keys for backend upload verification.</p>
                <!-- Code Preview Pill (Kept Dark for Contrast) -->
                <div class="bg-slate-900 p-3 rounded-xl font-mono text-[11px] text-fuchsia-300 border border-slate-800 shadow-inner">
                    rf_pub_prod_9981247192...
                </div>
            </div>

            <div class="bg-white border border-[#e5e7eb] p-8 rounded-3xl space-y-5 hover:border-purple-300 transition-all transform hover:-translate-y-1 shadow-lg">
                <div class="flex items-center justify-between">
                    <div class="w-12 h-12 rounded-2xl bg-purple-100 text-purple-600 flex items-center justify-center text-2xl font-bold">
                        <i class="ri-global-line"></i>
                    </div>
                    <span class="text-[10px] font-mono bg-purple-100 text-purple-700 px-2.5 py-1 rounded-full border border-purple-200 font-bold">Origin Lock</span>
                </div>
                <h3 class="font-serif font-bold text-xl text-[#1a1a2e]">Allowed Domains</h3>
                <p class="text-xs text-[#4b5563] leading-relaxed">Restrict editor API execution exclusively to approved domain origins including wildcards like `*.app.com`.</p>
                <!-- Code Preview Pill (Kept Dark for Contrast) -->
                <div class="bg-slate-900 p-3 rounded-xl font-mono text-[11px] text-purple-300 border border-slate-800 shadow-inner">
                    *.yourdomain.com
                </div>
            </div>

            <div class="bg-white border border-[#e5e7eb] p-8 rounded-3xl space-y-5 hover:border-pink-300 transition-all transform hover:-translate-y-1 shadow-lg">
                <div class="flex items-center justify-between">
                    <div class="w-12 h-12 rounded-2xl bg-pink-100 text-pink-600 flex items-center justify-center text-2xl font-bold">
                        <i class="ri-bar-chart-2-line"></i>
                    </div>
                    <span class="text-[10px] font-mono bg-pink-100 text-pink-700 px-2.5 py-1 rounded-full border border-pink-200 font-bold">Live Analytics</span>
                </div>
                <h3 class="font-serif font-bold text-xl text-[#1a1a2e]">Realtime Analytics</h3>
                <p class="text-xs text-[#4b5563] leading-relaxed">Track daily editor initializations, upload storage bandwidth usage, and active project requests.</p>
                <!-- Code Preview Pill (Kept Dark for Contrast) -->
                <div class="bg-slate-900 p-3 rounded-xl font-mono text-[11px] text-pink-300 border border-slate-800 flex items-center justify-between shadow-inner">
                    <span>Requests Today:</span>
                    <span class="font-bold text-emerald-400">14,290</span>
                </div>
            </div>

        </div>

    </div>
</section>

<!-- ==========================================
     11. SECURITY SECTION (SOLID LIGHT LAVENDER BG #f5f3fa)
=========================================== -->
<section id="security" class="py-16 sm:py-24 px-4 sm:px-8 bg-[#f5f3fa] text-slate-900 border-b border-slate-200">
    <div class="max-w-7xl mx-auto space-y-12">
        
        <div class="text-center max-w-3xl mx-auto space-y-3">
            <div class="inline-flex items-center gap-2 px-4 py-1 rounded-full bg-emerald-100 text-emerald-700 text-xs font-semibold uppercase tracking-wider border border-emerald-200">
                <i class="ri-shield-keyhole-line"></i> Bank-Grade Security
            </div>
            <h2 class="text-3xl sm:text-5xl font-serif font-extrabold text-[#1a1a2e] tracking-tight">
                Enterprise <span class="text-emerald-600">Security Standards</span>
            </h2>
            <p class="text-[#4b5563] text-base sm:text-lg">
                Protect your application and users from malicious scripts, unauthorized embeds, and storage abuse.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            
            <div class="bg-white border-l-4 border-emerald-500 border-y border-r border-[#e5e7eb] rounded-3xl p-8 space-y-4 shadow-md hover:shadow-xl transition-all transform hover:-translate-y-1">
                <div class="flex items-center justify-between">
                    <div class="w-12 h-12 rounded-2xl bg-emerald-100 text-emerald-600 flex items-center justify-center text-2xl font-bold">
                        <i class="ri-shield-user-line"></i>
                    </div>
                    <span class="text-[10px] font-mono bg-emerald-100 text-emerald-700 px-2.5 py-1 rounded-full font-bold border border-emerald-200">SANITY VERIFIED</span>
                </div>
                <h3 class="font-serif font-bold text-xl text-[#1a1a2e]">XSS Protection</h3>
                <p class="text-xs text-[#4b5563] leading-relaxed">Rigorous HTML input sanitizer strips script tags, malicious event attributes (`onerror`), and unsafe protocols automatically.</p>
            </div>

            <div class="bg-white border-l-4 border-teal-500 border-y border-r border-[#e5e7eb] rounded-3xl p-8 space-y-4 shadow-md hover:shadow-xl transition-all transform hover:-translate-y-1">
                <div class="flex items-center justify-between">
                    <div class="w-12 h-12 rounded-2xl bg-teal-100 text-teal-600 flex items-center justify-center text-2xl font-bold">
                        <i class="ri-lock-2-line"></i>
                    </div>
                    <span class="text-[10px] font-mono bg-teal-100 text-teal-700 px-2.5 py-1 rounded-full font-bold border border-teal-200">ORIGIN CHECKED</span>
                </div>
                <h3 class="font-serif font-bold text-xl text-[#1a1a2e]">Domain Origin Lock</h3>
                <p class="text-xs text-[#4b5563] leading-relaxed">Requests from unauthorized websites or stolen project keys are blocked at the middleware level.</p>
            </div>

            <div class="bg-white border-l-4 border-cyan-500 border-y border-r border-[#e5e7eb] rounded-3xl p-8 space-y-4 shadow-md hover:shadow-xl transition-all transform hover:-translate-y-1">
                <div class="flex items-center justify-between">
                    <div class="w-12 h-12 rounded-2xl bg-cyan-100 text-cyan-600 flex items-center justify-center text-2xl font-bold">
                        <i class="ri-shield-cross-line"></i>
                    </div>
                    <span class="text-[10px] font-mono bg-cyan-100 text-cyan-700 px-2.5 py-1 rounded-full font-bold border border-cyan-200">CORS ENFORCED</span>
                </div>
                <h3 class="font-serif font-bold text-xl text-[#1a1a2e]">CORS Policy</h3>
                <p class="text-xs text-[#4b5563] leading-relaxed">Custom Access-Control-Allow-Origin headers configured dynamically per project workspace.</p>
            </div>

        </div>

    </div>
</section>

<!-- ==========================================
     12. PRICING SECTION (SOLID WHITE BG)
=========================================== -->
<section id="pricing" class="py-16 sm:py-24 px-4 sm:px-8 bg-white text-slate-900 border-b border-slate-200">
    <div class="max-w-7xl mx-auto space-y-12">
        
        <div class="text-center max-w-3xl mx-auto space-y-3">
            <div class="inline-flex items-center gap-2 px-4 py-1 rounded-full bg-fuchsia-100 text-fuchsia-700 text-xs font-semibold border border-fuchsia-200">
                <i class="ri-price-tag-3-line"></i> Transparent Pricing
            </div>
            <h2 class="text-3xl sm:text-5xl font-serif font-extrabold tracking-tight text-[#1a1a2e]">
                Free Developer <span class="text-fuchsia-600 italic">Plan</span>
            </h2>
            <p class="text-[#4b5563] text-base sm:text-lg">
                Build and launch your web applications with zero upfront cost.
            </p>
        </div>

        <div class="max-w-lg mx-auto bg-white border-2 border-fuchsia-500 rounded-3xl p-8 sm:p-10 shadow-2xl shadow-fuchsia-100 relative space-y-8">
            <div class="absolute -top-4 left-1/2 -translate-x-1/2 px-5 py-1.5 bg-fuchsia-600 text-white text-xs font-extrabold rounded-full uppercase tracking-widest shadow-xl border border-fuchsia-400">
                100% Free Forever
            </div>

            <div class="text-center space-y-3 pt-2">
                <h3 class="font-serif font-bold text-3xl text-[#1a1a2e]">Free Developer Tier</h3>
                <p class="text-xs text-[#4b5563]">Everything you need to embed WYSIWYG editing into your apps.</p>
                <div class="pt-4">
                    <span class="text-6xl font-serif font-extrabold text-[#1a1a2e]">$0</span>
                    <span class="text-[#4b5563] text-sm font-normal"> / forever free</span>
                </div>
            </div>

            <ul class="space-y-4 text-xs sm:text-sm text-[#4b5563]">
                <li class="flex items-center gap-3">
                    <i class="ri-checkbox-circle-fill text-fuchsia-600 text-lg"></i>
                    <span class="font-medium">Unlimited Editor Initializations</span>
                </li>
                <li class="flex items-center gap-3">
                    <i class="ri-checkbox-circle-fill text-fuchsia-600 text-lg"></i>
                    <span class="font-medium">Full Formatting & Media Suite</span>
                </li>
                <li class="flex items-center gap-3">
                    <i class="ri-checkbox-circle-fill text-fuchsia-600 text-lg"></i>
                    <span class="font-medium">1,000 Free File Uploads / Month</span>
                </li>
                <li class="flex items-center gap-3">
                    <i class="ri-checkbox-circle-fill text-fuchsia-600 text-lg"></i>
                    <span class="font-medium">Domain Whitelisting & Security Lock</span>
                </li>
                <li class="flex items-center gap-3">
                    <i class="ri-checkbox-circle-fill text-fuchsia-600 text-lg"></i>
                    <span class="font-medium">Standard Community Support</span>
                </li>
            </ul>

            <a href="{{ route('register') }}" class="block w-full py-4 bg-fuchsia-600 hover:bg-fuchsia-500 text-white text-center font-bold text-base rounded-2xl shadow-xl shadow-fuchsia-600/30 transition-all hover:scale-105">
                Start Building Free Now
            </a>
        </div>

    </div>
</section>

<!-- ==========================================
     13. DOCUMENTATION SECTION (SOLID LIGHT LAVENDER BG #f5f3fa)
=========================================== -->
<section id="documentation" class="py-12 sm:py-16 px-4 sm:px-8 bg-[#f5f3fa] text-slate-900 border-b border-slate-200">
    <div class="max-w-7xl mx-auto space-y-8">
        
        <div class="text-center max-w-3xl mx-auto space-y-3">
            <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-purple-100 text-purple-700 text-xs font-semibold border border-purple-200">
                <i class="ri-book-open-line"></i> Developer Hub
            </div>
            <h2 class="text-3xl sm:text-5xl font-serif font-extrabold text-[#1a1a2e] tracking-tight">
                Comprehensive <span class="text-fuchsia-600">Documentation</span>
            </h2>
            <p class="text-[#4b5563] text-base sm:text-lg">
                Explore guides, API reference specs, and step-by-step framework tutorials.
            </p>
        </div>

        <!-- Sleek Compact Doc Navigator Cards -->
        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-4 text-center">
            
            <a href="{{ route('docs.index') }}" class="bg-white border border-[#e5e7eb] p-4 rounded-2xl hover:border-fuchsia-400 hover:shadow-md transition-all group space-y-2 shadow-sm">
                <i class="ri-rocket-line text-2xl text-fuchsia-600 group-hover:scale-110 transition-transform block"></i>
                <h3 class="font-serif font-bold text-[#1a1a2e] text-xs">Get Started</h3>
            </a>

            <a href="{{ route('docs.index') }}" class="bg-white border border-[#e5e7eb] p-4 rounded-2xl hover:border-fuchsia-400 hover:shadow-md transition-all group space-y-2 shadow-sm">
                <i class="ri-code-s-slash-line text-2xl text-purple-600 group-hover:scale-110 transition-transform block"></i>
                <h3 class="font-serif font-bold text-[#1a1a2e] text-xs">API Reference</h3>
            </a>

            <a href="{{ route('docs.index') }}" class="bg-white border border-[#e5e7eb] p-4 rounded-2xl hover:border-fuchsia-400 hover:shadow-md transition-all group space-y-2 shadow-sm">
                <i class="ri-command-line text-2xl text-red-500 group-hover:scale-110 transition-transform block"></i>
                <h3 class="font-serif font-bold text-[#1a1a2e] text-xs">Laravel Guide</h3>
            </a>

            <a href="{{ route('docs.index') }}" class="bg-white border border-[#e5e7eb] p-4 rounded-2xl hover:border-fuchsia-400 hover:shadow-md transition-all group space-y-2 shadow-sm">
                <i class="ri-reactjs-line text-2xl text-cyan-500 group-hover:scale-110 transition-transform block"></i>
                <h3 class="font-serif font-bold text-[#1a1a2e] text-xs">React Guide</h3>
            </a>

            <a href="{{ route('docs.index') }}" class="bg-white border border-[#e5e7eb] p-4 rounded-2xl hover:border-fuchsia-400 hover:shadow-md transition-all group space-y-2 shadow-sm">
                <i class="ri-vuejs-line text-2xl text-emerald-500 group-hover:scale-110 transition-transform block"></i>
                <h3 class="font-serif font-bold text-[#1a1a2e] text-xs">Vue Guide</h3>
            </a>

            <a href="{{ route('docs.index') }}" class="bg-white border border-[#e5e7eb] p-4 rounded-2xl hover:border-fuchsia-400 hover:shadow-md transition-all group space-y-2 shadow-sm">
                <i class="ri-file-code-line text-2xl text-orange-500 group-hover:scale-110 transition-transform block"></i>
                <h3 class="font-serif font-bold text-[#1a1a2e] text-xs">PHP Guide</h3>
            </a>

        </div>

        <div class="text-center pt-2">
            <a href="{{ route('docs.index') }}" class="inline-flex items-center gap-2 px-8 py-3.5 bg-fuchsia-600 hover:bg-fuchsia-500 text-white font-bold text-sm rounded-2xl transition-all shadow-lg shadow-fuchsia-600/30">
                <i class="ri-book-2-line text-lg"></i>
                <span>Read Full Documentation</span>
            </a>
        </div>

    </div>
</section>

<!-- ==========================================
     14. FAQ SECTION (SOLID WHITE BG)
=========================================== -->
<section id="faq" class="py-16 sm:py-24 px-4 sm:px-8 bg-white text-slate-900 border-b border-slate-200">
    <div class="max-w-4xl mx-auto space-y-12">
        
        <div class="text-center space-y-3">
            <div class="inline-flex items-center gap-2 px-4 py-1 rounded-full bg-fuchsia-100 text-fuchsia-700 text-xs font-semibold uppercase tracking-wider border border-fuchsia-200">
                <i class="ri-questionnaire-line"></i> Developer Questions
            </div>
            <h2 class="text-3xl sm:text-5xl font-serif font-extrabold text-[#1a1a2e] tracking-tight">
                Frequently Asked <span class="text-fuchsia-600">Questions</span>
            </h2>
            <p class="text-[#4b5563] text-base sm:text-lg">
                Common questions developers ask before integrating RichForge.
            </p>
        </div>

        <div class="space-y-4">
            
            <details class="bg-white border border-[#e5e7eb] hover:border-fuchsia-300 rounded-2xl p-6 group cursor-pointer shadow-md transition-all">
                <summary class="font-serif font-bold text-[#1a1a2e] text-lg flex items-center justify-between">
                    <span>How does domain restriction whitelisting work?</span>
                    <i class="ri-arrow-down-s-line text-fuchsia-600 group-open:rotate-180 transition-transform text-2xl"></i>
                </summary>
                <p class="text-xs sm:text-sm text-[#4b5563] mt-4 leading-relaxed bg-[#f8f9fc] p-4 rounded-xl border border-[#e5e7eb]">
                    Inside your developer dashboard, you add allowed domain origins (e.g., `app.mycompany.com` or wildcard `*.mycompany.com`). RichForge's API middleware checks HTTP Origin & Referer headers to block unauthorized third-party embeds.
                </p>
            </details>

            <details class="bg-white border border-[#e5e7eb] hover:border-fuchsia-300 rounded-2xl p-6 group cursor-pointer shadow-md transition-all">
                <summary class="font-serif font-bold text-[#1a1a2e] text-lg flex items-center justify-between">
                    <span>Is the RichForge Editor completely free to use?</span>
                    <i class="ri-arrow-down-s-line text-fuchsia-600 group-open:rotate-180 transition-transform text-2xl"></i>
                </summary>
                <p class="text-xs sm:text-sm text-[#4b5563] mt-4 leading-relaxed bg-[#f8f9fc] p-4 rounded-xl border border-[#e5e7eb]">
                    Yes! The Free plan provides unlimited editor initializations and full access to formatting, media, code blocks, and 1,000 monthly image upload operations with zero credit card requirements.
                </p>
            </details>

            <details class="bg-white border border-[#e5e7eb] hover:border-fuchsia-300 rounded-2xl p-6 group cursor-pointer shadow-md transition-all">
                <summary class="font-serif font-bold text-[#1a1a2e] text-lg flex items-center justify-between">
                    <span>Where are uploaded images and files stored?</span>
                    <i class="ri-arrow-down-s-line text-fuchsia-600 group-open:rotate-180 transition-transform text-2xl"></i>
                </summary>
                <p class="text-xs sm:text-sm text-[#4b5563] mt-4 leading-relaxed bg-[#f8f9fc] p-4 rounded-xl border border-[#e5e7eb]">
                    Uploaded files are processed securely through RichForge's Upload API, assigned unique UUID paths, sanitized, and stored in isolated per-project storage buckets accessible via public CDN URLs.
                </p>
            </details>

            <details class="bg-white border border-[#e5e7eb] hover:border-fuchsia-300 rounded-2xl p-6 group cursor-pointer shadow-md transition-all">
                <summary class="font-serif font-bold text-[#1a1a2e] text-lg flex items-center justify-between">
                    <span>Can I sanitize the generated HTML output?</span>
                    <i class="ri-arrow-down-s-line text-fuchsia-600 group-open:rotate-180 transition-transform text-2xl"></i>
                </summary>
                <p class="text-xs sm:text-sm text-[#4b5563] mt-4 leading-relaxed bg-[#f8f9fc] p-4 rounded-xl border border-[#e5e7eb]">
                    Yes, RichForge includes an integrated XSS HTML sanitizer engine (`sanitizer.ts`) that strips unsafe script tags, inline event handlers, and malicious protocols before returning output via `.getContent()`.
                </p>
            </details>

        </div>

    </div>
</section>

<!-- ==========================================
     15. FINAL CTA SECTION (SOLID LIGHT LAVENDER BG #f5f3fa)
=========================================== -->
<section class="py-16 sm:py-24 px-4 sm:px-8 bg-[#f5f3fa] text-slate-900">
    <div class="max-w-5xl mx-auto bg-white border-2 border-fuchsia-300 rounded-3xl p-10 md:p-16 text-center text-slate-900 shadow-2xl space-y-8 relative overflow-hidden">
        
        <div class="max-w-3xl mx-auto space-y-6 relative z-10">
            <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-fuchsia-100 text-fuchsia-700 text-xs font-semibold border border-fuchsia-200">
                <i class="ri-rocket-line"></i> Instant Integration
            </div>

            <h2 class="text-3xl sm:text-5xl font-serif font-extrabold tracking-tight text-[#1a1a2e] leading-tight">
                Ready to add <span class="text-fuchsia-600 italic">rich text editing</span>?
            </h2>

            <p class="text-[#4b5563] text-base sm:text-lg max-w-2xl mx-auto font-normal leading-relaxed">
                Join thousands of developers building modern rich text web applications with RichForge.
            </p>

            <div class="flex flex-wrap items-center justify-center gap-4 pt-4">
                <a href="{{ route('register') }}" class="px-8 py-4 bg-fuchsia-600 hover:bg-fuchsia-500 text-white font-bold text-base rounded-2xl shadow-xl shadow-fuchsia-600/30 transition-all hover:scale-105 flex items-center gap-2">
                    <span>Start Building Free</span>
                    <i class="ri-arrow-right-line"></i>
                </a>
                <a href="{{ route('playground') }}" class="px-7 py-4 bg-white hover:bg-slate-50 text-slate-800 font-bold text-base rounded-2xl border border-[#e5e7eb] hover:border-fuchsia-300 transition-all flex items-center gap-2 shadow-sm">
                    <i class="ri-code-box-line text-fuchsia-600"></i>
                    <span>Try Playground</span>
                </a>
            </div>
        </div>

    </div>
</section>

<!-- Demo Interactive Scripts -->
<script>
    function initHomeDemoEditor() {
        if (window.RichForge && document.getElementById('home-demo-editor')) {
            if (!window.homeEditorInstance) {
                window.homeEditorInstance = RichForge.create('#home-demo-editor', {
                    projectKey: 'rf_pub_demo_prod_1234567890abcdef',
                    height: 420,
                    theme: 'default'
                });
            }
        } else if (document.getElementById('home-demo-editor')) {
            setTimeout(initHomeDemoEditor, 100);
        }
    }
    document.addEventListener('DOMContentLoaded', initHomeDemoEditor);
    initHomeDemoEditor();

    function switchDemoTab(tab) {
        const editorContainer = document.getElementById('demo-tab-editor-container');
        const codeContainer = document.getElementById('demo-tab-code-container');
        const btnEditor = document.getElementById('tab-btn-editor');
        const btnCode = document.getElementById('tab-btn-code');

        if (tab === 'editor') {
            editorContainer.classList.remove('hidden');
            codeContainer.classList.add('hidden');

            btnEditor.className = "px-4 py-2 rounded-xl text-xs sm:text-sm font-bold bg-fuchsia-600 text-white flex items-center gap-2 transition-all shadow-md shadow-fuchsia-600/30";
            btnCode.className = "px-4 py-2 rounded-xl text-xs sm:text-sm font-bold bg-slate-800 text-slate-300 hover:text-white flex items-center gap-2 transition-all";
        } else {
            editorContainer.classList.add('hidden');
            codeContainer.classList.remove('hidden');

            btnEditor.className = "px-4 py-2 rounded-xl text-xs sm:text-sm font-bold bg-slate-800 text-slate-300 hover:text-white flex items-center gap-2 transition-all";
            btnCode.className = "px-4 py-2 rounded-xl text-xs sm:text-sm font-bold bg-fuchsia-600 text-white flex items-center gap-2 transition-all shadow-md shadow-fuchsia-600/30";

            if (window.homeEditorInstance) {
                const htmlContent = window.homeEditorInstance.getContent();
                const formattedSnippet = `<!-- RichForge Embed Snippet -->\n<link rel="stylesheet" href="https://cdn.richforge.io/v1/richforge.css">\n<script src="https://cdn.richforge.io/v1/richforge.js"><\/script>\n\n<textarea id="my-editor">\n${htmlContent}\n<\/textarea>\n\n<script>\n  RichForge.create('#my-editor', {\n    projectKey: 'YOUR_PROJECT_KEY',\n    height: 400,\n    theme: 'default'\n  });\n<\/script>`;
                document.getElementById('generated-html-code').textContent = formattedSnippet;
            }
        }
    }

    function copyGeneratedHtml() {
        const codeElem = document.getElementById('generated-html-code');
        navigator.clipboard.writeText(codeElem.textContent).then(() => {
            const btnText = document.getElementById('copy-code-btn-text');
            btnText.textContent = 'Copied!';
            setTimeout(() => {
                btnText.textContent = 'Copy Code';
            }, 2000);
        });
    }
</script>

@endsection