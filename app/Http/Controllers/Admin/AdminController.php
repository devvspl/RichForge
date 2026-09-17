<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use App\Models\Media;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $usersCount = User::count();
        $projectsCount = Project::count();
        $uploadsCount = Media::count();
        $blogsCount = BlogPost::count();
        $totalStorageBytes = Media::sum('size');

        $recentUsers = User::latest()->take(5)->get();
        $recentProjects = Project::with('user')->latest()->take(5)->get();
        $recentBlogs = BlogPost::latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'usersCount',
            'projectsCount',
            'uploadsCount',
            'blogsCount',
            'totalStorageBytes',
            'recentUsers',
            'recentProjects',
            'recentBlogs'
        ));
    }

    public function users()
    {
        $users = User::withCount('projects')->latest()->paginate(15);
        return view('admin.users', compact('users'));
    }

    public function projects()
    {
        $projects = Project::with(['user', 'domains'])->latest()->paginate(15);
        return view('admin.projects', compact('projects'));
    }

    public function toggleProjectStatus(int $id)
    {
        $project = Project::findOrFail($id);
        $project->update([
            'status' => $project->status === 'active' ? 'suspended' : 'active'
        ]);

        return back()->with('success', 'Project status updated.');
    }
}
