@extends('layouts.app')

@section('title', 'Pricing - Free Developer Platform - RichForge')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 space-y-12">
    <div class="text-center max-w-3xl mx-auto space-y-3">
        <div class="inline-flex items-center gap-2 px-4 py-1 rounded-full bg-fuchsia-100 text-fuchsia-700 text-xs font-semibold border border-fuchsia-200">
            <i class="ri-price-tag-3-line"></i> Transparent Pricing
        </div>
        <h1 class="text-4xl sm:text-5xl font-serif font-extrabold text-[#1a1a2e]">Simple, Free Developer Plans</h1>
        <p class="text-[#64748b] text-base sm:text-lg max-w-xl mx-auto">RichForge is free for developers. Build once, edit anywhere.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-4xl mx-auto">
        <!-- Community Free Card -->
        <div class="bg-white border border-[#e5e7eb] rounded-2xl p-8 shadow-md hover:shadow-xl transition-all space-y-6">
            <div>
                <h3 class="font-serif font-bold text-2xl text-[#1a1a2e]">Community Free</h3>
                <div class="text-4xl font-serif font-extrabold text-[#1a1a2e] mt-2">$0 <span class="text-xs text-[#64748b] font-normal font-sans">/ forever free</span></div>
            </div>
            <ul class="space-y-3.5 text-xs sm:text-sm text-[#334155] font-medium">
                <li class="flex items-center gap-2.5"><span class="text-emerald-600 font-bold">✓</span> 5 Developer Projects</li>
                <li class="flex items-center gap-2.5"><span class="text-emerald-600 font-bold">✓</span> Unlimited Editor Loads</li>
                <li class="flex items-center gap-2.5"><span class="text-emerald-600 font-bold">✓</span> 1,000 MB Upload Storage</li>
                <li class="flex items-center gap-2.5"><span class="text-emerald-600 font-bold">✓</span> Domain Whitelisting</li>
                <li class="flex items-center gap-2.5"><span class="text-emerald-600 font-bold">✓</span> HTML XSS Sanitizer</li>
            </ul>
            <a href="{{ route('register') }}" class="block text-center py-3.5 px-4 bg-indigo-600 hover:bg-indigo-500 text-white font-bold text-xs sm:text-sm rounded-xl shadow-md transition-all">Get Started Free</a>
        </div>

        <!-- Developer Pro Card -->
        <div class="bg-white border-2 border-fuchsia-500 rounded-2xl p-8 shadow-xl hover:shadow-2xl transition-all space-y-6 relative overflow-hidden">
            <div class="absolute top-4 right-4 text-[10px] bg-indigo-100 text-indigo-700 border border-indigo-200 px-3 py-1 rounded-full font-mono font-bold uppercase tracking-wider">Billing-Ready</div>
            <div>
                <h3 class="font-serif font-bold text-2xl text-[#1a1a2e]">Developer Pro</h3>
                <div class="text-4xl font-serif font-extrabold text-[#1a1a2e] mt-2">$29 <span class="text-xs text-[#64748b] font-normal font-sans">/ month</span></div>
            </div>
            <ul class="space-y-3.5 text-xs sm:text-sm text-[#334155] font-medium">
                <li class="flex items-center gap-2.5"><span class="text-emerald-600 font-bold">✓</span> 25 Developer Projects</li>
                <li class="flex items-center gap-2.5"><span class="text-emerald-600 font-bold">✓</span> Priority Upload API CDN</li>
                <li class="flex items-center gap-2.5"><span class="text-emerald-600 font-bold">✓</span> 25,000 MB Storage</li>
                <li class="flex items-center gap-2.5"><span class="text-emerald-600 font-bold">✓</span> Dedicated Support</li>
            </ul>
            <a href="{{ route('register') }}" class="block text-center py-3.5 px-4 bg-fuchsia-600 hover:bg-fuchsia-500 text-white font-bold text-xs sm:text-sm rounded-xl shadow-md shadow-fuchsia-600/30 transition-all">Start Pro Trial</a>
        </div>
    </div>
</div>
@endsection
