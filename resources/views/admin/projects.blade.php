@extends('layouts.dashboard')

@section('title', 'Projects Management - Admin Console')
@section('header_title', 'Admin - All Projects')

@section('content')
<div class="bg-white border border-slate-200 rounded-2xl p-6 shadow-sm space-y-4">
    <div class="flex items-center justify-between border-b border-slate-200 pb-4">
        <h2 class="font-extrabold text-lg text-[#1a1a2e] flex items-center gap-2">
            <i class="ri-folder-keyhole-line text-fuchsia-600"></i> All Platform Projects
        </h2>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-left text-sm">
            <thead>
                <tr class="border-b border-slate-200 text-slate-400 text-xs uppercase tracking-wider font-semibold">
                    <th class="py-3 px-4">Project Name</th>
                    <th class="py-3 px-4">Owner</th>
                    <th class="py-3 px-4">Public Key</th>
                    <th class="py-3 px-4">Status</th>
                    <th class="py-3 px-4 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100 text-slate-700">
                @foreach($projects as $p)
                    <tr class="hover:bg-slate-50/80 transition-colors">
                        <td class="py-3.5 px-4 font-semibold text-[#1a1a2e]">{{ $p->name }}</td>
                        <td class="py-3.5 px-4 text-xs text-slate-500">{{ $p->user->name ?? 'User' }}</td>
                        <td class="py-3.5 px-4 font-mono text-xs">
                            <span class="bg-slate-100 px-2.5 py-1 rounded border border-slate-200 text-slate-700 select-all font-mono">
                                {{ $p->project_key }}
                            </span>
                        </td>
                        <td class="py-3.5 px-4">
                            <span class="px-2.5 py-0.5 text-[11px] font-semibold rounded-full {{ $p->status === 'active' ? 'bg-emerald-50 text-emerald-700 border border-emerald-200' : 'bg-red-50 text-red-700 border border-red-200' }}">
                                {{ ucfirst($p->status) }}
                            </span>
                        </td>
                        <td class="py-3.5 px-4 text-right">
                            <form action="{{ route('admin.projects.status', $p->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="px-3 py-1 bg-slate-100 hover:bg-slate-200 text-xs font-semibold text-slate-700 rounded-xl border border-slate-200 transition-colors">
                                    {{ $p->status === 'active' ? 'Suspend Project' : 'Activate Project' }}
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $projects->links() }}
    </div>
</div>
@endsection

