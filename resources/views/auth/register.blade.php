@extends('layouts.app')

@section('title', 'Create Free Developer Account - RichForge')

@section('content')
<div class="min-h-[calc(100vh-5rem)] flex flex-col lg:flex-row w-full">
    
    <!-- LEFT HALF: Cover Panel (Brand Gradient + Messaging + Features) -->
    <div class="w-full lg:w-5/12 bg-gradient-to-br from-indigo-700 via-purple-700 to-fuchsia-600 text-white p-8 sm:p-12 lg:p-16 flex flex-col justify-between relative overflow-hidden shrink-0">
        <!-- Background Decorative Glow Elements -->
        <div class="absolute -bottom-24 -left-24 w-96 h-96 bg-fuchsia-500/20 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute -top-24 -right-24 w-96 h-96 bg-indigo-500/20 rounded-full blur-3xl pointer-events-none"></div>
        
        <div class="relative z-10 space-y-12">
            <!-- Brand Logo -->
            <a href="{{ route('home') }}" class="inline-flex items-center gap-3 group">
                <img src="{{ asset('images/logo-var1.jpg') }}" alt="RichForge Logo" class="w-10 h-10 rounded-xl object-cover border border-white/30 shadow-lg group-hover:scale-105 transition-transform">
                <span class="font-serif font-extrabold text-2xl tracking-tight text-white">RichForge</span>
            </a>

            <!-- Cover Headline & Subtext -->
            <div class="space-y-4">
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-white/10 backdrop-blur-md text-fuchsia-200 text-xs font-semibold border border-white/15">
                    <i class="ri-sparkling-fill text-fuchsia-300"></i> Developer Platform
                </div>
                <h1 class="font-serif font-extrabold text-3xl sm:text-4xl lg:text-5xl text-white tracking-tight leading-tight">
                    Build Once. <br class="hidden sm:inline">
                    <span class="text-fuchsia-200 italic">Edit Anywhere.</span>
                </h1>
                <p class="text-fuchsia-100 text-sm sm:text-base leading-relaxed max-w-md font-normal">
                    Join thousands of developers embedding rich text editing, file upload pipelines, and domain security in minutes.
                </p>
            </div>

            <!-- Feature Bullets -->
            <div class="space-y-3 pt-2">
                <div class="flex items-center gap-3 text-xs sm:text-sm text-white/90">
                    <div class="w-6 h-6 rounded-full bg-white/20 backdrop-blur-md flex items-center justify-center text-white shrink-0">
                        <i class="ri-check-line text-sm font-bold"></i>
                    </div>
                    <span>100% Free forever developer tier</span>
                </div>
                <div class="flex items-center gap-3 text-xs sm:text-sm text-white/90">
                    <div class="w-6 h-6 rounded-full bg-white/20 backdrop-blur-md flex items-center justify-center text-white shrink-0">
                        <i class="ri-check-line text-sm font-bold"></i>
                    </div>
                    <span>2-line JavaScript SDK integration</span>
                </div>
                <div class="flex items-center gap-3 text-xs sm:text-sm text-white/90">
                    <div class="w-6 h-6 rounded-full bg-white/20 backdrop-blur-md flex items-center justify-center text-white shrink-0">
                        <i class="ri-check-line text-sm font-bold"></i>
                    </div>
                    <span>Enterprise-grade XSS & origin protection</span>
                </div>
            </div>
        </div>

        <!-- Cover Footer Info -->
        <div class="relative z-10 pt-12 text-xs text-fuchsia-200/80 hidden lg:block">
            &copy; {{ date('Y') }} RichForge Platform. All rights reserved.
        </div>
    </div>

    <!-- RIGHT HALF: Form Panel (White Background + Form) -->
    <div class="w-full lg:w-7/12 bg-white flex items-center justify-center p-6 sm:p-12 lg:p-16">
        <div class="max-w-md w-full space-y-8">
            
            <!-- Form Header -->
            <div class="space-y-2">
                <h2 class="font-serif font-extrabold text-3xl text-[#1a1a2e] tracking-tight">Create your free account</h2>
                <p class="text-sm text-[#64748b]">Get instant access to your public project key & embeddable editor SDK</p>
            </div>

            @if($errors->any())
                <div class="p-4 rounded-xl bg-red-50 border border-red-200 text-red-700 text-xs space-y-1">
                    @foreach($errors->all() as $err)
                        <p class="font-bold flex items-center gap-1.5"><i class="ri-error-warning-line text-sm"></i> {{ $err }}</p>
                    @endforeach
                </div>
            @endif

            <!-- Form Body -->
            <form class="space-y-5" action="{{ route('register') }}" method="POST">
                @csrf
                
                <div class="space-y-4">
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1.5">Full Name</label>
                        <input type="text" name="name" value="{{ old('name') }}" required class="w-full px-4 py-3 bg-[#f8fafc] border border-[#e2e8f0] rounded-xl text-[#1a1a2e] text-sm focus:outline-none focus:border-fuchsia-500 focus:ring-1 focus:ring-fuchsia-500 transition-colors placeholder:text-slate-400 font-medium" placeholder="Jane Developer">
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1.5">Email address</label>
                        <input type="email" name="email" value="{{ old('email') }}" required class="w-full px-4 py-3 bg-[#f8fafc] border border-[#e2e8f0] rounded-xl text-[#1a1a2e] text-sm focus:outline-none focus:border-fuchsia-500 focus:ring-1 focus:ring-fuchsia-500 transition-colors placeholder:text-slate-400 font-medium" placeholder="jane@company.com">
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1.5">Password</label>
                        <input type="password" name="password" required class="w-full px-4 py-3 bg-[#f8fafc] border border-[#e2e8f0] rounded-xl text-[#1a1a2e] text-sm focus:outline-none focus:border-fuchsia-500 focus:ring-1 focus:ring-fuchsia-500 transition-colors placeholder:text-slate-400 font-medium" placeholder="At least 8 characters">
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1.5">Confirm Password</label>
                        <input type="password" name="password_confirmation" required class="w-full px-4 py-3 bg-[#f8fafc] border border-[#e2e8f0] rounded-xl text-[#1a1a2e] text-sm focus:outline-none focus:border-fuchsia-500 focus:ring-1 focus:ring-fuchsia-500 transition-colors placeholder:text-slate-400 font-medium" placeholder="••••••••">
                    </div>
                </div>

                <button type="submit" class="w-full py-3.5 px-4 bg-fuchsia-600 hover:bg-fuchsia-500 text-white font-bold text-sm rounded-xl shadow-lg shadow-fuchsia-600/25 transition-all flex items-center justify-center gap-2 mt-2">
                    <span>Create Free Account</span>
                    <i class="ri-arrow-right-line"></i>
                </button>

                <!-- Divider -->
                <div class="relative my-6">
                    <div class="absolute inset-0 flex items-center"><div class="w-full border-t border-slate-200"></div></div>
                    <div class="relative flex justify-center text-xs uppercase"><span class="bg-white px-3 text-slate-400 font-semibold tracking-wider">Or signup with</span></div>
                </div>

                <!-- Google Auth Button -->
                <a href="{{ route('auth.google') }}" class="w-full py-3 px-4 bg-white hover:bg-slate-50 border border-slate-200 text-slate-700 font-bold text-sm rounded-xl flex items-center justify-center gap-3 transition-colors shadow-sm">
                    <svg class="w-5 h-5" viewBox="0 0 24 24"><path fill="#EA4335" d="M12 5c1.6 0 3 .6 4.1 1.6l3.1-3.1C17.3 1.7 14.8 1 12 1 7.5 1 3.7 3.6 1.9 7.3l3.7 2.9C6.5 7.3 9 5 12 5z"/><path fill="#4285F4" d="M23.5 12.3c0-.8-.1-1.6-.2-2.3H12v4.5h6.5c-.3 1.5-1.1 2.8-2.4 3.7l3.7 2.9c2.2-2 3.7-5 3.7-8.8z"/><path fill="#FBBC05" d="M5.6 14.8c-.2-.7-.4-1.5-.4-2.3s.2-1.6.4-2.3L1.9 7.3C.7 9.7 0 10.8 0 12.5s.7 2.8 1.9 5.2l3.7-2.9z"/><path fill="#34A853" d="M12 24c3.2 0 6-1.1 8-3l-3.7-2.9c-1.1.7-2.5 1.2-4.3 1.2-3 0-5.5-2.3-6.4-5.2L1.9 17C3.7 20.7 7.5 24 12 24z"/></svg>
                    <span>Continue with Google</span>
                </a>

                <!-- Redirect Link -->
                <p class="text-center text-xs text-slate-500 pt-4">
                    Already have an account? <a href="{{ route('login') }}" class="text-fuchsia-600 font-bold hover:underline">Log in here</a>
                </p>
            </form>

        </div>
    </div>

</div>
@endsection

