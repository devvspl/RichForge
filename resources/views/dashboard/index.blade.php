@extends('layouts.dashboard')

@section('title', 'Dashboard - RichForge')
@section('header_title', 'Developer Overview')

@section('content')
    <div class="space-y-8">
        <!-- Top Greeting Banner -->
        <div
            class="p-8 rounded-3xl bg-gradient-to-r from-fuchsia-50/80 via-purple-50/50 to-indigo-50/80 border border-fuchsia-200/80 shadow-sm flex flex-col md:flex-row items-start md:items-center justify-between gap-4">
            <div>
                <h2 class="text-2xl font-extrabold text-[#1a1a2e]">Welcome back, {{ Auth::user()->name }}!</h2>
                <p class="text-xs text-slate-600 mt-1">Manage your embeddable rich text editor projects, domains, and API
                    keys.</p>
            </div>
            <div class="flex items-center gap-3">
                <a href="{{ route('projects.create') }}"
                    class="px-5 py-2.5 bg-fuchsia-600 hover:bg-fuchsia-500 text-white font-bold text-xs rounded-xl transition-all shadow-md shadow-fuchsia-600/20 flex items-center gap-2">
                    <i class="ri-add-line text-sm"></i> New Project
                </a>
                <a href="{{ route('playground') }}"
                    class="px-5 py-2.5 bg-white hover:bg-slate-50 text-slate-700 font-semibold text-xs rounded-xl transition-all border border-slate-200 shadow-sm flex items-center gap-2">
                    <i class="ri-code-box-line text-fuchsia-600"></i> Open Playground
                </a>
            </div>
        </div>

        <!-- Analytics Dashboard Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <!-- Projects Card -->
            <div
                class="p-6 rounded-2xl bg-white border border-slate-200 shadow-sm relative overflow-hidden space-y-2">
                <div class="flex items-center justify-between text-slate-400 text-xs font-semibold uppercase">
                    <span>Total Projects</span>
                    <i class="ri-folder-keyhole-line text-lg text-fuchsia-600"></i>
                </div>
                <div class="text-3xl font-extrabold text-[#1a1a2e]">{{ number_format($projectsCount) }}</div>
                <p class="text-[11px] text-slate-500">Active developer integrations</p>
            </div>

            <!-- API Requests Card -->
            <div
                class="p-6 rounded-2xl bg-white border border-slate-200 shadow-sm relative overflow-hidden space-y-2">
                <div class="flex items-center justify-between text-slate-400 text-xs font-semibold uppercase">
                    <span>API Requests</span>
                    <i class="ri-flashlight-line text-lg text-emerald-600"></i>
                </div>
                <div class="text-3xl font-extrabold text-[#1a1a2e]">{{ number_format($totalApiRequests) }}</div>
                <p class="text-[11px] text-emerald-600 font-semibold">100% operational status</p>
            </div>
        </div>

        <!-- Recent Projects Section -->
        <div class="bg-white border border-slate-200 rounded-2xl p-6 shadow-sm space-y-4">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="font-bold text-base text-[#1a1a2e]">Recent Projects</h3>
                    <p class="text-xs text-slate-500">Select a project to configure domains, API keys, and toolbar settings.
                    </p>
                </div>
                <a href="{{ route('projects.index') }}"
                    class="text-xs font-semibold text-fuchsia-600 hover:text-fuchsia-700 flex items-center gap-1">
                    <span>View All Projects</span>
                    <i class="ri-arrow-right-line"></i>
                </a>
            </div>

            @if($recentProjects->isEmpty())
                <div class="p-8 text-center border border-dashed border-slate-200 rounded-xl bg-slate-50/50">
                    <p class="text-slate-500 text-sm mb-4">You haven't created any projects yet.</p>
                    <a href="{{ route('projects.create') }}"
                        class="px-5 py-2.5 bg-fuchsia-600 hover:bg-fuchsia-500 text-white font-bold text-xs rounded-xl shadow-md shadow-fuchsia-600/20">
                        Create Your First Project
                    </a>
                </div>
            @else
                <div class="overflow-x-auto">
                    <table class="w-full text-left text-sm">
                        <thead>
                            <tr class="border-b border-slate-200 text-slate-400 text-xs uppercase tracking-wider font-semibold">
                                <th class="py-3 px-4">Project Name</th>
                                <th class="py-3 px-4">Public Key</th>
                                <th class="py-3 px-4">Status</th>
                                <th class="py-3 px-4">Created</th>
                                <th class="py-3 px-4 text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100 text-slate-700">
                            @foreach($recentProjects as $project)
                                <tr class="hover:bg-slate-50/80 transition-colors">
                                    <td class="py-4 px-4 font-medium text-[#1a1a2e]">
                                        <a href="{{ route('projects.show', $project->id) }}"
                                            class="hover:text-fuchsia-600 transition-colors font-semibold">
                                            {{ $project->name }}
                                        </a>
                                    </td>
                                    <td class="py-4 px-4 font-mono text-xs">
                                        <span
                                            class="bg-slate-100 px-2.5 py-1 rounded border border-slate-200 text-slate-700 select-all font-mono">
                                            {{ $project->project_key }}
                                        </span>
                                    </td>
                                    <td class="py-4 px-4">
                                        <span
                                            class="px-2.5 py-1 text-[11px] font-semibold rounded-full bg-emerald-50 text-emerald-700 border border-emerald-200">
                                            Active
                                        </span>
                                    </td>
                                    <td class="py-4 px-4 text-xs text-slate-500 font-mono">
                                        {{ $project->created_at->format('M d, Y') }}
                                    </td>
                                    <td class="py-4 px-4 text-right">
                                        <a href="{{ route('projects.show', $project->id) }}"
                                            class="px-3 py-1.5 bg-fuchsia-50 hover:bg-fuchsia-100 text-xs font-semibold text-fuchsia-700 rounded-xl border border-fuchsia-200 inline-flex items-center gap-1 transition-colors">
                                            <span>Configure</span>
                                            <i class="ri-arrow-right-line"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
@endsection