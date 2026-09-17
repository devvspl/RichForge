@extends('layouts.dashboard')

@section('title', 'Users Management - Admin Console')
@section('header_title', 'Admin - User Accounts')

@section('content')
<div class="bg-white border border-slate-200 rounded-2xl p-6 shadow-sm space-y-4">
    <div class="flex items-center justify-between border-b border-slate-200 pb-4">
        <h2 class="font-extrabold text-lg text-[#1a1a2e] flex items-center gap-2">
            <i class="ri-user-settings-line text-fuchsia-600"></i> Registered Developer Accounts
        </h2>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-left text-sm">
            <thead>
                <tr class="border-b border-slate-200 text-slate-400 text-xs uppercase tracking-wider font-semibold">
                    <th class="py-3 px-4">User</th>
                    <th class="py-3 px-4">Email</th>
                    <th class="py-3 px-4">Projects</th>
                    <th class="py-3 px-4">Role</th>
                    <th class="py-3 px-4">Joined</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100 text-slate-700">
                @foreach($users as $user)
                    <tr class="hover:bg-slate-50/80 transition-colors">
                        <td class="py-3.5 px-4 font-semibold text-[#1a1a2e]">{{ $user->name }}</td>
                        <td class="py-3.5 px-4 text-xs font-mono text-slate-500">{{ $user->email }}</td>
                        <td class="py-3.5 px-4 text-xs font-bold text-fuchsia-600">{{ $user->projects_count }}</td>
                        <td class="py-3.5 px-4">
                            @if($user->is_admin)
                                <span class="px-2.5 py-0.5 text-[10px] font-bold bg-fuchsia-100 text-fuchsia-700 rounded-full border border-fuchsia-200">Admin</span>
                            @else
                                <span class="px-2.5 py-0.5 text-[10px] font-bold bg-slate-100 text-slate-600 border border-slate-200 rounded-full">Developer</span>
                            @endif
                        </td>
                        <td class="py-3.5 px-4 text-xs font-mono text-slate-500">{{ $user->created_at->format('M d, Y') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $users->links() }}
    </div>
</div>
@endsection

