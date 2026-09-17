@extends('layouts.dashboard')

@section('title', 'Admin Console - RichForge Platform')
@section('header_title', 'Platform Admin Console')

@section('content')
<div class="space-y-8">
    <div class="p-8 rounded-3xl bg-gradient-to-r from-fuchsia-50/80 via-purple-50/50 to-indigo-50/80 border border-fuchsia-200/80 shadow-sm flex flex-col md:flex-row items-start md:items-center justify-between gap-4">
        <div>
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-fuchsia-100 text-fuchsia-700 text-xs font-semibold border border-fuchsia-200 mb-2">
                <i class="ri-shield-keyhole-line"></i> Platform Administration
            </div>
            <h2 class="text-2xl font-extrabold text-[#1a1a2e]">RichForge System Control Console</h2>
            <p class="text-xs text-slate-600 mt-1">Global platform overview, registered developer accounts, project statuses, and media storage metrics.</p>
        </div>
        <div class="flex gap-3">
            <a href="{{ route('admin.users') }}" class="px-4 py-2 bg-white hover:bg-slate-50 text-xs font-bold text-slate-700 rounded-xl border border-slate-200 shadow-sm flex items-center gap-2">
                <i class="ri-user-line text-slate-500"></i> Manage Users
            </a>
            <a href="{{ route('admin.projects') }}" class="px-4 py-2 bg-fuchsia-600 hover:bg-fuchsia-500 text-xs font-bold text-white rounded-xl shadow-md shadow-fuchsia-600/20 flex items-center gap-2">
                <i class="ri-folder-keyhole-line"></i> Manage Projects
            </a>
        </div>
    </div>

    <!-- System Stats Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-4 gap-6">
        <div class="p-6 rounded-2xl bg-white border border-slate-200 shadow-sm space-y-2">
            <div class="flex items-center justify-between text-slate-400 text-xs font-semibold uppercase">
                <span>Total Users</span>
                <i class="ri-user-3-line text-lg text-fuchsia-600"></i>
            </div>
            <span class="text-3xl font-extrabold text-[#1a1a2e] block">{{ number_format($usersCount) }}</span>
            <span class="text-[11px] text-fuchsia-700 font-semibold">Registered developer accounts</span>
        </div>

        <div class="p-6 rounded-2xl bg-white border border-slate-200 shadow-sm space-y-2">
            <div class="flex items-center justify-between text-slate-400 text-xs font-semibold uppercase">
                <span>Total Projects</span>
                <i class="ri-folder-3-line text-lg text-purple-600"></i>
            </div>
            <span class="text-3xl font-extrabold text-[#1a1a2e] block">{{ number_format($projectsCount) }}</span>
            <span class="text-[11px] text-slate-500">Active SDK integrations</span>
        </div>

        <div class="p-6 rounded-2xl bg-white border border-slate-200 shadow-sm space-y-2">
            <div class="flex items-center justify-between text-slate-400 text-xs font-semibold uppercase">
                <span>Media Uploads</span>
                <i class="ri-image-2-line text-lg text-pink-600"></i>
            </div>
            <span class="text-3xl font-extrabold text-[#1a1a2e] block">{{ number_format($uploadsCount) }}</span>
            <span class="text-[11px] text-slate-500">Stored images & files</span>
        </div>

        <div class="p-6 rounded-2xl bg-white border border-slate-200 shadow-sm space-y-2">
            <div class="flex items-center justify-between text-slate-400 text-xs font-semibold uppercase">
                <span>Storage Usage</span>
                <i class="ri-hard-drive-2-line text-lg text-amber-600"></i>
            </div>
            <span class="text-3xl font-extrabold text-[#1a1a2e] block">{{ number_format($totalStorageBytes / (1024 * 1024), 2) }} MB</span>
            <span class="text-[11px] text-slate-500">Server disk utilization</span>
        </div>
    </div>

    <!-- Recent Activity -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="bg-white border border-slate-200 rounded-2xl p-6 shadow-sm space-y-4">
            <h3 class="font-bold text-[#1a1a2e] text-base flex items-center gap-2">
                <i class="ri-user-add-line text-fuchsia-600"></i> Recently Registered Users
            </h3>
            <div class="divide-y divide-slate-100 text-xs text-slate-700">
                @foreach($recentUsers as $u)
                    <div class="py-3 flex items-center justify-between">
                        <div>
                            <span class="font-semibold text-[#1a1a2e] block">{{ $u->name }}</span>
                            <span class="text-slate-500">{{ $u->email }}</span>
                        </div>
                        <span class="text-slate-500 font-mono">{{ $u->created_at->format('M d, Y') }}</span>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="bg-white border border-slate-200 rounded-2xl p-6 shadow-sm space-y-4">
            <h3 class="font-bold text-[#1a1a2e] text-base flex items-center gap-2">
                <i class="ri-folder-add-line text-fuchsia-600"></i> Recently Created Projects
            </h3>
            <div class="divide-y divide-slate-100 text-xs text-slate-700">
                @foreach($recentProjects as $p)
                    <div class="py-3 flex items-center justify-between">
                        <div>
                            <span class="font-semibold text-[#1a1a2e] block">{{ $p->name }}</span>
                            <span class="text-slate-500">By {{ $p->user->name ?? 'User' }}</span>
                        </div>
                        <span class="px-2.5 py-0.5 rounded-full text-[10px] uppercase font-bold {{ $p->status === 'active' ? 'bg-emerald-50 text-emerald-700 border border-emerald-200' : 'bg-red-50 text-red-700 border border-red-200' }}">
                            {{ $p->status }}
                        </span>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection

