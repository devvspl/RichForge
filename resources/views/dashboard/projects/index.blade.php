@extends('layouts.dashboard')

@section('title', 'Projects - RichForge Developer Platform')
@section('header_title', 'Projects Management')

@section('content')
<div class="space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-xl font-bold text-[#1a1a2e]">Your Developer Projects</h2>
            <p class="text-xs text-slate-500">Each project maintains its own public project key, domain whitelists, and editor configurations.</p>
        </div>
        <a href="{{ route('projects.create') }}" class="px-4 py-2 bg-fuchsia-600 hover:bg-fuchsia-500 text-white font-semibold text-sm rounded-xl transition-all shadow-md shadow-fuchsia-600/20">
            + Create Project
        </a>
    </div>

    @if($projects->isEmpty())
        <div class="bg-white border border-slate-200 rounded-2xl p-12 text-center shadow-sm">
            <p class="text-slate-500 text-sm mb-4">No projects created yet.</p>
            <a href="{{ route('projects.create') }}" class="px-5 py-2.5 bg-fuchsia-600 text-white font-semibold text-xs rounded-xl">Create Project</a>
        </div>
    @else
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @foreach($projects as $p)
                <div class="bg-white border border-slate-200 rounded-2xl p-6 shadow-sm hover:border-slate-300 transition-all flex flex-col justify-between space-y-4">
                    <div class="space-y-2">
                        <div class="flex items-center justify-between">
                            <h3 class="font-bold text-lg text-[#1a1a2e]">
                                <a href="{{ route('projects.show', $p->id) }}" class="hover:text-fuchsia-600 transition-colors">
                                    {{ $p->name }}
                                </a>
                            </h3>
                            <span class="px-2.5 py-0.5 text-[11px] font-semibold rounded-full bg-emerald-50 text-emerald-700 border border-emerald-200">
                                Active
                            </span>
                        </div>
                        <p class="text-xs text-slate-500 leading-relaxed">{{ $p->description ?? 'No description provided.' }}</p>
                    </div>

                    <div class="space-y-3 pt-4 border-t border-slate-100">
                        <div>
                            <span class="text-[10px] uppercase font-bold text-slate-400 tracking-wider block mb-1">Public Key</span>
                            <div class="flex items-center justify-between bg-slate-100 px-3 py-1.5 rounded-lg border border-slate-200 text-xs font-mono text-slate-700">
                                <span class="truncate select-all font-mono">{{ $p->project_key }}</span>
                                <button onclick="navigator.clipboard.writeText('{{ $p->project_key }}'); alert('Project Key copied!');" class="text-slate-500 hover:text-slate-900 text-[11px] ml-2 font-semibold">Copy</button>
                            </div>
                        </div>

                        <div class="flex items-center justify-between text-xs text-slate-500 pt-2">
                            <span>Domains: <strong class="text-slate-700">{{ $p->domains->count() }}</strong></span>
                            <span>API Keys: <strong class="text-slate-700">{{ $p->apiKeys->count() }}</strong></span>
                            <a href="{{ route('projects.show', $p->id) }}" class="text-fuchsia-600 font-semibold hover:underline">
                                Manage Project →
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection

