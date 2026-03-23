@extends('layouts.app')

@php
    $lang = session('lang', 'en');
    $hero = $settings->hero ?? [];
    $whatsapp = $settings->contact['whatsapp'] ?? 'https://wa.me/message/EFSQ2IDNVG3YB1';

    $why = $lang === 'ar'
        ? ['تكلفة بداية منخفضة', 'منتجات غانودرما عالمية', 'عمل عالمي واحد', 'دخل سلبي عبر الشبكة', 'تدريب مجاني', 'لا حصة شهرية']
        : ['Low startup cost', 'World-class Ganoderma products', 'One-world one-market', 'Passive income via downline', 'Free training', 'No monthly quota'];

    $testi = $lang === 'ar' ? [
        ['name' => 'سارة م.', 'role' => 'موزعة ماسية', 'text' => 'غيّرت DXN حياتي. حسّنت صحتي وأصبحت أكسب دخلاً كاملاً.', 'avatar' => 'س'],
        ['name' => 'جيمس ك.', 'role' => 'موزع ذهبي', 'text' => 'بنيت فريقاً من أكثر من 50 موزعاً. أفضل قرار!', 'avatar' => 'ج'],
        ['name' => 'ماريا ل.', 'role' => 'عضوة نجمة ياقوتية', 'text' => 'القهوة رائعة وفريقي يتنامى كل شهر!', 'avatar' => 'م'],
    ] : [
        ['name' => 'Sarah M.', 'role' => 'Diamond Distributor', 'text' => 'DXN changed my life. Ganoderma improved my health and I earn full-time income.', 'avatar' => 'S'],
        ['name' => 'James K.', 'role' => 'Gold Distributor', 'text' => 'Built a team of 50+ distributors. Best decision ever!', 'avatar' => 'J'],
        ['name' => 'Maria L.', 'role' => 'Star Ruby', 'text' => 'The coffee is amazing and my downline keeps growing!', 'avatar' => 'M'],
    ];
@endphp

@section('content')
{{-- Hero --}}
<section class="bg-hero min-h-[85vh] flex items-center relative overflow-hidden">
    <div class="absolute inset-0 opacity-10 pointer-events-none" style="background-image: radial-gradient(circle at 30% 50%, #dfc378 0%, transparent 50%)"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
        <div>
            <span class="inline-block bg-dxn-gold/20 text-dxn-gold px-4 py-1 rounded-full text-sm font-medium mb-4">
                {{ $lang === 'ar' ? 'موزع مستقل معتمد من DXN' : ($hero['badge'] ?? 'Independent DXN Distributor') }}
            </span>
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white leading-tight mb-6">
                {{ $lang === 'ar' ? 'نمّ صحتك وثروتك مع DXN' : ($hero['title'] ?? 'Grow Your Health & Wealth with DXN') }}
            </h1>
            <p class="text-gray-300 text-lg mb-8 max-w-lg">
                {{ $lang === 'ar' ? 'اكتشف منتجات الغانودرما المتميزة التي تحوّل صحتك، وفرصة عمل يمكن أن تحوّل حياتك.' : ($hero['subtitle'] ?? 'Discover premium Ganoderma products that transform your health, and a business opportunity that can transform your life.') }}
            </p>
            <div class="flex flex-col sm:flex-row gap-4">
                <a href="{{ $hero['btn1Link'] ?? route('products') }}" class="btn-gold text-center">{{ $hero['btn1Text'] ?? ($lang === 'ar' ? 'تسوق المنتجات' : 'Shop Products') }}</a>
                <a href="{{ $hero['btn2Link'] ?? route('join') }}" class="inline-flex items-center justify-center border-2 border-white text-white hover:bg-white hover:text-dxn-darkgreen px-6 py-3 rounded-lg font-semibold transition-all">
                    {{ $lang === 'ar' ? 'انضم كموزع' : ($hero['btn2Text'] ?? 'Join as a Distributor') }}
                </a>
            </div>
        </div>
        <div class="hidden lg:flex justify-center">
            <div class="w-80 h-80 bg-dxn-gold/20 rounded-full flex items-center justify-center">
                <div class="w-64 h-64 bg-dxn-gold/30 rounded-full flex items-center justify-center">
                    <div class="text-center text-white">
                        <div class="text-6xl font-bold text-dxn-gold">DXN</div>
                        <div class="text-xl mt-2">Ganoderma</div>
                        <div class="text-sm text-gray-300 mt-1">{{ $lang === 'ar' ? 'منذ 1993' : 'Since 1993' }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Stats --}}
