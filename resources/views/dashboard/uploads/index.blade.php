@extends('layouts.dashboard')

@section('title', 'Media & File Uploads - RichForge')
@section('header_title', 'Media Management')

@section('content')
<div class="space-y-6">
    <!-- Top Filter & Search Bar -->
    <div class="bg-white border border-slate-200 rounded-2xl p-6 shadow-sm space-y-4">
        <form method="GET" action="{{ route('uploads.index') }}" class="grid grid-cols-1 sm:grid-cols-4 gap-4">
            <div>
                <label class="block text-xs font-semibold text-slate-700 mb-1">Search File Name</label>
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search files..." class="w-full px-3 py-2 bg-[#f8fafc] border border-[#e2e8f0] rounded-xl text-xs text-[#1a1a2e] focus:border-fuchsia-500 placeholder:text-slate-400 font-medium">
            </div>

            <div>
                <label class="block text-xs font-semibold text-slate-700 mb-1">Filter by Project</label>
                <select name="project_id" class="w-full px-3 py-2 bg-[#f8fafc] border border-[#e2e8f0] rounded-xl text-xs text-[#1a1a2e] focus:border-fuchsia-500 font-medium">
                    <option value="">All Projects</option>
                    @foreach($userProjects as $p)
                        <option value="{{ $p->id }}" {{ request('project_id') == $p->id ? 'selected' : '' }}>{{ $p->name }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-xs font-semibold text-slate-700 mb-1">Media Type</label>
                <select name="type" class="w-full px-3 py-2 bg-[#f8fafc] border border-[#e2e8f0] rounded-xl text-xs text-[#1a1a2e] focus:border-fuchsia-500 font-medium">
                    <option value="">All Types</option>
                    <option value="image" {{ request('type') == 'image' ? 'selected' : '' }}>Images (PNG, JPG, WEBP)</option>
                    <option value="document" {{ request('type') == 'document' ? 'selected' : '' }}>Documents (PDF, DOCX, ZIP)</option>
                </select>
            </div>

            <div class="flex items-end gap-2">
                <button type="submit" class="w-full py-2 bg-fuchsia-600 hover:bg-fuchsia-500 text-white font-bold text-xs rounded-xl transition-colors flex items-center justify-center gap-1 shadow-sm">
                    <i class="ri-search-line"></i> Filter Files
                </button>
                <a href="{{ route('uploads.index') }}" class="py-2 px-3 bg-slate-100 hover:bg-slate-200 text-slate-700 text-xs font-semibold rounded-xl border border-slate-200 transition-colors">Clear</a>
            </div>
        </form>
    </div>

    <!-- Media Grid Gallery -->
    @if($mediaList->isEmpty())
        <div class="bg-white border border-slate-200 rounded-2xl p-12 text-center text-slate-500 space-y-3 shadow-sm">
            <i class="ri-image-line text-4xl text-fuchsia-600 block"></i>
            <p class="text-sm font-semibold text-[#1a1a2e]">No media files found.</p>
            <p class="text-xs text-slate-500 max-w-md mx-auto">Upload files through the RichForge editor inside your application to manage them here.</p>
        </div>
    @else
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach($mediaList as $media)
                <div class="bg-white border border-slate-200 rounded-2xl overflow-hidden shadow-sm flex flex-col justify-between group hover:border-slate-300 transition-all">
                    <!-- Preview Box -->
                    <div class="h-40 bg-slate-50 border-b border-slate-100 flex items-center justify-center relative overflow-hidden">
                        @if(str_starts_with($media->mime_type, 'image/'))
                            <img src="{{ $media->public_url }}" alt="{{ $media->original_name }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                        @else
                            <div class="text-center p-4">
                                <i class="ri-file-text-line text-4xl text-fuchsia-600 block mb-1"></i>
                                <span class="text-[11px] font-mono text-slate-500 uppercase tracking-wider font-semibold">{{ pathinfo($media->original_name, PATHINFO_EXTENSION) }}</span>
                            </div>
                        @endif
                    </div>

                    <!-- Details Box -->
                    <div class="p-4 space-y-3 flex-grow flex flex-col justify-between">
                        <div>
                            <h4 class="font-semibold text-xs text-[#1a1a2e] truncate" title="{{ $media->original_name }}">
                                {{ $media->original_name }}
                            </h4>
                            <div class="flex items-center justify-between text-[11px] text-slate-500 mt-1 font-mono">
                                <span>{{ number_format($media->size / 1024, 1) }} KB</span>
                                <span>{{ $media->created_at->format('M d, Y') }}</span>
                            </div>
                        </div>

                        <div class="pt-3 border-t border-slate-100 flex items-center justify-between">
                            <button onclick="navigator.clipboard.writeText('{{ $media->public_url }}'); alert('Public URL copied to clipboard!');" class="px-2.5 py-1 bg-fuchsia-50 text-fuchsia-700 border border-fuchsia-200 text-[11px] font-semibold rounded-lg hover:bg-fuchsia-100 transition-colors flex items-center gap-1">
                                <i class="ri-file-copy-line"></i> Copy URL
                            </button>

                            <form action="{{ route('uploads.destroy', $media->id) }}" method="POST" onsubmit="return confirm('Delete this media file permanently?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-700 text-xs font-semibold flex items-center gap-1">
                                    <i class="ri-delete-bin-line"></i> Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-6">
            {{ $mediaList->links() }}
        </div>
    @endif
</div>
@endsection

