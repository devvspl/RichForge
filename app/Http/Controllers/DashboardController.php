<?php

namespace App\Http\Controllers;

use App\Models\Media;
use App\Models\Project;
use App\Models\UsageRecord;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $projectsCount = $user->projects()->count();
        $projectIds = $user->projects()->pluck('id');

        $uploadsCount = Media::whereIn('project_id', $projectIds)->count();
        $totalStorageBytes = Media::whereIn('project_id', $projectIds)->sum('size');
        $totalApiRequests = UsageRecord::whereIn('project_id', $projectIds)->sum('api_requests');

        $recentProjects = $user->projects()->with('domains')->latest()->take(5)->get();

        return view('dashboard.index', compact(
            'projectsCount',
            'uploadsCount',
            'totalStorageBytes',
            'totalApiRequests',
            'recentProjects'
        ));
    }

    public function onboarding(Request $request)
    {
        $project = Auth::user()->projects()->findOrFail($request->input('project'));

        return view('dashboard.onboarding', compact('project'));
    }
}
