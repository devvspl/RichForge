@extends('layouts.dashboard')

@section('title', 'Create Project - RichForge')
@section('header_title', 'Create New Project')

@section('content')
<div class="max-w-2xl mx-auto space-y-6">
    <div class="bg-white border border-slate-200 rounded-2xl p-8 shadow-sm">
        <h2 class="text-xl font-bold text-[#1a1a2e] mb-1">Project Information</h2>
        <p class="text-xs text-slate-500 mb-6">Create a new project workspace to obtain a public key and configure domain restrictions.</p>

        <form action="{{ route('projects.store') }}" method="POST" class="space-y-5">
            @csrf
            <div>
                <label class="block text-xs font-semibold text-slate-700 mb-1">Project Name *</label>
                <input type="text" name="name" value="{{ old('name') }}" required class="w-full px-4 py-2.5 bg-[#f8fafc] border border-[#e2e8f0] rounded-xl text-[#1a1a2e] text-sm focus:outline-none focus:border-fuchsia-500 placeholder:text-slate-400" placeholder="e.g. My SaaS Blog / Customer Support Portal">
            </div>

            <div>
                <label class="block text-xs font-semibold text-slate-700 mb-1">Description (Optional)</label>
                <textarea name="description" rows="3" class="w-full px-4 py-2.5 bg-[#f8fafc] border border-[#e2e8f0] rounded-xl text-[#1a1a2e] text-sm focus:outline-none focus:border-fuchsia-500 placeholder:text-slate-400" placeholder="Brief details about where this editor will be used..."></textarea>
            </div>

            <div class="flex items-center justify-end gap-3 pt-4 border-t border-slate-200">
                <a href="{{ route('projects.index') }}" class="px-4 py-2 bg-slate-100 text-slate-700 hover:bg-slate-200 font-semibold text-xs rounded-xl border border-slate-200">Cancel</a>
                <button type="submit" class="px-6 py-2.5 bg-fuchsia-600 hover:bg-fuchsia-500 text-white font-bold text-xs rounded-xl shadow-md shadow-fuchsia-600/20">
                    Create Project & Get Public Key →
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

