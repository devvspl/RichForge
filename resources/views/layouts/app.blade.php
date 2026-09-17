<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'RichForge - Build Once. Edit Anywhere.')</title>
    <meta name="description"
        content="@yield('meta_description', 'RichForge is a powerful, embeddable developer-focused Rich Text Editor platform. Fast, customizable, and secure WYSIWYG editor SDK.')">

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
                        }
                    }
                }
            }
        };
    </script>

    <!-- RichForge Standalone Editor SDK Assets -->
    <link rel="stylesheet" href="{{ asset('cdn/v1/richforge.css') }}">
    <script src="{{ asset('cdn/v1/richforge.js') }}"></script>

    <!-- Alpine.js Core & Plugins -->
    <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/collapse@3.x.x/dist/cdn.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(28px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes infiniteMarquee {
            0% {
                transform: translateX(0%);
            }

            100% {
                transform: translateX(-50%);
            }
        }

        .reveal-on-scroll {
            opacity: 0;
            transform: translateY(28px);
            transition: opacity 0.7s cubic-bezier(0.16, 1, 0.3, 1), transform 0.7s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .reveal-on-scroll.is-visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* RichForge Theme High-Contrast Light Background Patterns */
        .bg-pattern-dots-light {
            background-image: radial-gradient(rgba(192, 38, 211, 0.4) 2px, transparent 2px);
            background-size: 24px 24px;
        }

        .bg-pattern-grid-light {
            background-image: linear-gradient(to right, rgba(192, 38, 211, 0.22) 1.5px, transparent 1.5px),
                linear-gradient(to bottom, rgba(192, 38, 211, 0.22) 1.5px, transparent 1.5px);
            background-size: 32px 32px;
        }

        .bg-pattern-cross-light {
            background-image: radial-gradient(rgba(147, 51, 234, 0.4) 2.5px, transparent 0);
            background-size: 20px 20px;
        }

        .bg-pattern-hex-light {
            background-image: radial-gradient(circle at 50% 50%, rgba(219, 39, 119, 0.35) 2.5px, transparent 3px);
            background-size: 24px 24px;
        }

        .bg-pattern-diagonal-light {
            background-image: repeating-linear-gradient(45deg, rgba(192, 38, 211, 0.18) 0, rgba(192, 38, 211, 0.18) 2px, transparent 0, transparent 16px);
        }

        .bg-pattern-circuit-light {
            background-image: radial-gradient(rgba(192, 38, 211, 0.45) 2.5px, transparent 2.5px),
                linear-gradient(to right, rgba(192, 38, 211, 0.2) 1.5px, transparent 1.5px);
            background-size: 36px 36px, 18px 18px;
        }

        .bg-pattern-waves-light {
            background-image: radial-gradient(rgba(79, 70, 229, 0.4) 2px, transparent 2px);
            background-size: 24px 24px;
        }

        /* RichForge Theme Dark Background Patterns */
        .bg-pattern-dots-dark {
            background-image: radial-gradient(rgba(217, 70, 239, 0.25) 1.5px, transparent 1.5px);
            background-size: 28px 28px;
        }

        .marquee-container {
            overflow: hidden;
            width: 100%;
            mask-image: linear-gradient(to right, transparent, black 8%, black 92%, transparent);
            -webkit-mask-image: linear-gradient(to right, transparent, black 8%, black 92%, transparent);
        }

        .marquee-track {
            display: flex;
            width: max-content;
            animation: infiniteMarquee 24s linear infinite;
        }

        .marquee-track:hover {
            animation-play-state: paused;
        }
    </style>

    @stack('head')
    @stack('styles')
</head>

<body
    class="bg-slate-50 text-slate-800 font-sans antialiased min-h-screen flex flex-col selection:bg-fuchsia-500 selection:text-white">

    <!-- Navigation Header -->
    <header class="sticky top-0 z-50 bg-white/95 backdrop-blur-md border-b border-slate-200/80 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-20 flex items-center justify-between gap-4">
            <!-- Brand Logo -->
            <a href="{{ route('home') }}" class="flex items-center gap-3 shrink-0 group">
                <img src="{{ asset('images/logo-var1.jpg') }}" alt="RichForge Logo"
                    class="w-10 h-10 sm:w-11 sm:h-11 rounded-xl shadow-md border border-fuchsia-500/30 object-cover group-hover:scale-105 transition-transform">
                <span
                    class="font-serif font-extrabold text-xl sm:text-2xl tracking-tight text-slate-900 group-hover:text-fuchsia-600 transition-colors">
                    RichForge
                </span>
            </a>

            <!-- Desktop Navigation Bar (xl:flex - 1280px+ for spacious layout without collision) -->
            <nav class="hidden xl:flex items-center gap-5 text-xs xl:text-sm font-semibold text-slate-700">
                <a href="{{ route('home') }}#product"
                    class="hover:text-fuchsia-600 transition-colors flex items-center gap-1.5 whitespace-nowrap">
                    <i class="ri-box-3-line text-fuchsia-600"></i> Product
                </a>
                <a href="{{ route('home') }}#features"
                    class="hover:text-fuchsia-600 transition-colors flex items-center gap-1.5 whitespace-nowrap">
                    <i class="ri-magic-line text-fuchsia-600"></i> Features
                </a>
                <a href="{{ route('playground') }}"
                    class="hover:text-fuchsia-600 transition-colors flex items-center gap-1.5 whitespace-nowrap">
                    <i class="ri-code-box-line text-fuchsia-600"></i> Playground
                    <span
                        class="text-[10px] bg-fuchsia-100 text-fuchsia-700 font-bold px-2 py-0.5 rounded-full uppercase tracking-wider">Live</span>
                </a>
                <a href="{{ route('docs.index') }}"
                    class="hover:text-fuchsia-600 transition-colors flex items-center gap-1.5 whitespace-nowrap">
                    <i class="ri-book-2-line text-fuchsia-600"></i> Documentation
                </a>
                <!-- <a href="{{ route('home') }}#integrations"
                    class="hover:text-fuchsia-600 transition-colors flex items-center gap-1.5 whitespace-nowrap">
                    <i class="ri-cpu-line text-fuchsia-600"></i> Integrations
                </a>
                <a href="{{ route('public.pricing') }}"
                    class="hover:text-fuchsia-600 transition-colors flex items-center gap-1.5 whitespace-nowrap">
                    <i class="ri-price-tag-3-line text-fuchsia-600"></i> Pricing
                </a> -->
                <a href="{{ route('blog.index') }}"
                    class="hover:text-fuchsia-600 transition-colors flex items-center gap-1.5 whitespace-nowrap">
                    <i class="ri-article-line text-fuchsia-600"></i> Blog
                </a>
            </nav>

            <!-- Right Side CTA Buttons & Mobile Hamburger Toggle -->
            <div class="flex items-center gap-3 shrink-0">
                @auth
                    <a href="{{ route('dashboard') }}"
                        class="px-5 py-2.5 rounded-full bg-fuchsia-600 hover:bg-fuchsia-500 text-white font-bold text-xs sm:text-sm transition-all shadow-md shadow-fuchsia-500/25 flex items-center gap-2 whitespace-nowrap">
                        <span>Developer Dashboard</span>
                        <i class="ri-arrow-right-line"></i>
                    </a>
                @else
                    <a href="{{ route('register') }}"
                        class="px-5 py-2.5 rounded-full bg-fuchsia-600 hover:bg-fuchsia-500 text-white font-bold text-xs sm:text-sm transition-all shadow-md shadow-fuchsia-500/25 flex items-center gap-2 whitespace-nowrap">
                        <span>Start Free Trial</span>
                        <i class="ri-arrow-right-line"></i>
                    </a>
                @endauth

                <!-- Mobile & Tablet Menu Hamburger Button (Visible on screens < 1280px) -->
                <button id="mobile-menu-toggle" type="button" aria-label="Toggle Navigation Menu"
                    class="xl:hidden p-2 rounded-xl text-slate-700 hover:text-fuchsia-600 hover:bg-slate-100 transition-colors focus:outline-none">
                    <i id="mobile-menu-icon" class="ri-menu-line text-2xl"></i>
                </button>
            </div>
        </div>

        <!-- Responsive Mobile / Tablet Navigation Drawer -->
        <div id="mobile-menu"
            class="hidden xl:hidden bg-white border-b border-slate-200 px-6 py-6 space-y-4 shadow-xl transition-all">
            <nav class="flex flex-col space-y-3 font-semibold text-slate-800 text-sm">
                <a href="{{ route('home') }}#product"
                    class="py-2 hover:text-fuchsia-600 transition-colors flex items-center gap-2.5 border-b border-slate-100">
                    <i class="ri-box-3-line text-fuchsia-600 text-lg"></i> Product
                </a>
                <a href="{{ route('home') }}#features"
                    class="py-2 hover:text-fuchsia-600 transition-colors flex items-center gap-2.5 border-b border-slate-100">
                    <i class="ri-magic-line text-fuchsia-600 text-lg"></i> Features
                </a>
                <a href="{{ route('playground') }}"
                    class="py-2 hover:text-fuchsia-600 transition-colors flex items-center justify-between border-b border-slate-100">
                    <span class="flex items-center gap-2.5">
                        <i class="ri-code-box-line text-fuchsia-600 text-lg"></i> Playground
                    </span>
                    <span
                        class="text-[10px] bg-fuchsia-100 text-fuchsia-700 font-bold px-2 py-0.5 rounded-full uppercase tracking-wider">Live</span>
                </a>
                <a href="{{ route('docs.index') }}"
                    class="py-2 hover:text-fuchsia-600 transition-colors flex items-center gap-2.5 border-b border-slate-100">
                    <i class="ri-book-2-line text-fuchsia-600 text-lg"></i> Documentation
                </a>
                <!-- <a href="{{ route('home') }}#integrations"
                    class="py-2 hover:text-fuchsia-600 transition-colors flex items-center gap-2.5 border-b border-slate-100">
                    <i class="ri-cpu-line text-fuchsia-600 text-lg"></i> Integrations
                </a>
                <a href="{{ route('public.pricing') }}"
                    class="py-2 hover:text-fuchsia-600 transition-colors flex items-center gap-2.5 border-b border-slate-100">
                    <i class="ri-price-tag-3-line text-fuchsia-600 text-lg"></i> Pricing
                </a> -->
                <a href="{{ route('blog.index') }}"
                    class="py-2 hover:text-fuchsia-600 transition-colors flex items-center gap-2.5 border-b border-slate-100">
                    <i class="ri-article-line text-fuchsia-600 text-lg"></i> Blog
                </a>
            </nav>

            <div class="pt-2 flex flex-col gap-3">
                @auth
                    <a href="{{ route('dashboard') }}"
                        class="w-full py-3 text-center rounded-xl bg-fuchsia-600 text-white font-bold text-sm shadow-md flex items-center justify-center gap-2">
                        <span>Developer Dashboard</span>
                        <i class="ri-arrow-right-line"></i>
                    </a>
                @else
                    <a href="{{ route('login') }}"
                        class="w-full py-2.5 text-center font-bold text-slate-800 hover:text-fuchsia-600 border border-slate-200 rounded-xl transition-colors">
                        Log in
                    </a>
                    <a href="{{ route('register') }}"
                        class="w-full py-3 text-center rounded-xl bg-fuchsia-600 text-white font-bold text-sm shadow-md flex items-center justify-center gap-2">
                        <span>Start Free Trial</span>
                        <i class="ri-arrow-right-line"></i>
                    </a>
                @endauth
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-white border-t border-slate-200 text-sm text-slate-600 py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 md:grid-cols-6 gap-8">
            <div class="md:col-span-2 space-y-4">
                <div class="flex items-center gap-3 font-serif font-extrabold text-xl text-slate-900">
                    <img src="{{ asset('images/logo-var1.jpg') }}" alt="RichForge"
                        class="w-9 h-9 rounded-xl object-cover border border-fuchsia-500/30 shadow-sm">
                    RichForge
                </div>
                <p class="text-slate-500 text-xs leading-relaxed max-w-sm">
                    The free developer-focused Rich Text Editor platform. <span
                        class="font-cursive text-fuchsia-600 font-bold text-base">Build once. Edit anywhere.</span>
                    Embeddable WYSIWYG SDK with built-in upload APIs, domain whitelisting, and security.
                </p>
            </div>

            <div>
                <h4 class="font-serif text-slate-900 font-bold mb-4 text-xs uppercase tracking-wider">Products</h4>
                <ul class="space-y-2.5 text-xs font-medium">
                    <li><a href="{{ route('playground') }}"
                            class="hover:text-fuchsia-600 transition-colors">Playground</a></li>
                    <li><a href="{{ route('docs.index') }}" class="hover:text-fuchsia-600 transition-colors">JavaScript
                            SDK</a></li>
                    <li><a href="{{ route('blog.index') }}" class="hover:text-fuchsia-600 transition-colors">Blogs</a>
                    </li>
                </ul>
            </div>

            <div>
                <h4 class="font-serif text-slate-900 font-bold mb-4 text-xs uppercase tracking-wider">Developers</h4>
                <ul class="space-y-2.5 text-xs font-medium">
                    <li><a href="{{ route('docs.show', 'getting-started') }}"
                            class="hover:text-fuchsia-600 transition-colors">Getting Started</a></li>
                    <li><a href="{{ route('docs.show', 'configuration') }}"
                            class="hover:text-fuchsia-600 transition-colors">API Reference</a></li>
                    <li><a href="{{ route('docs.show', 'upload') }}"
                            class="hover:text-fuchsia-600 transition-colors">Upload API</a></li>

                </ul>
            </div>

            <div>
                <h4 class="font-serif text-slate-900 font-bold mb-4 text-xs uppercase tracking-wider">Support</h4>
                <ul class="space-y-2.5 text-xs font-medium">
                    <li><a href="{{ route('public.faq') }}" class="hover:text-fuchsia-600 transition-colors">FAQ</a>
                    </li>
                    <li><a href="{{ route('public.contact') }}" class="hover:text-fuchsia-600 transition-colors">Contact
                            Support</a></li>
                    <li><a href="{{ route('public.pricing') }}" class="hover:text-fuchsia-600 transition-colors">Billing
                            & Plans</a></li>
                </ul>
            </div>

            <div>
                <h4 class="font-serif text-slate-900 font-bold mb-4 text-xs uppercase tracking-wider">Legal</h4>
                <ul class="space-y-2.5 text-xs font-medium">
                    <li><a href="{{ route('public.terms') }}" class="hover:text-fuchsia-600 transition-colors">Terms of Use</a></li>
                    <li><a href="{{ route('public.privacy') }}" class="hover:text-fuchsia-600 transition-colors">Privacy Policy</a></li>
                    <li><a href="{{ route('public.security') }}" class="hover:text-fuchsia-600 transition-colors">Security Policy</a></li>
                </ul>
            </div>
        </div>

        <div
            class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-12 pt-8 border-t border-slate-100 flex flex-col sm:flex-row items-center justify-between text-xs text-slate-400">
            <p>&copy; {{ date('Y') }} RichForge Platform. Original implementation. Build once. Edit anywhere.</p>
            <div class="flex items-center gap-2 font-semibold text-slate-600">
                <i class="ri-quill-pen-line text-fuchsia-600 text-base"></i>
                <span class="font-serif">Fraunces & Caveat Cursive Typography</span>
            </div>
        </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Scroll Reveal Animation Observer
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('is-visible');
                    }
                });
            }, { threshold: 0.08 });

            document.querySelectorAll('section, .reveal-on-scroll').forEach(el => {
                el.classList.add('reveal-on-scroll');
                observer.observe(el);
            });

            // Mobile Navigation Menu Toggle Handler
            const toggleBtn = document.getElementById('mobile-menu-toggle');
            const mobileMenu = document.getElementById('mobile-menu');
            const menuIcon = document.getElementById('mobile-menu-icon');

            if (toggleBtn && mobileMenu && menuIcon) {
                toggleBtn.addEventListener('click', function () {
                    const isHidden = mobileMenu.classList.contains('hidden');
                    if (isHidden) {
                        mobileMenu.classList.remove('hidden');
                        menuIcon.className = 'ri-close-line text-2xl text-fuchsia-600';
                    } else {
                        mobileMenu.classList.add('hidden');
                        menuIcon.className = 'ri-menu-line text-2xl';
                    }
                });

                // Auto-close menu when a navigation anchor is clicked
                mobileMenu.querySelectorAll('a').forEach(link => {
                    link.addEventListener('click', () => {
                        mobileMenu.classList.add('hidden');
                        menuIcon.className = 'ri-menu-line text-2xl';
                    });
                });
            }
        });
    </script>

    @stack('scripts')
</body>

</html>