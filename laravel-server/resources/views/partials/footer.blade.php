@php
    $lang = session('lang', 'en');
    $contact = $settings->contact ?? [];
    $social = $settings->social ?? [];
    $footer = $settings->footer ?? [];
@endphp

<footer class="bg-dxn-darkgreen text-gray-300">
    <div class="max-w-7xl mx-auto px-4 py-12 grid grid-cols-1 md:grid-cols-4 gap-8">
        {{-- Brand --}}
        <div class="col-span-1 md:col-span-1">
            <div class="flex items-center gap-2 mb-4">
                <img src="/logo.png" alt="Grow with DXN" class="h-10 w-auto object-contain">
            </div>
            <p class="text-sm text-gray-400 mb-4">
                {{ $footer['description'] ?? "Your trusted DXN distributor. We help you achieve health and financial freedom through DXN's world-class products." }}
            </p>
            <div class="flex gap-3">
                @if(!empty($social['facebook']))
                    <a href="{{ $social['facebook'] }}" target="_blank" rel="noopener noreferrer" class="text-gray-400 hover:text-dxn-gold transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg>
                    </a>
                @endif
                @if(!empty($social['instagram']))
                    <a href="{{ $social['instagram'] }}" target="_blank" rel="noopener noreferrer" class="text-gray-400 hover:text-dxn-gold transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/></svg>
                    </a>
                @endif
                @if(!empty($social['youtube']))
                    <a href="{{ $social['youtube'] }}" target="_blank" rel="noopener noreferrer" class="text-gray-400 hover:text-dxn-gold transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22.54 6.42a2.78 2.78 0 0 0-1.94-2C18.88 4 12 4 12 4s-6.88 0-8.6.46a2.78 2.78 0 0 0-1.94 2A29 29 0 0 0 1 11.75a29 29 0 0 0 .46 5.33A2.78 2.78 0 0 0 3.4 19.13C5.12 19.56 12 19.56 12 19.56s6.88 0 8.6-.46a2.78 2.78 0 0 0 1.94-2 29 29 0 0 0 .46-5.25 29 29 0 0 0-.46-5.43z"/><polygon points="9.75 15.02 15.5 11.75 9.75 8.48 9.75 15.02"/></svg>
                    </a>
                @endif
            </div>
        </div>

        {{-- Quick Links --}}
        <div>
            <h3 class="text-white font-semibold mb-4">{{ $lang === 'ar' ? 'روابط سريعة' : 'Quick Links' }}</h3>
            <ul class="space-y-2 text-sm">
                <li><a href="{{ route('home') }}" class="text-gray-400 hover:text-dxn-gold transition-colors">{{ $lang === 'ar' ? 'الرئيسية' : 'Home' }}</a></li>
                <li><a href="{{ route('products') }}" class="text-gray-400 hover:text-dxn-gold transition-colors">{{ $lang === 'ar' ? 'المنتجات' : 'Products' }}</a></li>
                <li><a href="{{ route('business') }}" class="text-gray-400 hover:text-dxn-gold transition-colors">{{ $lang === 'ar' ? 'فرصة عمل' : 'Business Opportunity' }}</a></li>
                <li><a href="{{ route('blog') }}" class="text-gray-400 hover:text-dxn-gold transition-colors">{{ $lang === 'ar' ? 'المدونة' : 'Blog' }}</a></li>
                <li><a href="{{ route('contact') }}" class="text-gray-400 hover:text-dxn-gold transition-colors">{{ $lang === 'ar' ? 'اتصل بنا' : 'Contact Us' }}</a></li>
            </ul>
        </div>

        {{-- Products --}}
        <div>
            <h3 class="text-white font-semibold mb-4">{{ $lang === 'ar' ? 'المنتجات' : 'Products' }}</h3>
            <ul class="space-y-2 text-sm">
                @foreach([
                    ['label' => 'Ganoderma', 'cat' => 'ganoderma'],
                    ['label' => 'DXN Coffee', 'cat' => 'coffee'],
                    ['label' => 'Health Supplements', 'cat' => 'supplements'],
                    ['label' => 'Skincare', 'cat' => 'skincare'],
                    ['label' => 'Beverages', 'cat' => 'beverages'],
                ] as $item)
                    <li><a href="{{ route('products', ['category' => $item['cat']]) }}" class="text-gray-400 hover:text-dxn-gold transition-colors">{{ $item['label'] }}</a></li>
                @endforeach
            </ul>
        </div>

        {{-- Contact --}}
        <div>
            <h3 class="text-white font-semibold mb-4">{{ $lang === 'ar' ? 'اتصل بنا' : 'Contact' }}</h3>
            <ul class="space-y-3 text-sm">
                <li class="flex items-start gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-dxn-gold mt-0.5 shrink-0"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                    <span class="text-gray-400">{{ $contact['location'] ?? 'United Arab Emirates' }}</span>
                </li>
                <li class="flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-dxn-gold shrink-0"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                    <span class="text-gray-400">{{ $contact['phone'] ?? '+971 50 666 2875' }}</span>
                </li>
                <li class="flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-dxn-gold shrink-0"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                    <span class="text-gray-400">{{ $contact['email'] ?? 'info@freedomwithdxn.com' }}</span>
                </li>
            </ul>
        </div>
    </div>

    <div class="border-t border-dxn-green py-4 text-center text-sm text-gray-500">
        <p>&copy; {{ date('Y') }} {{ $footer['copyright'] ?? 'Freedom with DXN. All rights reserved.' }}</p>
        <p class="text-xs mt-1 text-gray-600">Independent DXN Distributor. DXN is a registered trademark of DXN Holdings Berhad.</p>
    </div>
</footer>
