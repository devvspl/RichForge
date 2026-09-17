@extends('layouts.app')

@section('title', 'Terms of Use - RichForge')
@section('meta_description', 'RichForge Terms of Use and End User Service Agreement for developers, teams, and enterprise applications.')

@section('content')
<div class="bg-gradient-to-b from-slate-50 via-white to-slate-50 border-b border-slate-200/60 py-12 sm:py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header Badge & Title -->
        <div class="max-w-3xl space-y-4">
            <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-fuchsia-50 border border-fuchsia-200 text-fuchsia-700 text-xs font-semibold shadow-sm">
                <i class="ri-file-paper-line text-fuchsia-600 text-sm"></i> Legal & Compliance
            </div>
            <h1 class="text-3xl sm:text-5xl font-extrabold font-serif text-slate-900 tracking-tight leading-tight">
                Terms of Use
            </h1>
            <p class="text-slate-600 text-base sm:text-lg leading-relaxed font-medium">
                Please read these terms and conditions carefully before integrating or using the RichForge SDK, APIs, or Cloud Infrastructure.
            </p>
            <div class="flex items-center gap-4 pt-2 text-xs text-slate-500 font-medium">
                <span><i class="ri-calendar-event-line text-fuchsia-600"></i> Effective Date: September 1, 2026</span>
                <span>&bull;</span>
                <span><i class="ri-history-line text-fuchsia-600"></i> Last Updated: September 17, 2026</span>
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
                    <i class="ri-list-check-2 text-fuchsia-600"></i> Table of Contents
                </h3>
                <nav class="space-y-1 text-xs font-medium text-slate-600">
                    <a href="#acceptance" class="block px-3 py-2 rounded-xl hover:bg-fuchsia-50 hover:text-fuchsia-700 transition-colors">1. Acceptance of Terms</a>
                    <a href="#accounts" class="block px-3 py-2 rounded-xl hover:bg-fuchsia-50 hover:text-fuchsia-700 transition-colors">2. Accounts & API Keys</a>
                    <a href="#usage" class="block px-3 py-2 rounded-xl hover:bg-fuchsia-50 hover:text-fuchsia-700 transition-colors">3. Acceptable Use Policy</a>
                    <a href="#ip" class="block px-3 py-2 rounded-xl hover:bg-fuchsia-50 hover:text-fuchsia-700 transition-colors">4. Intellectual Property</a>
                    <a href="#subscriptions" class="block px-3 py-2 rounded-xl hover:bg-fuchsia-50 hover:text-fuchsia-700 transition-colors">5. Subscriptions & Billing</a>
                    <a href="#disclaimers" class="block px-3 py-2 rounded-xl hover:bg-fuchsia-50 hover:text-fuchsia-700 transition-colors">6. Disclaimers & Liability</a>
                    <a href="#termination" class="block px-3 py-2 rounded-xl hover:bg-fuchsia-50 hover:text-fuchsia-700 transition-colors">7. Termination & Changes</a>
                </nav>

                <div class="pt-3 border-t border-slate-100 text-center">
                    <a href="{{ route('public.contact') }}" class="text-xs text-fuchsia-600 hover:text-fuchsia-700 font-semibold flex items-center justify-center gap-1">
                        <i class="ri-mail-send-line"></i> Contact Legal Team
                    </a>
                </div>
            </div>
        </aside>

        <!-- Main Terms Content -->
        <main class="lg:col-span-9 space-y-10 text-slate-700 text-sm leading-relaxed">

            <!-- Section 1 -->
            <section id="acceptance" class="bg-white border border-slate-200/80 rounded-2xl p-6 sm:p-8 shadow-sm space-y-4">
                <div class="flex items-center gap-3">
                    <div class="w-8 h-8 rounded-xl bg-fuchsia-100 text-fuchsia-700 flex items-center justify-center font-bold text-sm font-mono">1</div>
                    <h2 class="text-xl font-bold font-serif text-slate-900">Acceptance of Terms</h2>
                </div>
                <p>
                    By accessing or using the RichForge Rich Text Editor SDK, developer APIs, web application dashboard, or media storage infrastructure (collectively, the "Services"), you agree to be bound by these Terms of Use. If you are entering into this agreement on behalf of a business, organization, or legal entity, you represent and warrant that you have full authority to bind that entity to these terms.
                </p>
                <p>
                    If you do not agree with any part of these terms, you must immediately cease accessing and using all RichForge services, SDK packages, and API endpoints.
                </p>
            </section>

            <!-- Section 2 -->
            <section id="accounts" class="bg-white border border-slate-200/80 rounded-2xl p-6 sm:p-8 shadow-sm space-y-4">
                <div class="flex items-center gap-3">
                    <div class="w-8 h-8 rounded-xl bg-fuchsia-100 text-fuchsia-700 flex items-center justify-center font-bold text-sm font-mono">2</div>
                    <h2 class="text-xl font-bold font-serif text-slate-900">Accounts & API Key Security</h2>
                </div>
                <p>
                    To utilize RichForge services, you must register for an account and create project API keys. You agree to provide accurate, complete, and current account information at all times.
                </p>
                <ul class="space-y-2.5 pl-2">
                    <li class="flex items-start gap-2.5">
                        <i class="ri-checkbox-circle-fill text-fuchsia-600 mt-0.5 text-base flex-shrink-0"></i>
                        <span><strong>API Key Confidentiality:</strong> You are solely responsible for maintaining the confidentiality of your private API keys and authentication tokens. Do not expose private keys in client-side code repositories.</span>
                    </li>
                    <li class="flex items-start gap-2.5">
                        <i class="ri-checkbox-circle-fill text-fuchsia-600 mt-0.5 text-base flex-shrink-0"></i>
                        <span><strong>Domain Whitelisting:</strong> You are responsible for configuring allowed domain origins for public project keys to prevent unauthorized embed usage.</span>
                    </li>
                    <li class="flex items-start gap-2.5">
                        <i class="ri-checkbox-circle-fill text-fuchsia-600 mt-0.5 text-base flex-shrink-0"></i>
                        <span><strong>Unauthorized Access Notification:</strong> You must immediately notify RichForge upon discovering any unauthorized access to or compromise of your account credentials.</span>
                    </li>
                </ul>
            </section>

            <!-- Section 3 -->
            <section id="usage" class="bg-white border border-slate-200/80 rounded-2xl p-6 sm:p-8 shadow-sm space-y-4">
                <div class="flex items-center gap-3">
                    <div class="w-8 h-8 rounded-xl bg-fuchsia-100 text-fuchsia-700 flex items-center justify-center font-bold text-sm font-mono">3</div>
                    <h2 class="text-xl font-bold font-serif text-slate-900">Acceptable Use Policy</h2>
                </div>
                <p>
                    RichForge is dedicated to providing a high-performance, secure developer platform. You agree not to misuse or attempt to compromise the integrity of our systems.
                </p>

                <div class="bg-amber-50/70 border border-amber-200/80 rounded-2xl p-5 space-y-2">
                    <h4 class="font-bold text-amber-900 text-xs uppercase tracking-wider flex items-center gap-2">
                        <i class="ri-error-warning-line text-amber-600"></i> Strictly Prohibited Actions
                    </h4>
                    <ul class="space-y-1.5 text-xs text-amber-800 list-disc list-inside">
                        <li>Distributing malware, phishing payloads, or malicious scripts through editor media uploads.</li>
                        <li>Attempting reverse engineering, unauthorized penetration testing, or DDoS attacks against API endpoints.</li>
                        <li>Subverting API rate limits, storage quotas, or project authentication checks.</li>
                        <li>Using RichForge to host or transmit illegal, abusive, defamatory, or harmful content.</li>
                    </ul>
                </div>
            </section>

            <!-- Section 4 -->
            <section id="ip" class="bg-white border border-slate-200/80 rounded-2xl p-6 sm:p-8 shadow-sm space-y-4">
                <div class="flex items-center gap-3">
                    <div class="w-8 h-8 rounded-xl bg-fuchsia-100 text-fuchsia-700 flex items-center justify-center font-bold text-sm font-mono">4</div>
                    <h2 class="text-xl font-bold font-serif text-slate-900">Intellectual Property & Licensing</h2>
                </div>
                <p>
                    <strong>Platform & SDK Ownership:</strong> RichForge and its licensors retain all right, title, and interest in and to the RichForge platform, core editor engine, brand assets, UI designs, and documentation.
                </p>
                <p>
                    <strong>Your Content Ownership:</strong> You retain full ownership of all text, documents, images, and media assets submitted, edited, or uploaded through your application using the RichForge editor. RichForge claims no ownership rights over user content.
                </p>
            </section>

            <!-- Section 5 -->
            <section id="subscriptions" class="bg-white border border-slate-200/80 rounded-2xl p-6 sm:p-8 shadow-sm space-y-4">
                <div class="flex items-center gap-3">
                    <div class="w-8 h-8 rounded-xl bg-fuchsia-100 text-fuchsia-700 flex items-center justify-center font-bold text-sm font-mono">5</div>
                    <h2 class="text-xl font-bold font-serif text-slate-900">Subscriptions & Billing</h2>
                </div>
                <p>
                    RichForge offers free and paid subscription plans. Subscriptions are billed in advance on a recurring monthly or annual basis. Fees are non-refundable except as required by law or as expressly specified in your service plan contract.
                </p>
            </section>

            <!-- Section 6 -->
            <section id="disclaimers" class="bg-white border border-slate-200/80 rounded-2xl p-6 sm:p-8 shadow-sm space-y-4">
                <div class="flex items-center gap-3">
                    <div class="w-8 h-8 rounded-xl bg-fuchsia-100 text-fuchsia-700 flex items-center justify-center font-bold text-sm font-mono">6</div>
                    <h2 class="text-xl font-bold font-serif text-slate-900">Disclaimers & Limitation of Liability</h2>
                </div>
                <p class="uppercase text-xs tracking-wider text-slate-500 font-bold">
                    Services Provided "AS IS"
                </p>
                <p>
                    The RichForge services and software are provided on an "as is" and "as available" basis without warranties of any kind, whether express, implied, or statutory. RichForge disclaims all warranties of merchantability, fitness for a particular purpose, and non-infringement.
                </p>
                <p>
                    In no event shall RichForge or its affiliates be liable for any indirect, incidental, consequential, special, or punitive damages arising out of your use of or inability to use the platform services.
                </p>
            </section>

            <!-- Section 7 -->
            <section id="termination" class="bg-white border border-slate-200/80 rounded-2xl p-6 sm:p-8 shadow-sm space-y-4">
                <div class="flex items-center gap-3">
                    <div class="w-8 h-8 rounded-xl bg-fuchsia-100 text-fuchsia-700 flex items-center justify-center font-bold text-sm font-mono">7</div>
                    <h2 class="text-xl font-bold font-serif text-slate-900">Termination & Changes to Terms</h2>
                </div>
                <p>
                    We reserve the right to modify these terms at any time. We will provide reasonable notice of material updates via email or dashboard announcements. Continued use of the platform following updates constitutes acceptance of the revised terms.
                </p>
            </section>

            <!-- Bottom Contact Callout -->
            <div class="bg-gradient-to-r from-fuchsia-600 to-indigo-700 text-white rounded-2xl p-6 sm:p-8 shadow-lg flex flex-col sm:flex-row items-center justify-between gap-6">
                <div class="space-y-1 text-center sm:text-left">
                    <h3 class="text-lg font-bold font-serif">Have questions regarding our Terms?</h3>
                    <p class="text-xs text-fuchsia-100">Our legal and compliance team is ready to answer your questions.</p>
                </div>
                <a href="{{ route('public.contact') }}" class="px-6 py-3 bg-white text-slate-900 hover:bg-slate-100 font-bold text-xs rounded-xl shadow-md transition-all flex items-center gap-2 flex-shrink-0">
                    <i class="ri-mail-line text-fuchsia-600"></i> Contact Us
                </a>
            </div>

        </main>
    </div>
</div>
@endsection
