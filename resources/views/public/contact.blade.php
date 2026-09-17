@extends('layouts.app')

@section('title', 'Contact & Developer Support - RichForge')

@section('content')
<div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8 py-16 space-y-8">
    <div class="text-center space-y-2">
        <h1 class="text-3xl font-extrabold text-white">Contact Developer Support</h1>
        <p class="text-slate-400 text-sm">Have a question or feature request? We'd love to hear from you.</p>
    </div>

    <div class="bg-slate-900/80 border border-slate-800 p-8 rounded-2xl shadow-xl space-y-4">
        <form onsubmit="event.preventDefault(); alert('Thank you for contacting RichForge support! We will get back to you shortly.');" class="space-y-4">
            <div>
                <label class="block text-xs font-semibold text-slate-300 mb-1">Your Name</label>
                <input type="text" required class="w-full px-4 py-2.5 bg-slate-950 border border-slate-800 rounded-xl text-white text-sm">
            </div>

            <div>
                <label class="block text-xs font-semibold text-slate-300 mb-1">Email Address</label>
                <input type="email" required class="w-full px-4 py-2.5 bg-slate-950 border border-slate-800 rounded-xl text-white text-sm">
            </div>

            <div>
                <label class="block text-xs font-semibold text-slate-300 mb-1">Message</label>
                <textarea rows="4" required class="w-full px-4 py-2.5 bg-slate-950 border border-slate-800 rounded-xl text-white text-sm"></textarea>
            </div>

            <button type="submit" class="w-full py-3 bg-indigo-600 hover:bg-indigo-500 text-white font-semibold text-sm rounded-xl">
                Send Message →
            </button>
        </form>
    </div>
</div>
@endsection
