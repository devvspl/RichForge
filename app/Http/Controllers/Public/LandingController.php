<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use App\Models\DocumentationPage;
use App\Models\Plan;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        $plans = Plan::all();
        $recentPosts = BlogPost::latest()->take(3)->get();

        return view('public.index', compact('plans', 'recentPosts'));
    }

    public function demo()
    {
        return view('public.demo');
    }

    public function pricing()
    {
        $plans = Plan::all();
        return view('public.pricing', compact('plans'));
    }

    public function faq()
    {
        return view('public.faq');
    }

    public function contact()
    {
        return view('public.contact');
    }
}