<section class="bg-dxn-green py-12">
    <div class="max-w-7xl mx-auto px-4 grid grid-cols-2 md:grid-cols-4 gap-6">
        @foreach([
            ['v' => '180+', 'l' => $lang === 'ar' ? 'دولة' : 'Countries'],
            ['v' => '9M+', 'l' => $lang === 'ar' ? 'عضو' : 'Members'],
            ['v' => '35+', 'l' => $lang === 'ar' ? 'عاماً' : 'Years'],
            ['v' => '1000+', 'l' => $lang === 'ar' ? 'منتج' : 'Products'],
        ] as $stat)
            <div class="text-center text-white">
                <div class="text-3xl font-bold text-dxn-gold">{{ $stat['v'] }}</div>
                <div class="text-gray-300 text-sm">{{ $stat['l'] }}</div>
            </div>
        @endforeach
    </div>
</section>

{{-- Featured Products --}}
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4">
        <h2 class="section-title">{{ $lang === 'ar' ? 'المنتجات المميزة' : 'Featured Products' }}</h2>
        <p class="section-subtitle">{{ $lang === 'ar' ? 'منتجات صحية عالية الجودة مدعومة بالغانودرما' : 'Premium health products powered by Ganoderma Lucidum' }}</p>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($featured as $product)
                @include('components.product-card', ['product' => $product])
            @endforeach
        </div>
        <div class="text-center mt-10">
            <a href="{{ route('products') }}" class="btn-primary inline-flex items-center gap-2">
                {{ $lang === 'ar' ? 'عرض الكل' : 'View All Products' }}
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
            </a>
        </div>
    </div>
</section>

