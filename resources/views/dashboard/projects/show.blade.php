@extends('layouts.dashboard')

@section('title', $project->name . ' - RichForge Project')
@section('header_title', $project->name)

@section('content')
<div class="space-y-8" x-data="{ activeTab: 'config' }">
    <!-- Project Header Banner -->
    <div class="bg-white border border-slate-200 rounded-2xl p-6 shadow-sm flex flex-col md:flex-row items-start md:items-center justify-between gap-4">
        <div>
            <div class="flex items-center gap-3 mb-1">
                <h2 class="text-2xl font-extrabold text-[#1a1a2e]">{{ $project->name }}</h2>
                <span class="px-2.5 py-0.5 text-xs font-semibold rounded-full bg-emerald-50 text-emerald-700 border border-emerald-200">Active</span>
            </div>
            <p class="text-xs text-slate-500">{{ $project->description ?? 'No project description.' }}</p>
        </div>

        <div class="bg-slate-50 p-3 rounded-xl border border-slate-200 flex items-center gap-3">
            <div>
                <span class="text-[10px] uppercase tracking-wider font-bold text-slate-400 block">Public Project Key</span>
                <code class="font-mono text-xs text-fuchsia-700 font-semibold select-all">{{ $project->project_key }}</code>
            </div>
            <button onclick="navigator.clipboard.writeText('{{ $project->project_key }}'); alert('Public Key copied!');" class="px-3 py-1.5 bg-fuchsia-600 hover:bg-fuchsia-500 text-white font-bold text-xs rounded-lg flex items-center gap-1 shadow-sm">
                <i class="ri-file-copy-line"></i> Copy
            </button>
        </div>
    </div>

    <!-- Alert for Newly Created Secret API Key -->
    @if(session('new_api_key'))
        <div class="p-6 rounded-2xl bg-amber-50 border border-amber-200 text-amber-900 space-y-2 shadow-sm">
            <h4 class="font-bold text-sm text-amber-900 flex items-center gap-2">
                <i class="ri-error-warning-fill text-lg text-amber-600"></i> Secret API Key Generated! Copy it now:
            </h4>
            <p class="text-xs text-amber-700">Secret keys are <strong>never shown again</strong> after this screen.</p>
            <div class="flex items-center gap-3 bg-white p-3 rounded-xl border border-amber-200">
                <code class="font-mono text-sm text-amber-900 select-all flex-grow font-bold">{{ session('new_api_key')['plain_key'] }}</code>
                <button onclick="navigator.clipboard.writeText('{{ session('new_api_key')['plain_key'] }}'); alert('Secret key copied!');" class="px-4 py-1.5 bg-amber-600 hover:bg-amber-500 text-white text-xs font-bold rounded-lg flex items-center gap-1 shadow-sm">
                    <i class="ri-file-copy-line"></i> Copy Secret Key
                </button>
            </div>
        </div>
    @endif

    <!-- Navigation Tabs -->
    <div class="border-b border-slate-200 flex gap-6 text-sm font-medium">
        <button @click="activeTab = 'config'" :class="activeTab === 'config' ? 'border-b-2 border-fuchsia-600 text-fuchsia-700 font-bold' : 'text-slate-500 hover:text-slate-900'" class="pb-3 transition-colors flex items-center gap-2">
            <i class="ri-settings-4-line"></i> Editor Settings & Theme
        </button>
        <button @click="activeTab = 'keys'" :class="activeTab === 'keys' ? 'border-b-2 border-fuchsia-600 text-fuchsia-700 font-bold' : 'text-slate-500 hover:text-slate-900'" class="pb-3 transition-colors flex items-center gap-2">
            <i class="ri-key-2-line"></i> API Keys <span class="bg-slate-100 text-slate-700 border border-slate-200 text-xs px-2 py-0.5 rounded-full">{{ $project->apiKeys->count() }}</span>
        </button>
        <button @click="activeTab = 'domains'" :class="activeTab === 'domains' ? 'border-b-2 border-fuchsia-600 text-fuchsia-700 font-bold' : 'text-slate-500 hover:text-slate-900'" class="pb-3 transition-colors flex items-center gap-2">
            <i class="ri-global-line"></i> Allowed Domains <span class="bg-slate-100 text-slate-700 border border-slate-200 text-xs px-2 py-0.5 rounded-full">{{ $project->domains->count() }}</span>
        </button>
    </div>

    <!-- Tab 1: Editor Configuration -->
    <div x-show="activeTab === 'config'" class="bg-white border border-slate-200 rounded-2xl p-6 shadow-sm space-y-6">
        <h3 class="font-bold text-lg text-[#1a1a2e]">Configure Editor Defaults</h3>
        <p class="text-xs text-slate-500">Default options used by your embeddable editor instance.</p>

        <form action="{{ route('projects.updateConfig', $project->id) }}" method="POST" class="space-y-6">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-xs font-semibold text-slate-700 mb-1">Editor Height (Pixels)</label>
                    <input type="number" name="height" value="{{ old('height', $project->configuration->height ?? 350) }}" required class="w-full px-4 py-2.5 bg-[#f8fafc] border border-[#e2e8f0] rounded-xl text-[#1a1a2e] text-sm focus:outline-none focus:border-fuchsia-500">
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-700 mb-1">Predefined Theme</label>
                    <select name="theme" class="w-full px-4 py-2.5 bg-[#f8fafc] border border-[#e2e8f0] rounded-xl text-[#1a1a2e] text-sm focus:outline-none focus:border-fuchsia-500">
                        <option value="default" {{ ($project->configuration->theme ?? '') === 'default' ? 'selected' : '' }}>Default Theme</option>
                        <option value="minimal" {{ ($project->configuration->theme ?? '') === 'minimal' ? 'selected' : '' }}>Minimal Theme</option>
                        <option value="dark" {{ ($project->configuration->theme ?? '') === 'dark' ? 'selected' : '' }}>Dark Slate Theme</option>
                    </select>
                </div>

                <div class="md:col-span-2">
                    <label class="block text-xs font-semibold text-slate-700 mb-1">Placeholder Text</label>
                    <input type="text" name="placeholder" value="{{ old('placeholder', $project->configuration->placeholder ?? 'Start typing...') }}" class="w-full px-4 py-2.5 bg-[#f8fafc] border border-[#e2e8f0] rounded-xl text-[#1a1a2e] text-sm focus:outline-none focus:border-fuchsia-500">
                </div>
            </div>

            <div class="flex items-center gap-6 pt-4 border-t border-slate-200">
                <label class="flex items-center gap-2 cursor-pointer text-sm text-slate-700 font-medium">
                    <input type="checkbox" name="dark_mode" value="1" {{ ($project->configuration->dark_mode ?? false) ? 'checked' : '' }} class="rounded border-slate-300 text-fuchsia-600 focus:ring-0">
                    Force Dark Mode UI
                </label>
            </div>

            <div class="flex justify-end pt-4">
                <button type="submit" class="px-6 py-2.5 bg-fuchsia-600 hover:bg-fuchsia-500 text-white font-bold text-xs rounded-xl shadow-md shadow-fuchsia-600/20">
                    Save Editor Configurations
                </button>
            </div>
        </form>
    </div>

    <!-- Tab 2: API Key Management -->
    <div x-show="activeTab === 'keys'" class="bg-white border border-slate-200 rounded-2xl p-6 shadow-sm space-y-6">
        <div class="flex items-center justify-between">
            <div>
                <h3 class="font-bold text-lg text-[#1a1a2e]">API Keys</h3>
                <p class="text-xs text-slate-500">Public keys (`rf_pub_...`) are for browser SDKs. Secret keys (`rf_sec_...`) are for server-side REST APIs only.</p>
            </div>
            
            <form action="{{ route('keys.store', $project->id) }}" method="POST" class="flex items-center gap-2">
                @csrf
                <input type="text" name="name" placeholder="Key name e.g. Production Server" required class="px-3 py-1.5 bg-[#f8fafc] border border-[#e2e8f0] rounded-lg text-xs text-[#1a1a2e]">
                <select name="type" class="px-3 py-1.5 bg-[#f8fafc] border border-[#e2e8f0] rounded-lg text-xs text-[#1a1a2e]">
                    <option value="secret">Secret Key (rf_sec_)</option>
                    <option value="public">Public Key (rf_pub_)</option>
                </select>
                <button type="submit" class="px-4 py-1.5 bg-fuchsia-600 text-white font-bold text-xs rounded-lg hover:bg-fuchsia-500 shadow-sm">
                    + Generate Key
                </button>
            </form>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm">
                <thead>
                    <tr class="border-b border-slate-200 text-slate-400 text-xs uppercase tracking-wider font-semibold">
                        <th class="py-3 px-4">Name</th>
                        <th class="py-3 px-4">Type</th>
                        <th class="py-3 px-4">Key Prefix / Display</th>
                        <th class="py-3 px-4">Created</th>
                        <th class="py-3 px-4 text-right">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-slate-700">
                    @foreach($project->apiKeys as $key)
                        <tr class="hover:bg-slate-50/80 transition-colors">
                            <td class="py-3.5 px-4 font-semibold text-[#1a1a2e]">{{ $key->name }}</td>
                            <td class="py-3.5 px-4">
                                <span class="px-2.5 py-0.5 text-[10px] font-bold uppercase rounded-full font-mono {{ $key->type === 'public' ? 'bg-fuchsia-100 text-fuchsia-700 border border-fuchsia-200' : 'bg-purple-100 text-purple-700 border border-purple-200' }}">
                                    {{ $key->type }}
                                </span>
                            </td>
                            <td class="py-3.5 px-4 font-mono text-xs text-slate-600 select-all">{{ $key->display_key }}</td>
                            <td class="py-3.5 px-4 text-xs font-mono text-slate-500">{{ $key->created_at->format('M d, Y') }}</td>
                            <td class="py-3.5 px-4 text-right">
                                <form action="{{ route('keys.destroy', [$project->id, $key->id]) }}" method="POST" onsubmit="return confirm('Revoke this API key? Applications using it will lose access immediately.');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-700 text-xs font-semibold flex items-center justify-end gap-1 ml-auto">
                                        <i class="ri-delete-bin-line"></i> Revoke Key
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Tab 3: Domain Restrictions -->
    <div x-show="activeTab === 'domains'" class="bg-white border border-slate-200 rounded-2xl p-6 shadow-sm space-y-6">
        <div class="flex items-center justify-between">
            <div>
                <h3 class="font-bold text-lg text-[#1a1a2e]">Whitelisted Domains</h3>
                <p class="text-xs text-slate-500">Only requests originating from these domains will be authorized. Supports wildcards e.g. `*.example.com` or `localhost`.</p>
            </div>

            <form action="{{ route('domains.store', $project->id) }}" method="POST" class="flex items-center gap-2">
                @csrf
                <input type="text" name="domain" placeholder="e.g. app.mycompany.com or *.mycompany.com" required class="w-64 px-3 py-1.5 bg-[#f8fafc] border border-[#e2e8f0] rounded-lg text-xs text-[#1a1a2e]">
                <button type="submit" class="px-4 py-1.5 bg-fuchsia-600 text-white font-bold text-xs rounded-lg hover:bg-fuchsia-500 shadow-sm">
                    + Add Domain
                </button>
            </form>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm">
                <thead>
                    <tr class="border-b border-slate-200 text-slate-400 text-xs uppercase tracking-wider font-semibold">
                        <th class="py-3 px-4">Domain</th>
                        <th class="py-3 px-4">Status</th>
                        <th class="py-3 px-4">Added On</th>
                        <th class="py-3 px-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-slate-700">
                    @foreach($project->domains as $d)
                        <tr class="hover:bg-slate-50/80 transition-colors">
                            <td class="py-3.5 px-4 font-mono text-sm text-fuchsia-700 font-semibold">{{ $d->domain }}</td>
                            <td class="py-3.5 px-4">
                                @if($d->is_active)
                                    <span class="px-2.5 py-0.5 text-[10px] font-semibold bg-emerald-50 text-emerald-700 rounded-full border border-emerald-200">Active</span>
                                @else
                                    <span class="px-2.5 py-0.5 text-[10px] font-semibold bg-slate-100 text-slate-600 border border-slate-200 rounded-full">Disabled</span>
                                @endif
                            </td>
                            <td class="py-3.5 px-4 text-xs font-mono text-slate-500">{{ $d->created_at->format('M d, Y') }}</td>
                            <td class="py-3.5 px-4 text-right flex items-center justify-end gap-3">
                                <form action="{{ route('domains.toggle', [$project->id, $d->id]) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="text-xs text-slate-600 hover:text-slate-900 font-medium">
                                        {{ $d->is_active ? 'Disable' : 'Enable' }}
                                    </button>
                                </form>
                                <form action="{{ route('domains.destroy', [$project->id, $d->id]) }}" method="POST" onsubmit="return confirm('Remove domain?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-700 text-xs font-semibold">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

