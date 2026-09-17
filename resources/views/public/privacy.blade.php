@extends('layouts.app')

@section('title', 'Privacy Policy - RichForge')
@section('meta_description', 'RichForge Privacy Policy. Learn how we protect developer data, secure API requests, and handle information privacy.')

@section('content')
<div class="bg-gradient-to-b from-slate-50 via-white to-slate-50 border-b border-slate-200/60 py-12 sm:py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header Badge & Title -->
        <div class="max-w-3xl space-y-4">
            <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-indigo-50 border border-indigo-200 text-indigo-700 text-xs font-semibold shadow-sm">
                <i class="ri-shield-user-line text-indigo-600 text-sm"></i> Privacy & Data Protection
            </div>
            <h1 class="text-3xl sm:text-5xl font-extrabold font-serif text-slate-900 tracking-tight leading-tight">
                Privacy Policy
            </h1>
            <p class="text-slate-600 text-base sm:text-lg leading-relaxed font-medium">
                At RichForge, we prioritize data privacy and transparency. Learn how we collect, process, and protect developer and end-user information.
            </p>
            <div class="flex items-center gap-4 pt-2 text-xs text-slate-500 font-medium">
                <span><i class="ri-calendar-event-line text-indigo-600"></i> Effective Date: September 1, 2026</span>
                <span>&bull;</span>
                <span><i class="ri-history-line text-indigo-600"></i> Last Updated: September 17, 2026</span>
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
                    <i class="ri-list-check-2 text-indigo-600"></i> Table of Contents
                </h3>
                <nav class="space-y-1 text-xs font-medium text-slate-600">
                    <a href="#collect" class="block px-3 py-2 rounded-xl hover:bg-indigo-50 hover:text-indigo-700 transition-colors">1. Information We Collect</a>
                    <a href="#usage" class="block px-3 py-2 rounded-xl hover:bg-indigo-50 hover:text-indigo-700 transition-colors">2. How We Use Information</a>
                    <a href="#storage" class="block px-3 py-2 rounded-xl hover:bg-indigo-50 hover:text-indigo-700 transition-colors">3. Data Storage & Security</a>
                    <a href="#sharing" class="block px-3 py-2 rounded-xl hover:bg-indigo-50 hover:text-indigo-700 transition-colors">4. Data Sharing & Third Parties</a>
                    <a href="#cookies" class="block px-3 py-2 rounded-xl hover:bg-indigo-50 hover:text-indigo-700 transition-colors">5. Cookies & Local Storage</a>
                    <a href="#rights" class="block px-3 py-2 rounded-xl hover:bg-indigo-50 hover:text-indigo-700 transition-colors">6. Your Rights & GDPR</a>
                    <a href="#contact-privacy" class="block px-3 py-2 rounded-xl hover:bg-indigo-50 hover:text-indigo-700 transition-colors">7. Contact Privacy Team</a>
                </nav>

                <div class="pt-3 border-t border-slate-100 text-center">
                    <a href="{{ route('public.contact') }}" class="text-xs text-indigo-600 hover:text-indigo-700 font-semibold flex items-center justify-center gap-1">
                        <i class="ri-mail-send-line"></i> Privacy Inquiries
                    </a>
                </div>
            </div>
        </aside>

        <!-- Main Privacy Content -->
        <main class="lg:col-span-9 space-y-10 text-slate-700 text-sm leading-relaxed">

            <!-- Section 1 -->
            <section id="collect" class="bg-white border border-slate-200/80 rounded-2xl p-6 sm:p-8 shadow-sm space-y-4">
                <div class="flex items-center gap-3">
                    <div class="w-8 h-8 rounded-xl bg-indigo-100 text-indigo-700 flex items-center justify-center font-bold text-sm font-mono">1</div>
                    <h2 class="text-xl font-bold font-serif text-slate-900">Information We Collect</h2>
                </div>
                <p>
                    We collect minimal data necessary to deliver high-availability editor SDK services and cloud features to developers.
                </p>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-2">
                    <div class="bg-slate-50 border border-slate-200/60 rounded-xl p-4 space-y-1.5">
                        <h4 class="font-bold text-slate-900 text-xs flex items-center gap-1.5">
                            <i class="ri-user-line text-indigo-600"></i> Account Data
                        </h4>
                        <p class="text-xs text-slate-600">Name, email address, password hash, organization details, and billing records when registering an account.</p>
                    </div>

                    <div class="bg-slate-50 border border-slate-200/60 rounded-xl p-4 space-y-1.5">
                        <h4 class="font-bold text-slate-900 text-xs flex items-center gap-1.5">
                            <i class="ri-server-line text-indigo-600"></i> Telemetry & API Usage
                        </h4>
                        <p class="text-xs text-slate-600">API key request volume, origin domain HTTP headers, upload request metadata, and error status logs.</p>
                    </div>
                </div>
            </section>

            <!-- Section 2 -->
            <section id="usage" class="bg-white border border-slate-200/80 rounded-2xl p-6 sm:p-8 shadow-sm space-y-4">
                <div class="flex items-center gap-3">
                    <div class="w-8 h-8 rounded-xl bg-indigo-100 text-indigo-700 flex items-center justify-center font-bold text-sm font-mono">2</div>
                    <h2 class="text-xl font-bold font-serif text-slate-900">How We Use Your Information</h2>
                </div>
                <p>
                    Your data is strictly processed to operate, secure, and enhance RichForge services:
                </p>
                <ul class="space-y-2.5 pl-2">
                    <li class="flex items-start gap-2.5">
                        <i class="ri-checkbox-circle-fill text-indigo-600 mt-0.5 text-base flex-shrink-0"></i>
                        <span><strong>Service Operations:</strong> Authenticating API calls, processing media uploads, enforcing rate limits, and serving CDN assets.</span>
                    </li>
                    <li class="flex items-start gap-2.5">
                        <i class="ri-checkbox-circle-fill text-indigo-600 mt-0.5 text-base flex-shrink-0"></i>
                        <span><strong>Security & Threat Prevention:</strong> Detecting fraudulent activity, rate limit abuse, cross-site origin violations, and DDoS attempts.</span>
                    </li>
                    <li class="flex items-start gap-2.5">
                        <i class="ri-checkbox-circle-fill text-indigo-600 mt-0.5 text-base flex-shrink-0"></i>
                        <span><strong>Platform Metrics:</strong> Aggregating usage statistics to optimize CDN caching speeds and storage allocation.</span>
                    </li>
                </ul>
            </section>

            <!-- Section 3 -->
            <section id="storage" class="bg-white border border-slate-200/80 rounded-2xl p-6 sm:p-8 shadow-sm space-y-4">
                <div class="flex items-center gap-3">
                    <div class="w-8 h-8 rounded-xl bg-indigo-100 text-indigo-700 flex items-center justify-center font-bold text-sm font-mono">3</div>
                    <h2 class="text-xl font-bold font-serif text-slate-900">Data Storage & Encryption</h2>
                </div>
                <p>
                    RichForge employs industry-standard encryption protocols across all communication channels. All API connections require HTTPS (TLS 1.3). Media assets stored in our storage clusters are encrypted at rest using AES-256 encryption.
                </p>
            </section>

            <!-- Section 4 -->
            <section id="sharing" class="bg-white border border-slate-200/80 rounded-2xl p-6 sm:p-8 shadow-sm space-y-4">
                <div class="flex items-center gap-3">
                    <div class="w-8 h-8 rounded-xl bg-indigo-100 text-indigo-700 flex items-center justify-center font-bold text-sm font-mono">4</div>
                    <h2 class="text-xl font-bold font-serif text-slate-900">Data Sharing & Third Parties</h2>
                </div>
                <div class="bg-emerald-50/70 border border-emerald-200/80 rounded-2xl p-5 space-y-1.5">
                    <h4 class="font-bold text-emerald-900 text-xs flex items-center gap-2">
                        <i class="ri-lock-line text-emerald-600"></i> We Never Sell Your Data
                    </h4>
                    <p class="text-xs text-emerald-800">
                        RichForge does not sell, rent, or trade developer account data or end-user document content to advertising networks or third-party data brokers.
                    </p>
                </div>
            </section>

            <!-- Section 5 -->
            <section id="cookies" class="bg-white border border-slate-200/80 rounded-2xl p-6 sm:p-8 shadow-sm space-y-4">
                <div class="flex items-center gap-3">
                    <div class="w-8 h-8 rounded-xl bg-indigo-100 text-indigo-700 flex items-center justify-center font-bold text-sm font-mono">5</div>
                    <h2 class="text-xl font-bold font-serif text-slate-900">Cookies & Local Storage</h2>
                </div>
                <p>
                    We use session cookies solely for maintaining logged-in dashboard sessions and securing CSRF tokens. The standalone editor SDK uses browser LocalStorage locally in your users' browser for draft autosaving when enabled.
                </p>
            </section>

            <!-- Section 6 -->
            <section id="rights" class="bg-white border border-slate-200/80 rounded-2xl p-6 sm:p-8 shadow-sm space-y-4">
                <div class="flex items-center gap-3">
                    <div class="w-8 h-8 rounded-xl bg-indigo-100 text-indigo-700 flex items-center justify-center font-bold text-sm font-mono">6</div>
                    <h2 class="text-xl font-bold font-serif text-slate-900">Your Rights & Compliance (GDPR / CCPA)</h2>
                </div>
                <p>
                    Under GDPR and CCPA regulations, you have rights regarding your personal information, including the right to access, rectify, export, or request deletion of your account data. You can exercise these rights at any time by contacting our privacy team.
                </p>
            </section>

            <!-- Section 7 -->
            <section id="contact-privacy" class="bg-white border border-slate-200/80 rounded-2xl p-6 sm:p-8 shadow-sm space-y-4">
                <div class="flex items-center gap-3">
                    <div class="w-8 h-8 rounded-xl bg-indigo-100 text-indigo-700 flex items-center justify-center font-bold text-sm font-mono">7</div>
                    <h2 class="text-xl font-bold font-serif text-slate-900">Contact Privacy Team</h2>
                </div>
                <p>
                    For privacy inquiries, data subject access requests, or security concerns, reach out to us directly:
                </p>
                <div class="p-4 bg-slate-50 border border-slate-200 rounded-xl text-xs space-y-1 font-mono text-slate-800">
                    <p>Email: privacy@richforge.dev</p>
                    <p>Subject: Privacy Data Request</p>
                </div>
            </section>

            <!-- Bottom Contact Callout -->
            <div class="bg-gradient-to-r from-indigo-600 to-purple-700 text-white rounded-2xl p-6 sm:p-8 shadow-lg flex flex-col sm:flex-row items-center justify-between gap-6">
                <div class="space-y-1 text-center sm:text-left">
                    <h3 class="text-lg font-bold font-serif">Have questions regarding data privacy?</h3>
                    <p class="text-xs text-indigo-100">Contact our data protection team for quick assistance.</p>
                </div>
                <a href="{{ route('public.contact') }}" class="px-6 py-3 bg-white text-slate-900 hover:bg-slate-100 font-bold text-xs rounded-xl shadow-md transition-all flex items-center gap-2 flex-shrink-0">
                    <i class="ri-mail-line text-indigo-600"></i> Contact Us
                </a>
            </div>

        </main>
    </div>
</div>
@endsection
