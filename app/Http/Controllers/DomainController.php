<?php

namespace App\Http\Controllers;

use App\Models\ProjectDomain;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DomainController extends Controller
{
    public function store(Request $request, int $projectId)
    {
        $project = Auth::user()->projects()->findOrFail($projectId);

        $request->validate([
            'domain' => 'required|string|max:255',
        ]);

        $domainStr = strtolower(trim($request->input('domain')));
        // Remove http:// or https:// if user pasted a full URL
        $domainStr = preg_replace('/^https?:\/\//i', '', $domainStr);
        $domainStr = explode('/', $domainStr)[0];

        $project->domains()->create([
            'domain' => $domainStr,
            'is_active' => true,
        ]);

        return back()->with('success', "Domain '{$domainStr}' added to whitelisted domains.");
    }

    public function toggle(int $projectId, int $domainId)
    {
        $project = Auth::user()->projects()->findOrFail($projectId);
        $domain = $project->domains()->findOrFail($domainId);

        $domain->update(['is_active' => !$domain->is_active]);

        return back()->with('success', 'Domain status updated.');
    }

    public function destroy(int $projectId, int $domainId)
    {
        $project = Auth::user()->projects()->findOrFail($projectId);
        $domain = $project->domains()->findOrFail($domainId);
        $domain->delete();

        return back()->with('success', 'Domain removed.');
    }
}
