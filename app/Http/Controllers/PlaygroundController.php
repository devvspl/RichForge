<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlaygroundController extends Controller
{
    public function index()
    {
        $userProjects = Auth::check() ? Auth::user()->projects : collect();
        $defaultKey = $userProjects->first()?->project_key ?? 'rf_pub_demo_prod_1234567890abcdef';

        return view('public.playground', compact('userProjects', 'defaultKey'));
    }
}
