<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ProjectApiKey;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ApiKeyController extends Controller
{
    public function store(Request $request, int $projectId)
    {
        $project = Auth::user()->projects()->findOrFail($projectId);

        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|in:public,secret',
        ]);

        $type = $request->input('type');
        $prefix = $type === 'public' ? 'rf_pub_' : 'rf_sec_';
        $plainKey = $prefix . Str::random(32);

        $apiKey = $project->apiKeys()->create([
            'name' => $request->input('name'),
            'type' => $type,
            'prefix' => $prefix,
            'key_hash' => hash('sha256', $plainKey),
            'display_key' => substr($plainKey, 0, 10) . '...' . substr($plainKey, -4),
        ]);

        return back()->with('new_api_key', [
            'name' => $apiKey->name,
            'type' => $type,
            'plain_key' => $plainKey,
        ])->with('success', 'API Key created! Copy it now as secret keys are never shown again.');
    }

    public function destroy(int $projectId, int $keyId)
    {
        $project = Auth::user()->projects()->findOrFail($projectId);
        $key = $project->apiKeys()->findOrFail($keyId);
        $key->delete();

        return back()->with('success', 'API key revoked successfully.');
    }
}
