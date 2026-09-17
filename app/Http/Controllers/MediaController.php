<?php

namespace App\Http\Controllers;

use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MediaController extends Controller
{
    public function index(Request $request)
    {
        $projectIds = Auth::user()->projects()->pluck('id');

        $query = Media::whereIn('project_id', $projectIds)->with('project');

        if ($request->filled('project_id')) {
            $query->where('project_id', $request->input('project_id'));
        }

        if ($request->filled('type')) {
            $type = $request->input('type');
            if ($type === 'image') {
                $query->where('mime_type', 'like', 'image/%');
            } else {
                $query->where('mime_type', 'not like', 'image/%');
            }
        }

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where('original_name', 'like', "%{$search}%");
        }

        $mediaList = $query->latest()->paginate(16);
        $userProjects = Auth::user()->projects;

        return view('dashboard.uploads.index', compact('mediaList', 'userProjects'));
    }

    public function destroy(int $id)
    {
        $projectIds = Auth::user()->projects()->pluck('id');
        $media = Media::whereIn('project_id', $projectIds)->findOrFail($id);

        if (Storage::exists($media->disk_path)) {
            Storage::delete($media->disk_path);
        }

        $media->delete();

        return back()->with('success', 'File deleted successfully.');
    }
}
