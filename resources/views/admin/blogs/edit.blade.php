@extends('layouts.dashboard')

@section('title', 'Edit Blog Post - Admin Console')
@section('header_title', 'Edit Blog Post')

@section('content')
<div class="max-w-7xl mx-auto space-y-6" x-data="blogPostForm()">
    <!-- Top Header Bar -->
    <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 pb-2 border-b border-slate-200">
        <div>
            <h2 class="text-2xl font-serif font-extrabold text-[#1a1a2e]">Edit Article #{{ $post->id }}</h2>
        </div>
        <div class="flex items-center gap-3">
            <a href="{{ route('admin.blogs.index') }}" class="px-4 py-2 bg-slate-100 hover:bg-slate-200 text-slate-700 hover:text-slate-900 text-xs font-bold rounded-xl border border-slate-200/80 transition-all inline-flex items-center gap-2 shadow-xs">
                <i class="ri-arrow-left-line text-sm text-slate-500"></i> Back to Blog List
            </a>
        </div>
    </div>

    @if ($errors->any())
        <div class="p-4 bg-red-50 border border-red-200 rounded-2xl text-xs text-red-700 space-y-1 shadow-sm">
            <div class="font-bold flex items-center gap-1.5 text-sm">
                <i class="ri-error-warning-fill text-red-600"></i> Please resolve validation errors:
            </div>
            <ul class="list-disc list-inside space-y-0.5 pl-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.blogs.update', $post->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- 8 - 4 GRID LAYOUT -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
            
            <!-- LEFT MAIN COLUMN (8 COLS) -->
            <div class="lg:col-span-8 space-y-6">
                
                <!-- ARTICLE CONTENT CARD -->
                <div class="bg-white border border-slate-200 rounded-2xl p-6 sm:p-8 shadow-sm space-y-6">
                    <h3 class="font-serif font-bold text-lg text-[#1a1a2e] border-b border-slate-100 pb-3 flex items-center gap-2">
                        <i class="ri-article-line text-fuchsia-600"></i> Main Article Content
                    </h3>

                    <!-- Title & Slug -->
                    <div class="space-y-4">
                        <div class="space-y-1.5">
                            <label class="block text-xs font-bold text-slate-700">Article Title <span class="text-red-500">*</span></label>
                            <input type="text"
                                   name="title"
                                   x-model="title"
                                   required
                                   class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm font-semibold text-[#1a1a2e] focus:outline-none focus:ring-2 focus:ring-fuchsia-500">
                        </div>

                        <div class="space-y-1.5">
                            <label class="block text-xs font-bold text-slate-700">Slug (URL Segment)</label>
                            <input type="text"
                                   name="slug"
                                   x-model="slug"
                                   class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs font-mono text-fuchsia-700 focus:outline-none focus:ring-2 focus:ring-fuchsia-500">
                            
                            <!-- Live URL Preview -->
                            <div class="text-[11px] text-slate-500 font-mono flex items-center gap-1.5 pt-1">
                                <i class="ri-link text-fuchsia-600"></i>
                                <span>Preview URL:</span>
                                <span class="text-fuchsia-600 font-semibold truncate" x-text="baseUrl + '/blog/' + (slug ? slug : 'your-article-slug')"></span>
                            </div>
                        </div>
                    </div>

                    <!-- Excerpt -->
                    <div class="space-y-1.5">
                        <label class="block text-xs font-bold text-slate-700">Short Excerpt <span class="text-red-500">*</span></label>
                        <textarea name="excerpt"
                                  x-model="excerpt"
                                  rows="2"
                                  required
                                  class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs text-[#1a1a2e] focus:ring-2 focus:ring-fuchsia-500"></textarea>
                    </div>

                    <!-- Content + Quality Helpers -->
                    <div class="space-y-2">
                        <div class="flex items-center justify-between">
                            <label class="block text-xs font-bold text-slate-700">Full Article Content (Markdown / HTML) <span class="text-red-500">*</span></label>
                            <div class="text-[11px] text-slate-500 font-mono flex items-center gap-3">
                                <span><i class="ri-file-word-line text-fuchsia-600"></i> <strong x-text="wordCount">0</strong> words</span>
                                <span>&bull;</span>
                                <span><i class="ri-time-line text-fuchsia-600"></i> ~<strong x-text="readTime">1</strong> min read</span>
                            </div>
                        </div>

                        <textarea name="content"
                                  x-model="content"
                                  rows="14"
                                  required
                                  class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-xs font-mono text-[#1a1a2e] focus:ring-2 focus:ring-fuchsia-500"></textarea>

                        <!-- Heading Structure Warning -->
                        <div x-show="content.length > 50 && !hasHeadings" x-transition class="p-3 bg-amber-50 border border-amber-200 rounded-xl text-xs text-amber-800 flex items-center gap-2">
                            <i class="ri-alert-line text-amber-600 text-sm flex-shrink-0"></i>
                            <span><strong>SEO Suggestion:</strong> No H2 or H3 headings (`## Heading`) detected. Consider adding headings to structure long sections.</span>
                        </div>
                    </div>
                </div>

                <!-- BLOG FAQS SECTION (DYNAMIC REPEATER) -->
                <!-- COLLAPSIBLE BLOG FAQS SECTION (DYNAMIC REPEATER) -->
                <div class="bg-white border border-slate-200 rounded-2xl shadow-sm overflow-hidden">
                    <button type="button"
                            @click="showFaqs = !showFaqs"
                            class="w-full p-6 text-left flex items-center justify-between bg-slate-50/50 hover:bg-slate-50 transition-colors">
                        <div class="flex items-center gap-2.5">
                            <div class="w-7 h-7 rounded-lg bg-fuchsia-100 text-fuchsia-700 flex items-center justify-center font-bold text-sm">
                                <i class="ri-question-answer-line"></i>
                            </div>
                            <div>
                                <h3 class="font-serif font-bold text-base text-[#1a1a2e]">Article FAQs (Frequently Asked Questions)</h3>
                                <p class="text-xs text-slate-500">Add Q&As for readers and Google search FAQ rich snippets.</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-3">
                            <span class="text-xs font-semibold text-slate-500 font-mono" x-text="`${faqs.length} FAQ(s)`"></span>
                            <i class="ri-arrow-down-s-line text-xl text-slate-400 transition-transform" :class="showFaqs ? 'rotate-180' : ''"></i>
                        </div>
                    </button>

                    <div x-show="showFaqs" x-transition class="p-6 sm:p-8 border-t border-slate-200 space-y-4">
                        <div class="flex items-center justify-between pb-2">
                            <span class="text-xs font-semibold text-slate-600">Dynamic Q&A Repeater</span>
                            <button type="button" @click="addFaq()" class="px-3.5 py-1.5 bg-fuchsia-50 hover:bg-fuchsia-100 text-fuchsia-700 text-xs font-bold rounded-xl border border-fuchsia-200 transition-colors inline-flex items-center gap-1.5">
                                <i class="ri-add-line"></i> Add FAQ Item
                            </button>
                        </div>

                        <template x-for="(faq, index) in faqs" :key="index">
                            <div class="p-4 bg-slate-50 border border-slate-200 rounded-2xl space-y-3 relative group">
                                <div class="flex items-center justify-between">
                                    <span class="text-xs font-bold text-slate-700 flex items-center gap-1.5 font-mono">
                                        <i class="ri-question-line text-fuchsia-600"></i> Question #<span x-text="index + 1"></span>
                                    </span>
                                    <button type="button" @click="removeFaq(index)" class="text-xs text-red-500 hover:text-red-700 font-semibold inline-flex items-center gap-1">
                                        <i class="ri-delete-bin-line"></i> Remove
                                    </button>
                                </div>

                                <input type="text"
                                       :name="`faqs[${index}][question]`"
                                       x-model="faq.question"
                                       placeholder="e.g. Can I use RichForge with React and Vue?"
                                       class="w-full px-3.5 py-2 bg-white border border-slate-200 rounded-xl text-xs font-semibold text-[#1a1a2e] focus:ring-2 focus:ring-fuchsia-500">

                                <textarea :name="`faqs[${index}][answer]`"
                                          x-model="faq.answer"
                                          rows="2"
                                          placeholder="Detailed answer explanation..."
                                          class="w-full px-3.5 py-2 bg-white border border-slate-200 rounded-xl text-xs text-[#1a1a2e] focus:ring-2 focus:ring-fuchsia-500"></textarea>
                            </div>
                        </template>

                        <div x-show="faqs.length === 0" class="p-6 text-center border-2 border-dashed border-slate-200 rounded-2xl text-slate-400 text-xs">
                            <i class="ri-questionnaire-line text-2xl block mb-1"></i>
                            No FAQs added yet. Click <strong class="text-fuchsia-600 cursor-pointer" @click="addFaq()">"+ Add FAQ Item"</strong> to include Q&As.
                        </div>
                    </div>
                </div>

                <!-- COLLAPSIBLE SEO & METADATA CARD -->
                <div class="bg-white border border-slate-200 rounded-2xl shadow-sm overflow-hidden">
                    <button type="button"
                            @click="showSeo = !showSeo"
                            class="w-full p-6 text-left flex items-center justify-between bg-slate-50/50 hover:bg-slate-50 transition-colors">
                        <div class="flex items-center gap-2.5">
                            <div class="w-7 h-7 rounded-lg bg-fuchsia-100 text-fuchsia-700 flex items-center justify-center font-bold text-sm">
                                <i class="ri-search-eye-line"></i>
                            </div>
                            <div>
                                <h3 class="font-serif font-bold text-base text-[#1a1a2e]">SEO & Metadata Settings</h3>
                                <p class="text-xs text-slate-500">Configure search titles, descriptions, and indexing rules.</p>
                            </div>
                        </div>
                        <i class="ri-arrow-down-s-line text-xl text-slate-400 transition-transform" :class="showSeo ? 'rotate-180' : ''"></i>
                    </button>

                    <div x-show="showSeo" x-transition class="p-6 sm:p-8 border-t border-slate-200 space-y-6">
                        <!-- Meta Title -->
                        <div class="space-y-1.5">
                            <div class="flex items-center justify-between">
                                <label class="block text-xs font-bold text-slate-700">Meta Title</label>
                                <div class="text-[11px] font-mono font-semibold" :class="metaTitleLengthClass">
                                    <span x-text="metaTitle.length">0</span> / 60 chars (Ideal: 50-60)
                                </div>
                            </div>
                            <input type="text"
                                   name="meta_title"
                                   x-model="metaTitle"
                                   placeholder="Defaults to Article Title if left empty"
                                   class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs text-[#1a1a2e] focus:ring-2 focus:ring-fuchsia-500">
                        </div>

                        <!-- Meta Description -->
                        <div class="space-y-1.5">
                            <div class="flex items-center justify-between">
                                <label class="block text-xs font-bold text-slate-700">Meta Description</label>
                                <div class="text-[11px] font-mono font-semibold" :class="metaDescLengthClass">
                                    <span x-text="metaDescription.length">0</span> / 160 chars (Ideal: 150-160)
                                </div>
                            </div>
                            <textarea name="meta_description"
                                      x-model="metaDescription"
                                      rows="3"
                                      placeholder="Shown in Google search results — defaults to Short Excerpt if empty"
                                      class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs text-[#1a1a2e] focus:ring-2 focus:ring-fuchsia-500"></textarea>
                        </div>

                        <!-- Focus Keyword & Canonical URL -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-1.5">
                                <label class="block text-xs font-bold text-slate-700">Focus Keyword</label>
                                <input type="text"
                                       name="focus_keyword"
                                       x-model="focusKeyword"
                                       placeholder="e.g. embed rich text editor"
                                       class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs text-[#1a1a2e] focus:ring-2 focus:ring-fuchsia-500">
                            </div>

                            <div class="space-y-1.5">
                                <label class="block text-xs font-bold text-slate-700">Canonical URL</label>
                                <input type="url"
                                       name="canonical_url"
                                       x-model="canonicalUrl"
                                       placeholder="Leave empty unless republished from elsewhere"
                                       class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs font-mono text-slate-800 focus:ring-2 focus:ring-fuchsia-500">
                            </div>
                        </div>

                        <!-- Search Engine Visibility (Robots) -->
                        <div class="space-y-1.5">
                            <label class="block text-xs font-bold text-slate-700">Search Engine Visibility (Robots)</label>
                            <select name="robots" x-model="robots" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs font-semibold text-[#1a1a2e] focus:ring-2 focus:ring-fuchsia-500">
                                <option value="index, follow">Index & Follow (Default - Recommended)</option>
                                <option value="noindex, follow">No Index, Follow links</option>
                                <option value="noindex, nofollow">No Index, No Follow (Exclude from search engines)</option>
                                <option value="index, nofollow">Index, No Follow links</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- COLLAPSIBLE SOCIAL SHARING CARD -->
                <div class="bg-white border border-slate-200 rounded-2xl shadow-sm overflow-hidden">
                    <button type="button"
                            @click="showSocial = !showSocial"
                            class="w-full p-6 text-left flex items-center justify-between bg-slate-50/50 hover:bg-slate-50 transition-colors">
                        <div class="flex items-center gap-2.5">
                            <div class="w-7 h-7 rounded-lg bg-indigo-100 text-indigo-700 flex items-center justify-center font-bold text-sm">
                                <i class="ri-share-forward-line"></i>
                            </div>
                            <div>
                                <h3 class="font-serif font-bold text-base text-[#1a1a2e]">Social Sharing & Open Graph</h3>
                                <p class="text-xs text-slate-500">Customize link previews for Twitter/X, Facebook, and LinkedIn.</p>
                            </div>
                        </div>
                        <i class="ri-arrow-down-s-line text-xl text-slate-400 transition-transform" :class="showSocial ? 'rotate-180' : ''"></i>
                    </button>

                    <div x-show="showSocial" x-transition class="p-6 sm:p-8 border-t border-slate-200 space-y-6">
                        <div class="grid grid-cols-1 gap-6 items-start">
                            <div class="space-y-1.5">
                                <label class="block text-xs font-bold text-slate-700">Open Graph Title</label>
                                <input type="text"
                                       name="og_title"
                                       x-model="ogTitle"
                                       placeholder="Defaults to Meta Title"
                                       class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs text-[#1a1a2e] focus:ring-2 focus:ring-fuchsia-500">
                            </div>

                            <div class="space-y-1.5">
                                <label class="block text-xs font-bold text-slate-700">Open Graph Description</label>
                                <textarea name="og_description"
                                          x-model="ogDescription"
                                          rows="2"
                                          placeholder="Defaults to Meta Description"
                                          class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs text-[#1a1a2e] focus:ring-2 focus:ring-fuchsia-500"></textarea>
                            </div>

                            <!-- Live Social Card Mockup -->
                            <div class="bg-slate-50 border border-slate-200 rounded-2xl p-4 space-y-2">
                                <span class="text-[11px] font-bold text-slate-500 uppercase tracking-wider block">Live Social Card Preview</span>
                                <div class="bg-white border border-slate-200 rounded-xl overflow-hidden shadow-sm">
                                    <div class="h-28 bg-slate-200 relative overflow-hidden flex items-center justify-center">
                                        <template x-if="effectiveOgImage">
                                            <img :src="effectiveOgImage" class="w-full h-full object-cover">
                                        </template>
                                        <template x-if="!effectiveOgImage">
                                            <div class="text-slate-400 text-xs font-mono flex flex-col items-center gap-1">
                                                <i class="ri-image-line text-2xl"></i>
                                                <span>Social Card Banner</span>
                                            </div>
                                        </template>
                                    </div>
                                    <div class="p-3 space-y-1 bg-white">
                                        <span class="text-[10px] text-slate-400 uppercase font-mono block">richforge.dev</span>
                                        <h5 class="font-bold text-xs text-slate-900 leading-snug line-clamp-1" x-text="effectiveOgTitle"></h5>
                                        <p class="text-[11px] text-slate-500 line-clamp-2 leading-relaxed" x-text="effectiveOgDescription"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- RIGHT SIDEBAR COLUMN (4 COLS - STICKY) -->
            <div class="lg:col-span-4 space-y-6 sticky top-24">
                
                <!-- PUBLISH CARD -->
                <div class="bg-white border border-slate-200 rounded-2xl p-6 shadow-sm space-y-5">
                    <span class="text-xs font-bold text-slate-500 uppercase tracking-wider font-mono block">PUBLISH</span>

                    <!-- Status Toggle -->
                    <div class="space-y-2">
                        <div class="flex items-center justify-between">
                            <span class="text-sm font-bold text-[#1a1a2e]">Status</span>
                            <label class="relative inline-flex items-center cursor-pointer gap-2">
                                <input type="checkbox" name="is_published" value="1" x-model="isPublished" class="sr-only peer">
                                <div class="w-11 h-6 bg-slate-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-slate-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-fuchsia-600"></div>
                                <span class="text-xs font-bold transition-colors" :class="isPublished ? 'text-fuchsia-600' : 'text-slate-500'" x-text="isPublished ? 'Published' : 'Draft'"></span>
                            </label>
                        </div>

                        <div class="flex items-center justify-between text-xs text-slate-500 pt-1">
                            <span>Published: <strong class="text-slate-700" x-text="formattedPublishDate"></strong></span>
                            <a :href="previewUrl" target="_blank" class="text-fuchsia-600 hover:text-fuchsia-700 font-bold inline-flex items-center gap-1 transition-colors">
                                <i class="ri-external-link-line"></i> Visit Blog
                            </a>
                        </div>
                    </div>

                    <!-- Preview Container Box (Fuchsia Tinted) -->
                    <div class="bg-fuchsia-50/60 border border-fuchsia-200/80 rounded-2xl p-4 space-y-3">
                        <div class="flex items-center justify-between">
                            <span class="text-sm font-bold text-slate-800">Preview</span>
                            <span class="text-[10px] font-bold uppercase tracking-wider px-2 py-0.5 rounded-full bg-white text-fuchsia-700 border border-fuchsia-200 shadow-xs">Active</span>
                        </div>

                        <div class="space-y-1.5">
                            <label class="block text-xs font-semibold text-fuchsia-900">Preview Link</label>
                            <div class="flex items-center gap-1.5">
                                <input type="text"
                                       readonly
                                       :value="previewUrl"
                                       class="w-full px-3 py-2 bg-white border border-fuchsia-200 rounded-xl text-xs font-mono text-fuchsia-900 truncate focus:outline-none">
                                <button type="button"
                                        @click="copyPreviewLink()"
                                        class="px-4 py-2 bg-fuchsia-600 hover:bg-fuchsia-500 text-white font-bold text-xs rounded-xl shadow-sm transition-colors shrink-0 flex items-center gap-1">
                                    <span x-text="copied ? 'Copied!' : 'Copy'">Copy</span>
                                </button>
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-2 pt-1">
                            <a :href="previewUrl"
                               target="_blank"
                               class="py-2.5 px-3 bg-fuchsia-600 hover:bg-fuchsia-500 text-white text-xs font-bold rounded-xl shadow-sm text-center flex items-center justify-center gap-1.5 transition-all">
                                Open Preview
                            </a>
                            <button type="button"
                                    @click="clearPreviewLink()"
                                    class="py-2.5 px-3 bg-rose-50 hover:bg-rose-100 text-rose-600 border border-rose-200/60 text-xs font-bold rounded-xl text-center transition-colors">
                                Clear
                            </button>
                        </div>

                        <button type="button"
                                @click="regeneratePreviewLink()"
                                class="w-full py-2.5 bg-fuchsia-100/60 hover:bg-fuchsia-100 text-fuchsia-800 text-xs font-bold rounded-xl border border-fuchsia-200 transition-colors flex items-center justify-center gap-1.5">
                            Regenerate Preview Link
                        </button>
                    </div>

                    <!-- Publish Date Switch & Picker -->
                    <div class="space-y-2 pt-1 border-t border-slate-100">
                        <div class="flex items-center justify-between">
                            <span class="text-sm font-bold text-[#1a1a2e]">Publish Date</span>
                            <label class="relative inline-flex items-center cursor-pointer gap-2">
                                <input type="checkbox" x-model="isCustomDate" class="sr-only peer">
                                <div class="w-11 h-6 bg-slate-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-slate-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-fuchsia-600"></div>
                                <span class="text-xs font-bold transition-colors" :class="isCustomDate ? 'text-fuchsia-600' : 'text-slate-400'">Custom</span>
                            </label>
                        </div>

                        <div x-show="isCustomDate" x-transition class="space-y-1">
                            <input type="datetime-local"
                                   name="published_at"
                                   x-model="publishedAt"
                                   class="w-full px-3.5 py-2.5 bg-white border border-slate-200 rounded-xl text-xs font-mono text-[#1a1a2e] focus:ring-2 focus:ring-fuchsia-500">
                            <p class="text-[11px] text-slate-400">Set a custom publish date and time</p>
                        </div>
                    </div>

                    <!-- Author Input -->
                    <div class="space-y-1.5 border-t border-slate-100 pt-2">
                        <label class="block text-xs font-bold text-slate-700">Author Name <span class="text-red-500">*</span></label>
                        <input type="text"
                               name="author"
                               value="{{ old('author', $post->author) }}"
                               required
                               class="w-full px-3.5 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs text-[#1a1a2e] focus:ring-2 focus:ring-fuchsia-500">
                    </div>

                    <!-- Action Buttons (Update / Cancel) -->
                    <div class="pt-2 grid grid-cols-2 gap-3">
                        <button type="submit"
                                class="py-3 bg-fuchsia-600 hover:bg-fuchsia-500 text-white text-sm font-bold rounded-xl shadow-md shadow-fuchsia-600/25 transition-all text-center">
                            Update
                        </button>
                        <a href="{{ route('admin.blogs.index') }}"
                           class="py-3 bg-slate-100 hover:bg-slate-200 text-slate-700 text-sm font-bold rounded-xl border border-slate-200 transition-colors text-center">
                            Cancel
                        </a>
                    </div>
                </div>

                <!-- FEATURED IMAGE SIDEBAR CARD -->
                <div class="bg-white border border-slate-200 rounded-2xl p-6 shadow-sm space-y-4">
                    <h4 class="font-serif font-bold text-base text-[#1a1a2e] border-b border-slate-100 pb-2 flex items-center gap-2">
                        <i class="ri-image-line text-fuchsia-600"></i> Featured Image
                    </h4>

                    <div class="space-y-3">
                        <div class="relative border-2 border-dashed border-slate-300 hover:border-fuchsia-500 rounded-xl p-4 text-center bg-slate-50 transition-colors cursor-pointer">
                            <input type="file"
                                   name="featured_image_file"
                                   accept="image/*"
                                   @change="handleFeaturedImageUpload($event)"
                                   class="absolute inset-0 w-full h-full opacity-0 cursor-pointer">
                            <i class="ri-upload-cloud-2-line text-xl text-fuchsia-600 block mb-1"></i>
                            <span class="text-xs font-semibold text-slate-700 block">Replace Image File</span>
                            <span class="text-[10px] text-slate-400 block">PNG, JPG up to 5MB</span>
                        </div>

                        <div class="space-y-1">
                            <label class="block text-[11px] font-semibold text-slate-600">Or Image URL</label>
                            <input type="text"
                                   name="featured_image"
                                   x-model="featuredImageUrl"
                                   placeholder="https://..."
                                   class="w-full px-3 py-1.5 bg-slate-50 border border-slate-200 rounded-xl text-xs font-mono text-slate-800">
                        </div>

                        <div class="space-y-1">
                            <label class="block text-[11px] font-semibold text-slate-600">Image Alt Text</label>
                            <input type="text"
                                   name="featured_image_alt"
                                   x-model="featuredImageAlt"
                                   placeholder="Accessibility & SEO alt text..."
                                   class="w-full px-3 py-1.5 bg-slate-50 border border-slate-200 rounded-xl text-xs text-[#1a1a2e]">
                        </div>

                        <!-- Image Preview Box -->
                        <template x-if="featuredImagePreview || featuredImageUrl">
                            <div class="p-2 bg-slate-50 border border-slate-200 rounded-xl flex items-center gap-2.5">
                                <img :src="featuredImagePreview || featuredImageUrl" class="w-14 h-10 object-cover rounded-lg border border-slate-200">
                                <span class="text-[11px] font-bold text-slate-700 truncate" x-text="featuredImageAlt || 'Image Set'"></span>
                            </div>
                        </template>
                    </div>
                </div>

                <!-- TAXONOMY CARD -->
                <div class="bg-white border border-slate-200 rounded-2xl p-6 shadow-sm space-y-4">
                    <h4 class="font-serif font-bold text-base text-[#1a1a2e] border-b border-slate-100 pb-2 flex items-center gap-2">
                        <i class="ri-price-tag-3-line text-fuchsia-600"></i> Category & Tags
                    </h4>

                    <div class="space-y-4">
                        <div class="space-y-1.5">
                            <label class="block text-xs font-bold text-slate-700">Category</label>
                            <select name="category" x-model="category" class="w-full px-3.5 py-2 bg-slate-50 border border-slate-200 rounded-xl text-xs font-semibold text-[#1a1a2e] focus:ring-2 focus:ring-fuchsia-500">
                                <option value="">Select Category...</option>
                                <option value="Tutorials">Tutorials</option>
                                <option value="Security">Security</option>
                                <option value="Integrations">Integrations</option>
                                <option value="Engineering">Engineering</option>
                                <option value="SDK Updates">SDK Updates</option>
                                <option value="Architecture">Architecture</option>
                            </select>
                        </div>

                        <div class="space-y-1.5">
                            <label class="block text-xs font-bold text-slate-700">Tags (Comma Separated)</label>
                            <input type="text"
                                   name="tags"
                                   x-model="tags"
                                   placeholder="laravel, wysiwyg, sdk"
                                   class="w-full px-3.5 py-2 bg-slate-50 border border-slate-200 rounded-xl text-xs text-[#1a1a2e] focus:ring-2 focus:ring-fuchsia-500">
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </form>
</div>

<!-- Alpine.js Reactive Form Controller -->
<script>
    function blogPostForm() {
        return {
            baseUrl: window.location.origin,
            title: @json(old('title', $post->title)),
            slug: @json(old('slug', $post->slug)),
            excerpt: @json(old('excerpt', $post->excerpt)),
            content: @json(old('content', $post->content)),
            category: @json(old('category', $post->category ?? '')),
            tags: @json(old('tags', $post->tags ?? '')),
            metaTitle: @json(old('meta_title', $post->meta_title ?? '')),
            metaDescription: @json(old('meta_description', $post->meta_description ?? '')),
            focusKeyword: @json(old('focus_keyword', $post->focus_keyword ?? '')),
            canonicalUrl: @json(old('canonical_url', $post->canonical_url ?? '')),
            robots: @json(old('robots', $post->robots ?? 'index, follow')),
            featuredImageUrl: @json(old('featured_image', $post->featured_image ?? '')),
            featuredImageAlt: @json(old('featured_image_alt', $post->featured_image_alt ?? '')),
            featuredImagePreview: null,
            ogTitle: @json(old('og_title', $post->og_title ?? '')),
            ogDescription: @json(old('og_description', $post->og_description ?? '')),
            ogImagePreview: null,
            faqs: @json(old('faqs', $post->faqs ?? [])),
            showFaqs: false,
            showSeo: false,
            showSocial: false,
            isPublished: @json(old('is_published', $post->is_published ?? true) == 1),
            isCustomDate: true,
            publishedAt: @json(old('published_at', optional($post->published_at)->format('Y-m-d\TH:i') ?? now()->format('Y-m-d\TH:i'))),
            copied: false,

            get formattedPublishDate() {
                if (!this.publishedAt) return 'Immediately';
                const d = new Date(this.publishedAt);
                if (isNaN(d.getTime())) return this.publishedAt;
                return d.toLocaleDateString('en-US', { month: 'short', day: 'numeric', year: 'numeric' });
            },

            get previewUrl() {
                const s = this.slug || @json($post->slug);
                return `${window.location.origin}/blog/${s}`;
            },

            copyPreviewLink() {
                navigator.clipboard.writeText(this.previewUrl);
                this.copied = true;
                setTimeout(() => { this.copied = false; }, 2000);
            },

            clearPreviewLink() {
                this.slug = '';
            },

            regeneratePreviewLink() {
                const randomHash = Math.random().toString(36).substring(2, 8);
                const baseSlug = (this.title || 'post').toLowerCase().trim().replace(/[^\w\s-]/g, '').replace(/[\s_-]+/g, '-');
                this.slug = baseSlug ? `${baseSlug}-${randomHash}` : `post-${randomHash}`;
            },

            addFaq() {
                this.faqs.push({ question: '', answer: '' });
            },

            removeFaq(index) {
                this.faqs.splice(index, 1);
            },

            handleFeaturedImageUpload(event) {
                const file = event.target.files[0];
                if (file) {
                    this.featuredImagePreview = URL.createObjectURL(file);
                }
            },

            handleOgImageUpload(event) {
                const file = event.target.files[0];
                if (file) {
                    this.ogImagePreview = URL.createObjectURL(file);
                }
            },

            get wordCount() {
                const cleanText = this.content.replace(/<[^>]*>?/gm, '').trim();
                return cleanText ? cleanText.split(/\s+/).length : 0;
            },

            get readTime() {
                return Math.max(1, Math.ceil(this.wordCount / 200));
            },

            get hasHeadings() {
                return /^#{1,4}\s/m.test(this.content) || /<h[1-4]/i.test(this.content);
            },

            get metaTitleLengthClass() {
                const len = this.metaTitle.length;
                if (len === 0) return 'text-slate-400';
                if (len >= 50 && len <= 60) return 'text-emerald-600';
                if (len < 50) return 'text-amber-600';
                return 'text-red-600';
            },

            get metaDescLengthClass() {
                const len = this.metaDescription.length;
                if (len === 0) return 'text-slate-400';
                if (len >= 150 && len <= 160) return 'text-emerald-600';
                if (len < 150) return 'text-amber-600';
                return 'text-red-600';
            },

            get effectiveOgTitle() {
                return this.ogTitle || this.metaTitle || this.title || 'Article Title Placeholder';
            },

            get effectiveOgDescription() {
                return this.ogDescription || this.metaDescription || this.excerpt || 'Article summary description will appear here for social shares.';
            },

            get effectiveOgImage() {
                return this.ogImagePreview || this.featuredImagePreview || this.featuredImageUrl || null;
            }
        };
    }
</script>
@endsection