{{-- Bestsellers --}}
@if($bestsellers->count() > 0)
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4">
        <h2 class="section-title">{{ $lang === 'ar' ? 'الأكثر مبيعاً' : 'Bestsellers' }}</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($bestsellers as $product)
                @include('components.product-card', ['product' => $product])
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- Zoom Banner --}}
<section class="py-16 bg-blue-50 border-y border-blue-100">
    <div class="max-w-5xl mx-auto px-4 grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
        <div>
            <div class="inline-flex items-center gap-2 bg-blue-100 text-blue-700 px-4 py-1 rounded-full text-sm font-semibold mb-3">
                {{ $lang === 'ar' ? 'مجاني 100%' : '100% Free' }}
            </div>
            <h2 class="text-2xl md:text-3xl font-bold text-dxn-darkgreen mb-3">
                {{ $lang === 'ar' ? 'احضر جلسة زووم مجانية' : 'Attend a Free Zoom Session' }}
            </h2>
            <p class="text-gray-600 mb-4">
                {{ $lang === 'ar' ? 'تعرف على منتجات DXN وفرصة العمل. جلسات أسبوعية بالعربية والإنجليزية.' : 'Learn about DXN products and the business opportunity. Weekly sessions in Arabic and English.' }}
            </p>
            <div class="flex flex-wrap gap-3">
                <a href="{{ route('zoom') }}" class="inline-flex items-center gap-2 bg-blue-600 text-white font-semibold px-6 py-3 rounded-lg hover:bg-blue-700 transition-all">
                    {{ $lang === 'ar' ? 'عرض الجدول' : 'View Schedule' }}
                </a>
                <a href="{{ $whatsapp }}" target="_blank" class="btn-gold">{{ $lang === 'ar' ? 'احصل على الرابط' : 'Get the Link' }}</a>
            </div>
        </div>
        <div class="grid grid-cols-2 gap-4">
            @foreach([
                ['d' => $lang === 'ar' ? 'الاثنين' : 'Monday', 'b' => $lang === 'ar' ? 'عربي' : 'Arabic'],
                ['d' => $lang === 'ar' ? 'الأربعاء' : 'Wednesday', 'b' => 'English'],
                ['d' => $lang === 'ar' ? 'الجمعة' : 'Friday', 'b' => 'AR/EN'],
                ['d' => $lang === 'ar' ? 'السبت' : 'Saturday', 'b' => 'English'],
            ] as $s)
                <div class="bg-white rounded-xl p-4 border border-blue-100 shadow-sm">
                    <p class="font-bold text-dxn-darkgreen">{{ $s['d'] }}</p>
                    <span class="inline-block bg-blue-50 text-blue-600 text-xs px-2 py-0.5 rounded-full mt-1">{{ $s['b'] }}</span>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Why Join --}}
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
        <div>
            <span class="text-dxn-gold font-semibold text-sm uppercase tracking-widest">{{ $lang === 'ar' ? 'فرصة العمل' : 'Business Opportunity' }}</span>
            <h2 class="text-3xl md:text-4xl font-bold text-dxn-darkgreen mt-2 mb-6">{{ $lang === 'ar' ? 'لماذا تنضم إلى DXN؟' : 'Why Join DXN?' }}</h2>
            <ul class="space-y-3 mb-8">
                @foreach($why as $item)
                    <li class="flex items-start gap-3">
                        <div class="w-5 h-5 bg-dxn-green rounded-full flex items-center justify-center shrink-0 mt-0.5">
                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="3"><polyline points="20 6 9 17 4 12"/></svg>
                        </div>
                        <span class="text-gray-600">{{ $item }}</span>
                    </li>
                @endforeach
            </ul>
            <div class="flex flex-wrap gap-3">
                <a href="{{ route('join') }}" class="btn-primary">{{ $lang === 'ar' ? 'انضم كموزع' : 'Join as Distributor' }}</a>
                <a href="{{ $whatsapp }}" target="_blank" class="btn-gold">{{ $lang === 'ar' ? 'اسألني الآن' : 'Ask Me Now' }}</a>
            </div>
        </div>
        <div class="grid grid-cols-2 gap-4">
            @foreach([
                ['t' => $lang === 'ar' ? 'الصحة' : 'Health', 'd' => $lang === 'ar' ? 'حوّل صحتك بالغانودرما' : 'Transform health with Ganoderma', 'c' => 'bg-green-50 border-green-200'],
                ['t' => $lang === 'ar' ? 'الثروة' : 'Wealth', 'd' => $lang === 'ar' ? 'ابنِ دخلاً سلبياً' : 'Build passive income', 'c' => 'bg-yellow-50 border-yellow-200'],
                ['t' => $lang === 'ar' ? 'الشبكة' : 'Network', 'd' => $lang === 'ar' ? 'مجتمع موزعين عالمي' : 'Global distributor community', 'c' => 'bg-blue-50 border-blue-200'],
                ['t' => $lang === 'ar' ? 'الحرية' : 'Freedom', 'd' => $lang === 'ar' ? 'اعمل وفق جدولك' : 'Work on your schedule', 'c' => 'bg-purple-50 border-purple-200'],
            ] as $card)
                <div class="p-6 rounded-xl border-2 {{ $card['c'] }}">
                    <h3 class="font-bold text-dxn-darkgreen text-xl mb-2">{{ $card['t'] }}</h3>
                    <p class="text-gray-600 text-sm">{{ $card['d'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Testimonials --}}
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4">
        <h2 class="section-title">{{ $lang === 'ar' ? 'قصص النجاح' : 'Success Stories' }}</h2>
        <p class="section-subtitle">{{ $lang === 'ar' ? 'أشخاص حقيقيون. نتائج حقيقية.' : 'Real people. Real results.' }}</p>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($testi as $t)
                <div class="card p-6">
                    <div class="flex items-center gap-1 mb-4">
                        @for($i = 0; $i < 5; $i++)
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="#facc15" stroke="#facc15" stroke-width="2"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                        @endfor
                    </div>
                    <p class="text-gray-600 italic mb-6">"{{ $t['text'] }}"</p>
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-dxn-green rounded-full flex items-center justify-center text-white font-bold">{{ $t['avatar'] }}</div>
                        <div>
                            <p class="font-semibold text-gray-800">{{ $t['name'] }}</p>
                            <p class="text-sm text-dxn-gold">{{ $t['role'] }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- CTA Banner --}}
<section class="bg-hero py-20">
    <div class="max-w-4xl mx-auto px-4 text-center">
        <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">{{ $lang === 'ar' ? 'هل أنت مستعد للبدء؟' : 'Ready to Get Started?' }}</h2>
        <p class="text-gray-300 text-lg mb-8">{{ $lang === 'ar' ? 'انضم لآلاف الأشخاص الذين حوّلوا صحتهم وحياتهم مع DXN' : 'Join thousands who have transformed their health and lives with DXN' }}</p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('join') }}" class="btn-gold">{{ $lang === 'ar' ? 'انضم مجاناً' : 'Join For Free' }}</a>
            <a href="{{ $whatsapp }}" target="_blank" class="btn-gold">WhatsApp Us</a>
            <a href="{{ route('zoom') }}" class="inline-flex items-center justify-center gap-2 border-2 border-white text-white hover:bg-white hover:text-dxn-darkgreen px-6 py-3 rounded-lg font-semibold transition-all">
                {{ $lang === 'ar' ? 'احضر زووم' : 'Free Zoom' }}
            </a>
        </div>
    </div>
</section>
@endsection
