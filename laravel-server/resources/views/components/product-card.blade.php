@props(['product'])

@php
    $lang = session('lang', 'en');
    $mainImage = $product->landing_image ?: ($product->image ?: '');
    $link = $product->landing_page ?: route('products.show', $product);
    $whatsapp = 'https://wa.me/message/EFSQ2IDNVG3YB1';
@endphp

<a href="{{ $link }}" class="card group block overflow-hidden">
    <div class="relative overflow-hidden bg-gray-100 aspect-square">
        @if($mainImage)
            <img src="{{ $mainImage }}" alt="{{ $product->name }}"
                 class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-400">
        @else
            <div class="absolute inset-0 bg-gradient-to-br from-dxn-darkgreen to-dxn-green flex flex-col items-center justify-center p-4 text-center">
                <span class="text-dxn-gold text-4xl font-bold mb-2">DXN</span>
                <span class="text-white/90 text-sm font-medium leading-tight">{{ $product->name }}</span>
            </div>
        @endif

        @if($product->featured)
            <span class="absolute top-2 left-2 bg-dxn-gold text-white text-xs px-2 py-1 rounded-full font-semibold z-10">
                Featured
            </span>
        @endif

        @if(!$product->in_stock)
            <div class="absolute inset-0 bg-black/50 flex items-center justify-center z-10">
                <span class="text-white font-bold text-lg">Out of Stock</span>
            </div>
        @endif
    </div>
    <div class="p-4">
        <span class="text-xs text-dxn-green font-medium uppercase tracking-wide">{{ $product->category }}</span>
        <h3 class="font-semibold text-gray-800 mt-1 mb-1 line-clamp-2 group-hover:text-dxn-green transition-colors">
            {{ $product->name }}
        </h3>
        <div class="flex items-center gap-1 mb-3">
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="#facc15" stroke="#facc15" stroke-width="2"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
            <span class="text-sm text-gray-500">{{ number_format($product->rating ?? 0, 1) }}</span>
        </div>
        <div class="flex items-center justify-between">
            <span class="text-dxn-darkgreen font-bold text-lg">${{ number_format($product->price, 2) }}</span>
            <a href="{{ $whatsapp }}" target="_blank" rel="noopener noreferrer"
               onclick="event.stopPropagation()"
               class="flex items-center gap-1 bg-[#dfc378] text-[#16392d] px-3 py-2 rounded-lg text-sm font-medium hover:bg-[#dcca8b] transition-colors {{ !$product->in_stock ? 'opacity-50 pointer-events-none' : '' }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/></svg>
                {{ $lang === 'ar' ? 'اطلب' : 'Order' }}
            </a>
        </div>
    </div>
</a>
