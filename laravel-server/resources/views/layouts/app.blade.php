<!DOCTYPE html>
<html lang="{{ session('lang', 'en') }}" dir="{{ session('lang') === 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', $settings->seo['pageTitle'] ?? 'Freedom with DXN')</title>
    <meta name="description" content="@yield('description', $settings->seo['description'] ?? '')">
    <meta name="keywords" content="@yield('keywords', $settings->seo['keywords'] ?? '')">
    <link rel="canonical" href="{{ url()->current() }}">

    {{-- Open Graph --}}
    <meta property="og:title" content="@yield('title', $settings->seo['pageTitle'] ?? 'Freedom with DXN')">
    <meta property="og:description" content="@yield('description', $settings->seo['description'] ?? '')">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:site_name" content="Freedom with DXN">
    <meta property="og:type" content="@yield('og_type', 'website')">
    @hasSection('og_image')
        <meta property="og:image" content="@yield('og_image')">
    @else
        <meta property="og:image" content="{{ url('/logo.png') }}">
    @endif

    {{-- Twitter Card --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('title', $settings->seo['pageTitle'] ?? 'Freedom with DXN')">
    <meta name="twitter:description" content="@yield('description', $settings->seo['description'] ?? '')">

    @stack('seo')
    <link rel="icon" type="image/png" href="/favicon.png">

    {{-- Self-hosted DM Sans font (no Google Fonts request) --}}
    <style>
        @font-face { font-family: 'DM Sans'; font-style: normal; font-weight: 400; font-display: optional; src: url('/fonts/dm-sans-latin.woff2') format('woff2'); }
        @font-face { font-family: 'DM Sans'; font-style: normal; font-weight: 500; font-display: optional; src: url('/fonts/dm-sans-latin.woff2') format('woff2'); }
        @font-face { font-family: 'DM Sans'; font-style: normal; font-weight: 600; font-display: optional; src: url('/fonts/dm-sans-latin.woff2') format('woff2'); }
        @font-face { font-family: 'DM Sans'; font-style: normal; font-weight: 700; font-display: optional; src: url('/fonts/dm-sans-latin.woff2') format('woff2'); }
    </style>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Color overrides (bypasses Vite build) --}}
    <style>
        :root {
            --brand-green: #236b43;
            --brand-green-light: #43af73;
            --brand-green-dark: #1a5535;
            --brand-red: #bf3c36;
            --brand-red-dark: #a3322d;
            --brand-violet: #452aa8;
            --brand-violet-dark: #3a2290;
            --color-brand-green: #236b43;
        }
        .text-brand-green { color: #236b43 !important; }
        .text-dxn-green { color: #236b43 !important; }
        .btn-secondary { background-color: #236b43 !important; color: #fff !important; }
        .btn-secondary:hover { background-color: #1a5535 !important; }
        .hover-green { background-color: #236b43 !important; }
        .hover-green:hover { background-color: #1a5535 !important; }
        .hover-violet { background-color: #452aa8 !important; }
        .hover-violet:hover { background-color: #3a2290 !important; }
        .hover-whatsapp { background-color: #1a8d45 !important; }
        .hover-whatsapp:hover { background-color: #15753a !important; }
        .footer-social { color: #452aa8 !important; transition: color 0.2s; }
        .footer-social:hover { color: #236b43 !important; }
        .footer-link { color: #452aa8 !important; font-weight: 600; transition: color 0.2s; }
        .footer-link:hover { color: #236b43 !important; }
        .product-card-hover { box-shadow: inset 0 0 0 0 #bf3c36, 0 1px 8px rgba(0,0,0,0.06); transition: box-shadow 0.3s, transform 0.3s; }
        .product-card-hover:hover { box-shadow: inset 0 -4px 0 0 #bf3c36, 0 8px 30px rgba(0,0,0,0.12); transform: translateY(-4px); }
        .btn-outline-white { border: 2px solid #fff; color: #fff; background: transparent; padding: 10px 24px; border-radius: 12px; font-weight: 600; transition: all 0.2s; }
        .btn-outline-white:hover { background-color: #fff; color: #452aa8; }
        .btn-outline-violet { border: 2px solid #452aa8; color: #452aa8; background: transparent; transition: all 0.2s; }
        .btn-outline-violet:hover { background-color: #452aa8; color: #fff; }
    </style>
    @stack('styles')
</head>
<body class="min-h-screen flex flex-col">
    @include('partials.navbar')

    {{-- Flash Messages --}}
    @if(session('success'))
        <div class="max-w-4xl mx-auto mt-4 px-4">
            <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg flex items-center justify-between" x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 4000)">
                <span>{{ session('success') }}</span>
                <button @click="show = false" class="text-green-500 hover:text-green-700">&times;</button>
            </div>
        </div>
    @endif
    @if(session('error'))
        <div class="max-w-4xl mx-auto mt-4 px-4">
            <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg flex items-center justify-between" x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 4000)">
                <span>{{ session('error') }}</span>
                <button @click="show = false" class="text-red-500 hover:text-red-700">&times;</button>
            </div>
        </div>
    @endif
    @if($errors->any())
        <div class="max-w-4xl mx-auto mt-4 px-4">
            <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg">
                <ul class="list-disc list-inside">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif

    <main class="flex-1">
        @yield('content')
    </main>

    @include('partials.footer')
    @include('partials.whatsapp-float')

    @stack('scripts')
</body>
</html>
