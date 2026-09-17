@extends('layouts.app')

@section('title', 'Security Policy - RichForge')
@section('meta_description', 'RichForge Security Architecture, Compliance, Vulnerability Reporting, and Infrastructure Protection Overview.')

@section('content')
<div class="bg-gradient-to-b from-slate-50 via-white to-slate-50 border-b border-slate-200/60 py-12 sm:py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header Badge & Title -->
        <div class="max-w-3xl space-y-4">
            <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-emerald-50 border border-emerald-200 text-emerald-700 text-xs font-semibold shadow-sm">
                <i class="ri-shield-keyhole-line text-emerald-600 text-sm"></i> Security & Reliability
            </div>
            <h1 class="text-3xl sm:text-5xl font-extrabold font-serif text-slate-900 tracking-tight leading-tight">
                Security Policy
            </h1>
            <p class="text-slate-600 text-base sm:text-lg leading-relaxed font-medium">
                Our infrastructure, SDK, and API security practices are built from the ground up to protect your documents and applications.
            </p>
            <div class="flex items-center gap-4 pt-2 text-xs text-slate-500 font-medium">
                <span><i class="ri-calendar-event-line text-emerald-600"></i> Effective Date: September 1, 2026</span>
                <span>&bull;</span>
                <span><i class="ri-history-line text-emerald-600"></i> Last Updated: September 17, 2026</span>
            </div>
        </div>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 sm:py-16">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">
        
        <!-- Sidebar Navigation -->
        <aside class="lg:col-span-3">
            <div class="sticky top-24 bg-white border border-slate-200/80 rounded-2xl p-5 shadow-sm space-y-4">
                <h3 class="font-serif font-bold text-xs text-slate-900 uppercase tracking-wider flex items-center gap-2 pb-2 border-b border-slate-100">
                    <i class="ri-list-check-2 text-emerald-600"></i> Security Topics
                </h3>
                <nav class="space-y-1 text-xs font-medium text-slate-600">
                    <a href="#arch" class="block px-3 py-2 rounded-xl hover:bg-emerald-50 hover:text-emerald-700 transition-colors">1. Security Architecture</a>
                    <a href="#encryption" class="block px-3 py-2 rounded-xl hover:bg-emerald-50 hover:text-emerald-700 transition-colors">2. Data Encryption Standards</a>
                    <a href="#vulnerability" class="block px-3 py-2 rounded-xl hover:bg-emerald-50 hover:text-emerald-700 transition-colors">3. Vulnerability Management</a>
                    <a href="#disclosure" class="block px-3 py-2 rounded-xl hover:bg-emerald-50 hover:text-emerald-700 transition-colors">4. Responsible Disclosure</a>
                    <a href="#infrastructure" class="block px-3 py-2 rounded-xl hover:bg-emerald-50 hover:text-emerald-700 transition-colors">5. Cloud Infrastructure</a>
                    <a href="#best-practices" class="block px-3 py-2 rounded-xl hover:bg-emerald-50 hover:text-emerald-700 transition-colors">6. Developer Best Practices</a>
                </nav>

                <div class="pt-3 border-t border-slate-100 text-center">
                    <a href="{{ route('public.contact') }}" class="text-xs text-emerald-600 hover:text-emerald-700 font-semibold flex items-center justify-center gap-1">
                        <i class="ri-shield-flash-line"></i> Report Security Issue
                    </a>
                </div>
            </div>
        </aside>

        <!-- Main Security Content -->
        <main class="lg:col-span-9 space-y-10 text-slate-700 text-sm leading-relaxed">

            <!-- Section 1 -->
            <section id="arch" class="bg-white border border-slate-200/80 rounded-2xl p-6 sm:p-8 shadow-sm space-y-4">
                <div class="flex items-center gap-3">
                    <div class="w-8 h-8 rounded-xl bg-emerald-100 text-emerald-700 flex items-center justify-center font-bold text-sm font-mono">1</div>
                    <h2 class="text-xl font-bold font-serif text-slate-900">Security Architecture</h2>
                </div>
                <p>
                    RichForge is engineered with defense-in-depth principles across every tier:
                </p>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-2">
                    <div class="bg-slate-50 border border-slate-200/60 rounded-xl p-4 space-y-1.5">
                        <h4 class="font-bold text-slate-900 text-xs flex items-center gap-1.5">
                            <i class="ri-key-2-line text-emerald-600"></i> Project Key Isolation
                        </h4>
                        <p class="text-xs text-slate-600">Every project runs under segregated credentials. API operations check project key status and assigned domain restrictions before processing requests.</p>
                    </div>

                    <div class="bg-slate-50 border border-slate-200/60 rounded-xl p-4 space-y-1.5">
                        <h4 class="font-bold text-slate-900 text-xs flex items-center gap-1.5">
                            <i class="ri-code-s-slash-line text-emerald-600"></i> XSS & Content Sanitization
                        </h4>
                        <p class="text-xs text-slate-600">The RichForge editor engine automatically sanitizes HTML output to prevent cross-site scripting (XSS) vulnerabilities.</p>
                    </div>
                </div>
            </section>

            <!-- Section 2 -->
            <section id="encryption" class="bg-white border border-slate-200/80 rounded-2xl p-6 sm:p-8 shadow-sm space-y-4">
                <div class="flex items-center gap-3">
                    <div class="w-8 h-8 rounded-xl bg-emerald-100 text-emerald-700 flex items-center justify-center font-bold text-sm font-mono">2</div>
                    <h2 class="text-xl font-bold font-serif text-slate-900">Data Encryption Standards</h2>
                </div>
                <ul class="space-y-2.5 pl-2">
                    <li class="flex items-start gap-2.5">
                        <i class="ri-checkbox-circle-fill text-emerald-600 mt-0.5 text-base flex-shrink-0"></i>
                        <span><strong>In Transit:</strong> All HTTP traffic to RichForge CDN and API endpoints requires HTTPS via TLS 1.3 encryption with strict HSTS policies.</span>
                    </li>
                    <li class="flex items-start gap-2.5">
                        <i class="ri-checkbox-circle-fill text-emerald-600 mt-0.5 text-base flex-shrink-0"></i>
                        <span><strong>At Rest:</strong> Storage buckets containing uploaded media assets and database records utilize AES-256 server-side encryption.</span>
                    </li>
                </ul>
            </section>

            <!-- Section 3 -->
            <section id="vulnerability" class="bg-white border border-slate-200/80 rounded-2xl p-6 sm:p-8 shadow-sm space-y-4">
                <div class="flex items-center gap-3">
                    <div class="w-8 h-8 rounded-xl bg-emerald-100 text-emerald-700 flex items-center justify-center font-bold text-sm font-mono">3</div>
                    <h2 class="text-xl font-bold font-serif text-slate-900">Vulnerability Management</h2>
                </div>
                <p>
                    We maintain continuous automated security scanning across software dependencies, container environments, and code commits. Security patches for critical dependencies are deployed promptly upon verification.
                </p>
            </section>

            <!-- Section 4 -->
            <section id="disclosure" class="bg-white border border-slate-200/80 rounded-2xl p-6 sm:p-8 shadow-sm space-y-4">
                <div class="flex items-center gap-3">
                    <div class="w-8 h-8 rounded-xl bg-emerald-100 text-emerald-700 flex items-center justify-center font-bold text-sm font-mono">4</div>
                    <h2 class="text-xl font-bold font-serif text-slate-900">Responsible Disclosure</h2>
                </div>
                <p>
                    We welcome security researchers and developers to inspect our platform and report any potential security concerns responsibly.
                </p>
                <div class="bg-emerald-50/70 border border-emerald-200/80 rounded-2xl p-5 space-y-2">
                    <h4 class="font-bold text-emerald-900 text-xs flex items-center gap-2">
                        <i class="ri-bug-line text-emerald-600"></i> Reporting Security Findings
                    </h4>
                    <p class="text-xs text-emerald-800">
                        Please email security reports to <strong>security@richforge.dev</strong> with steps to reproduce. We respond to security reports within 24 hours and request that researchers refrain from public disclosure until patches have been deployed.
                    </p>
                </div>
            </section>

            <!-- Section 5 -->
            <section id="infrastructure" class="bg-white border border-slate-200/80 rounded-2xl p-6 sm:p-8 shadow-sm space-y-4">
                <div class="flex items-center gap-3">
                    <div class="w-8 h-8 rounded-xl bg-emerald-100 text-emerald-700 flex items-center justify-center font-bold text-sm font-mono">5</div>
                    <h2 class="text-xl font-bold font-serif text-slate-900">Cloud Infrastructure Protection</h2>
                </div>
                <p>
                    RichForge is hosted on enterprise-grade cloud provider infrastructure featuring multi-region redundancy, automated DDoS protection, automated database snapshots, and strict firewall access controls.
                </p>
            </section>

            <!-- Section 6 -->
            <section id="best-practices" class="bg-white border border-slate-200/80 rounded-2xl p-6 sm:p-8 shadow-sm space-y-4">
                <div class="flex items-center gap-3">
                    <div class="w-8 h-8 rounded-xl bg-emerald-100 text-emerald-700 flex items-center justify-center font-bold text-sm font-mono">6</div>
                    <h2 class="text-xl font-bold font-serif text-slate-900">Developer Best Practices</h2>
                </div>
                <p>
                    To maintain optimal security in your web applications:
                </p>
                <ul class="space-y-2 pl-2 text-xs">
                    <li class="flex items-center gap-2 text-slate-700">
                        <i class="ri-checkbox-circle-line text-emerald-600"></i> Restrict public project key authorization to your production domain origins in the RichForge dashboard.
                    </li>
                    <li class="flex items-center gap-2 text-slate-700">
                        <i class="ri-checkbox-circle-line text-emerald-600"></i> Never commit private admin API tokens into public Git repositories.
                    </li>
                    <li class="flex items-center gap-2 text-slate-700">
                        <i class="ri-checkbox-circle-line text-emerald-600"></i> Keep the RichForge SDK stylesheet and JavaScript assets updated to the latest minor version release.
                    </li>
                </ul>
            </section>

            <!-- Bottom Contact Callout -->
            <div class="bg-gradient-to-r from-emerald-600 to-teal-700 text-white rounded-2xl p-6 sm:p-8 shadow-lg flex flex-col sm:flex-row items-center justify-between gap-6">
                <div class="space-y-1 text-center sm:text-left">
                    <h3 class="text-lg font-bold font-serif">Need to report a security vulnerability?</h3>
                    <p class="text-xs text-emerald-100">Our security team investigates all reports promptly.</p>
                </div>
                <a href="mailto:security@richforge.dev" class="px-6 py-3 bg-white text-slate-900 hover:bg-slate-100 font-bold text-xs rounded-xl shadow-md transition-all flex items-center gap-2 flex-shrink-0">
                    <i class="ri-shield-flash-line text-emerald-600"></i> Email Security Team
                </a>
            </div>

        </main>
    </div>
</div>
@endsection
