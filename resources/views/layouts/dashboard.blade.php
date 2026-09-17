<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard - RichForge')</title>

    <!-- Google Fonts: Fraunces & Caveat Cursive & Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Caveat:wght@500;600;700&family=Fraunces:ital,opsz,wght@0,9..144,100..900;1,9..144,100..900&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=JetBrains+Mono:wght@400;500;600&display=swap"
        rel="stylesheet">

    <!-- Remix Icon CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                        serif: ['"Fraunces"', 'serif'],
                        cursive: ['"Caveat"', 'cursive'],
                        mono: ['"JetBrains Mono"', 'monospace'],
                    },
                    colors: {
                        brand: {
                            50: '#fdf4ff',
                            100: '#fae8ff',
                            500: '#d946ef',
                            600: '#c026d3',
                            700: '#a21caf',
                            900: '#701a75',
                        }
                    }
                }
            }
        }
    </script>

    <!-- RichForge SDK Assets -->
    <link rel="stylesheet" href="{{ asset('cdn/v1/richforge.css') }}">
    <script src="{{ asset('cdn/v1/richforge.js') }}"></script>

    <!-- Alpine.js Core & Plugins -->
    <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/collapse@3.x.x/dist/cdn.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    @stack('styles')
</head>

<body class="bg-[#f8f9fc] text-[#1a1a2e] font-sans antialiased min-h-screen flex">

    <!-- Sidebar -->
    <aside
        class="w-64 bg-white border-r border-slate-200 flex flex-col justify-between hidden md:flex shrink-0 shadow-sm">
        <div>
            <!-- Logo -->
            <div class="h-20 flex items-center px-6 border-b border-slate-200">
                <a href="{{ route('dashboard') }}" class="flex items-center gap-3">
                    <img src="{{ asset('images/logo-var1.jpg') }}" alt="RichForge Logo"
                        class="w-10 h-10 rounded-xl border border-slate-200 object-cover shadow-sm">
                    <span class="font-serif font-extrabold text-xl text-[#1a1a2e]">RichForge</span>
                    <span
                        class="text-[10px] bg-fuchsia-600 text-white font-mono px-2 py-0.5 rounded uppercase font-semibold tracking-wider">Dev</span>
                </a>
            </div>

            <!-- Navigation Links with Remix Icons -->
            <nav class="p-4 space-y-1.5 text-sm font-medium">
                <a href="{{ route('dashboard') }}"
                    class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl transition-colors {{ request()->routeIs('dashboard') ? 'bg-fuchsia-50 text-fuchsia-700 font-semibold border border-fuchsia-200/80 shadow-sm' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }}">
                    <i class="ri-dashboard-3-line text-lg {{ request()->routeIs('dashboard') ? 'text-fuchsia-600' : 'text-slate-400' }}"></i>
                    Dashboard
                </a>

                <a href="{{ route('projects.index') }}"
                    class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl transition-colors {{ request()->routeIs('projects.*') ? 'bg-fuchsia-50 text-fuchsia-700 font-semibold border border-fuchsia-200/80 shadow-sm' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }}">
                    <i class="ri-folder-keyhole-line text-lg {{ request()->routeIs('projects.*') ? 'text-fuchsia-600' : 'text-slate-400' }}"></i>
                    Projects
                </a>

                <a href="{{ route('uploads.index') }}"
                    class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl transition-colors {{ request()->routeIs('uploads.*') ? 'bg-fuchsia-50 text-fuchsia-700 font-semibold border border-fuchsia-200/80 shadow-sm' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }}">
                    <i class="ri-image-line text-lg {{ request()->routeIs('uploads.*') ? 'text-fuchsia-600' : 'text-slate-400' }}"></i>
                    Media & Uploads
                </a>

                <a href="{{ route('docs.index') }}"
                    target="_blank"
                    class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-slate-600 hover:bg-slate-100 hover:text-slate-900 transition-colors">
                    <i class="ri-book-2-line text-lg text-slate-400"></i>
                    Documentation
                </a>

                @if(Auth::user() && Auth::user()->is_admin)
                    <div class="pt-4 mt-4 border-t border-slate-200">
                        <span class="px-3 text-[11px] font-bold tracking-wider uppercase text-slate-400 font-mono block mb-1">Admin
                            Console</span>
                        <a href="{{ route('admin.dashboard') }}"
                            class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl transition-colors {{ request()->routeIs('admin.dashboard') ? 'bg-fuchsia-50 border border-fuchsia-200 text-fuchsia-700 font-bold shadow-sm' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }}">
                            <i class="ri-shield-user-line text-lg {{ request()->routeIs('admin.dashboard') ? 'text-fuchsia-600' : 'text-slate-400' }}"></i> Platform Admin
                        </a>
                        <a href="{{ route('admin.blogs.index') }}"
                            class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl transition-colors {{ request()->routeIs('admin.blogs.*') ? 'bg-fuchsia-50 border border-fuchsia-200 text-fuchsia-700 font-bold shadow-sm' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }}">
                            <i class="ri-article-line text-lg {{ request()->routeIs('admin.blogs.*') ? 'text-fuchsia-600' : 'text-slate-400' }}"></i> Manage Blogs
                        </a>
                    </div>
                @endif
            </nav>
        </div>

        <!-- User profile in sidebar footer -->
        <div class="p-4 border-t border-slate-200 bg-slate-50/50">
            <div class="flex items-center gap-3 mb-3">
                <div
                    class="w-9 h-9 rounded-full bg-fuchsia-600 flex items-center justify-center font-bold text-white text-sm shadow-sm font-serif">
                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                </div>
                <div class="overflow-hidden">
                    <p class="text-sm font-semibold text-[#1a1a2e] truncate">{{ Auth::user()->name }}</p>
                    <p class="text-xs text-slate-500 truncate">{{ Auth::user()->email }}</p>
                </div>
            </div>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit"
                    class="w-full text-xs font-semibold py-2 px-3 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 border border-slate-200 transition-colors flex items-center justify-center gap-2">
                    <i class="ri-logout-box-r-line text-sm text-slate-500"></i>
                    Sign Out
                </button>
            </form>
        </div>
    </aside>

    <!-- Main Section -->
    <div class="flex-grow flex flex-col min-w-0">
        <!-- Top bar -->
        <header class="h-20 border-b border-slate-200 bg-white px-4 sm:px-8 flex items-center justify-between shadow-sm">
            <div class="flex items-center gap-3">
                <button id="dashboard-mobile-toggle" type="button" aria-label="Toggle Dashboard Menu" class="md:hidden p-2 rounded-xl text-slate-600 hover:text-slate-900 hover:bg-slate-100 transition-colors">
                    <i id="dashboard-mobile-icon" class="ri-menu-line text-2xl"></i>
                </button>
                <h1 class="font-serif font-extrabold text-lg sm:text-xl text-[#1a1a2e] flex items-center gap-2">
                    <i class="ri-quill-pen-line text-fuchsia-600"></i>
                    @yield('header_title', 'Dashboard')
                </h1>
            </div>

            <div class="flex items-center gap-4">
                <a href="{{ route('playground') }}" target="_blank"
                    class="text-xs font-semibold px-3 sm:px-4 py-2 rounded-xl bg-fuchsia-50 text-fuchsia-700 border border-fuchsia-200 hover:bg-fuchsia-100 transition-colors flex items-center gap-2 shadow-sm">
                    <i class="ri-code-box-line text-fuchsia-600"></i> Playground
                </a>
            </div>
        </header>

        <!-- Mobile Navigation Drawer for Dashboard (visible on screens < 768px) -->
        <div id="dashboard-mobile-menu" class="hidden md:hidden bg-white border-b border-slate-200 px-6 py-4 space-y-3 shadow-md">
            <nav class="space-y-1.5 text-sm font-medium">
                <a href="{{ route('dashboard') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl transition-colors {{ request()->routeIs('dashboard') ? 'bg-fuchsia-50 text-fuchsia-700 font-semibold border border-fuchsia-200' : 'text-slate-600 hover:bg-slate-100' }}">
                    <i class="ri-dashboard-3-line text-lg text-fuchsia-600"></i> Dashboard
                </a>
                <a href="{{ route('projects.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl transition-colors {{ request()->routeIs('projects.*') ? 'bg-fuchsia-50 text-fuchsia-700 font-semibold border border-fuchsia-200' : 'text-slate-600 hover:bg-slate-100' }}">
                    <i class="ri-folder-key-line text-lg text-fuchsia-600"></i> Projects & Keys
                </a>
                <a href="{{ route('uploads.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl transition-colors {{ request()->routeIs('uploads.*') ? 'bg-fuchsia-50 text-fuchsia-700 font-semibold border border-fuchsia-200' : 'text-slate-600 hover:bg-slate-100' }}">
                    <i class="ri-image-2-line text-lg text-fuchsia-600"></i> Media Uploads
                </a>
                <a href="{{ route('docs.index') }}" target="_blank" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-slate-600 hover:bg-slate-100 transition-colors">
                    <i class="ri-book-read-line text-lg text-slate-400"></i> Documentation
                </a>
                @if(Auth::user()->is_admin)
                    <div class="pt-2 border-t border-slate-200">
                        <span class="text-[10px] font-bold text-slate-400 uppercase tracking-wider px-3 mb-1 block">Admin Console</span>
                        <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-3 py-2 rounded-xl text-fuchsia-700 hover:bg-fuchsia-50 transition-colors">
                            <i class="ri-shield-user-line text-lg text-fuchsia-600"></i> System Admin
                        </a>
                        <a href="{{ route('admin.blogs.index') }}" class="flex items-center gap-3 px-3 py-2 rounded-xl text-fuchsia-700 hover:bg-fuchsia-50 transition-colors">
                            <i class="ri-article-line text-lg text-fuchsia-600"></i> Manage Blogs
                        </a>
                    </div>
                @endif
            </nav>

            <div class="pt-3 border-t border-slate-200 flex items-center justify-between">
                <div class="flex items-center gap-2">
                    <div class="w-8 h-8 rounded-full bg-fuchsia-600 flex items-center justify-center font-bold text-white text-xs font-serif">
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </div>
                    <span class="text-xs font-semibold text-[#1a1a2e] truncate max-w-[140px]">{{ Auth::user()->name }}</span>
                </div>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="text-xs font-semibold py-1.5 px-3 rounded-lg bg-slate-100 text-slate-700 hover:bg-slate-200 border border-slate-200 flex items-center gap-1">
                        <i class="ri-logout-box-r-line"></i> Sign Out
                    </button>
                </form>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const dashToggle = document.getElementById('dashboard-mobile-toggle');
                const dashMenu = document.getElementById('dashboard-mobile-menu');
                const dashIcon = document.getElementById('dashboard-mobile-icon');
                if (dashToggle && dashMenu && dashIcon) {
                    dashToggle.addEventListener('click', function() {
                        const isHidden = dashMenu.classList.contains('hidden');
                        if (isHidden) {
                            dashMenu.classList.remove('hidden');
                            dashIcon.className = 'ri-close-line text-2xl text-fuchsia-600';
                        } else {
                            dashMenu.classList.add('hidden');
                            dashIcon.className = 'ri-menu-line text-2xl';
                        }
                    });
                }
            });
        </script>

        <!-- Main View Container -->
        <main class="flex-grow p-6 sm:p-8 overflow-y-auto">
            @if(session('success'))
                <div
                    class="mb-6 p-4 rounded-2xl bg-emerald-50 border border-emerald-200 text-emerald-800 text-sm flex items-center justify-between shadow-sm">
                    <span class="flex items-center gap-2 font-medium">
                        <i class="ri-checkbox-circle-fill text-lg text-emerald-600"></i>
                        {{ session('success') }}
                    </span>
                </div>
            @endif

            @if($errors->any())
                <div class="mb-6 p-4 rounded-2xl bg-red-50 border border-red-200 text-red-800 text-sm shadow-sm">
                    <ul class="list-disc list-inside space-y-1 font-medium">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @yield('content')
        </main>
    </div>

    @stack('scripts')
</body>

</html>