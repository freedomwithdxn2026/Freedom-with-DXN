@php
    $lang = session('lang', 'en');
    $nb = $settings->navbar ?? [];
    $navLinks = collect([
        ['url' => route('home'),     'label' => $lang === 'ar' ? 'الرئيسية' : 'Home',        'show' => $nb['showHome'] ?? true],
        ['url' => route('about'),    'label' => $lang === 'ar' ? 'من نحن' : 'About',          'show' => $nb['showAbout'] ?? true],
        ['url' => route('products'), 'label' => $lang === 'ar' ? 'المنتجات' : 'Products',     'show' => $nb['showProducts'] ?? true],
        ['url' => route('join'),     'label' => $lang === 'ar' ? 'انضم لـ DXN' : 'Join DXN',  'show' => $nb['showJoin'] ?? true],
        ['url' => route('zoom'),     'label' => $lang === 'ar' ? 'تدريب زوم' : 'Zoom Training','show' => $nb['showZoom'] ?? true],
        ['url' => route('blog'),     'label' => $lang === 'ar' ? 'المدونة' : 'Blog',          'show' => $nb['showBlog'] ?? true],
        ['url' => route('contact'),  'label' => $lang === 'ar' ? 'اتصل بنا' : 'Contact',     'show' => $nb['showContact'] ?? true],
    ])->where('show', true);
    $cartCount = count(session('cart', []));
@endphp

<nav class="bg-dxn-green shadow-lg sticky top-0 z-50" x-data="{ menuOpen: false, dropdownOpen: false }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-20">
            {{-- Logo --}}
            <a href="{{ route('home') }}" class="flex items-center gap-2 shrink-0">
                <img src="/logo.png" alt="Grow with DXN" class="h-14 w-auto object-contain">
            </a>

            {{-- Desktop Nav --}}
            <div class="hidden lg:flex items-center gap-5">
                @foreach($navLinks as $link)
                    <a href="{{ $link['url'] }}"
                       class="text-sm font-medium transition-colors whitespace-nowrap {{ request()->url() === $link['url'] ? 'text-dxn-gold font-bold' : 'text-white hover:text-dxn-gold' }}">
                        {{ $link['label'] }}
                    </a>
                @endforeach
            </div>

            {{-- Right side --}}
            <div class="flex items-center gap-3 shrink-0">
                {{-- Language Toggle --}}
                <a href="{{ route('lang.switch', $lang === 'en' ? 'ar' : 'en') }}"
                   class="flex items-center gap-1 bg-white/10 hover:bg-white/20 text-white text-xs font-bold px-3 py-1.5 rounded-full transition-colors border border-white/20">
                    {{ $lang === 'en' ? '🇦🇪 AR' : '🇬🇧 EN' }}
                </a>

                {{-- Cart --}}
                <a href="{{ route('cart') }}" class="relative text-white hover:text-dxn-gold transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"/></svg>
                    @if($cartCount > 0)
                        <span class="absolute -top-2 -right-2 bg-dxn-gold text-white text-xs rounded-full w-5 h-5 flex items-center justify-center font-bold">
                            {{ $cartCount }}
                        </span>
                    @endif
                </a>

                {{-- Auth --}}
                @auth
                    <div class="relative" @click.outside="dropdownOpen = false">
                        <button @click="dropdownOpen = !dropdownOpen"
                                class="flex items-center gap-2 text-white hover:text-dxn-gold transition-colors">
                            <div class="w-8 h-8 bg-dxn-gold rounded-full flex items-center justify-center text-white font-bold text-sm">
                                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                            </div>
                        </button>
                        <div x-show="dropdownOpen" x-transition class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-xl py-2 z-50">
                            <div class="px-4 py-2 border-b">
                                <p class="font-semibold text-gray-800 text-sm">{{ auth()->user()->name }}</p>
                                <p class="text-gray-500 text-xs">{{ auth()->user()->role }}</p>
                            </div>
                            <a href="{{ route('dashboard') }}" class="flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg>
                                {{ $lang === 'ar' ? 'لوحة التحكم' : 'Dashboard' }}
                            </a>
                            @if(auth()->user()->role === 'admin')
                                <a href="{{ route('admin.index') }}" class="flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                                    {{ $lang === 'ar' ? 'لوحة الإدارة' : 'Admin Panel' }}
                                </a>
                            @endif
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="w-full flex items-center gap-2 px-4 py-2 text-sm text-red-600 hover:bg-gray-100">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg>
                                    {{ $lang === 'ar' ? 'تسجيل الخروج' : 'Logout' }}
                                </button>
                            </form>
                        </div>
                    </div>
                @else
                    <div class="hidden md:flex items-center gap-2">
                        <a href="{{ route('login') }}" class="text-white hover:text-dxn-gold text-sm font-medium transition-colors">
                            {{ $lang === 'ar' ? 'تسجيل الدخول' : 'Login' }}
                        </a>
                        <a href="{{ route('join') }}" class="bg-dxn-gold text-white px-4 py-2 rounded-lg text-sm font-semibold hover:bg-dxn-lightgold transition-colors whitespace-nowrap">
                            {{ $lang === 'ar' ? 'انضم الآن' : 'Join Now' }}
                        </a>
                    </div>
                @endauth

                {{-- Mobile menu button --}}
                <button @click="menuOpen = !menuOpen" class="lg:hidden text-white hover:text-dxn-gold">
                    <svg x-show="!menuOpen" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="3" y1="12" x2="21" y2="12"/><line x1="3" y1="6" x2="21" y2="6"/><line x1="3" y1="18" x2="21" y2="18"/></svg>
                    <svg x-show="menuOpen" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
                </button>
            </div>
        </div>

        {{-- Mobile Menu --}}
        <div x-show="menuOpen" x-transition class="lg:hidden pb-4 border-t border-dxn-gold/30 mt-2">
            <div class="flex flex-col gap-1 pt-3">
                @foreach($navLinks as $link)
                    <a href="{{ $link['url'] }}" class="text-white hover:text-dxn-gold px-2 py-2 text-sm font-medium">
                        {{ $link['label'] }}
                    </a>
                @endforeach
                @guest
                    <a href="{{ route('login') }}" class="text-white hover:text-dxn-gold px-2 py-2 text-sm">
                        {{ $lang === 'ar' ? 'تسجيل الدخول' : 'Login' }}
                    </a>
                    <a href="{{ route('join') }}" class="bg-dxn-gold text-white px-4 py-2 rounded-lg text-sm font-semibold text-center mt-2">
                        {{ $lang === 'ar' ? 'انضم الآن' : 'Join Now' }}
                    </a>
                @endguest
            </div>
        </div>
    </div>
</nav>
