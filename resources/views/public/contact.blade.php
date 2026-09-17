@extends('layouts.app')

@section('title', 'Contact & Developer Support - RichForge')

@section('content')
<div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8 py-16 space-y-8">
    <div class="text-center space-y-2">
        <h1 class="text-3xl font-extrabold text-[#1a1a2e]">Contact Developer Support</h1>
        <p class="text-[#64748b] text-sm">Have a question or feature request? We'd love to hear from you.</p>
    </div>

    <div class="bg-white border border-[#e5e7eb] p-8 rounded-2xl shadow-sm space-y-4">
        <form onsubmit="event.preventDefault(); alert('Thank you for contacting RichForge support! We will get back to you shortly.');" class="space-y-4">
            <div>
                <label class="block text-xs font-semibold text-[#334155] mb-1">Your Name</label>
                <input type="text" required class="w-full px-4 py-2.5 bg-[#f8fafc] border border-[#e2e8f0] text-[#1a1a2e] placeholder-[#94a3b8] rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-fuchsia-500 focus:border-transparent transition-all">
            </div>

            <div>
                <label class="block text-xs font-semibold text-[#334155] mb-1">Email Address</label>
                <input type="email" required class="w-full px-4 py-2.5 bg-[#f8fafc] border border-[#e2e8f0] text-[#1a1a2e] placeholder-[#94a3b8] rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-fuchsia-500 focus:border-transparent transition-all">
            </div>

            <div>
                <label class="block text-xs font-semibold text-[#334155] mb-1">Message</label>
                <textarea rows="4" required class="w-full px-4 py-2.5 bg-[#f8fafc] border border-[#e2e8f0] text-[#1a1a2e] placeholder-[#94a3b8] rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-fuchsia-500 focus:border-transparent transition-all"></textarea>
            </div>

            <button type="submit" class="w-full py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold text-sm rounded-xl shadow-md shadow-indigo-600/20 transition-all focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                Send Message →
            </button>
        </form>
    </div>
</div>
@endsection
