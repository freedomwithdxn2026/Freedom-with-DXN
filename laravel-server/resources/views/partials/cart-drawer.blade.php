@php $lang = session('lang', 'en'); $isAr = $lang === 'ar'; @endphp

{{-- Backdrop --}}
<div x-show="$store.cart.open"
     x-transition:enter="transition ease-out duration-200"
     x-transition:enter-start="opacity-0"
     x-transition:enter-end="opacity-100"
     x-transition:leave="transition ease-in duration-200"
     x-transition:leave-start="opacity-100"
     x-transition:leave-end="opacity-0"
     @click="$store.cart.open = false"
     class="fixed inset-0 z-[60] bg-black/50"
     style="display: none;"></div>

{{-- Drawer --}}
<aside x-show="$store.cart.open"
       x-transition:enter="transform transition ease-out duration-300"
       x-transition:enter-start="{{ $isAr ? '-translate-x-full' : 'translate-x-full' }}"
       x-transition:enter-end="translate-x-0"
       x-transition:leave="transform transition ease-in duration-300"
       x-transition:leave-start="translate-x-0"
       x-transition:leave-end="{{ $isAr ? '-translate-x-full' : 'translate-x-full' }}"
       @keydown.escape.window="$store.cart.open = false"
       class="fixed top-0 {{ $isAr ? 'left-0' : 'right-0' }} h-full w-full sm:w-[28rem] bg-white shadow-2xl z-[70] flex flex-col"
       style="display: none;"
       role="dialog"
       aria-modal="true"
       aria-label="{{ $isAr ? 'عربة التسوق' : 'Shopping cart' }}">

    {{-- Header --}}
    <div class="flex items-center justify-between px-5 py-4 border-b" style="background-color: #452aa8;">
        <h2 class="text-lg font-bold text-white flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                <circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"/>
            </svg>
            {{ $isAr ? 'عربة التسوق' : 'Your Cart' }}
            <span x-text="'(' + $store.cart.count + ')'" class="text-sm opacity-80"></span>
        </h2>
        <button type="button" @click="$store.cart.open = false" aria-label="{{ $isAr ? 'إغلاق' : 'Close' }}" class="text-white hover:text-gray-200 p-1">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
        </button>
    </div>

    {{-- Just-added flash --}}
    <div x-show="$store.cart.justAdded"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 -translate-y-2"
         x-transition:enter-end="opacity-100 translate-y-0"
         class="px-5 py-3 bg-green-50 border-b border-green-200 flex items-center gap-2 text-green-800 text-sm font-medium"
         style="display: none;">
        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="20 6 9 17 4 12"/></svg>
        <span>{{ $isAr ? 'تمت إضافة المنتج إلى السلة' : 'Product added to your cart' }}</span>
    </div>

    {{-- Items --}}
    <div class="flex-1 overflow-y-auto px-5 py-4">
        <template x-if="$store.cart.items.length === 0">
            <div class="text-center py-16 text-gray-500">
                <div class="text-5xl mb-3">🛒</div>
                <p class="font-medium">{{ $isAr ? 'عربتك فارغة' : 'Your cart is empty' }}</p>
                <a href="{{ route('products') }}" class="inline-block mt-4 text-sm font-semibold" style="color: #452aa8;">{{ $isAr ? 'تصفح المنتجات ←' : '→ Browse products' }}</a>
            </div>
        </template>

        <template x-for="item in $store.cart.items" :key="item.id">
            <div class="flex gap-3 py-3 border-b last:border-0">
                <div class="w-20 h-20 shrink-0 rounded-lg bg-gray-50 overflow-hidden flex items-center justify-center">
                    <img :src="item.image" :alt="item.name" class="w-full h-full object-contain" x-show="item.image">
                </div>
                <div class="flex-1 min-w-0">
                    <h3 class="text-sm font-semibold text-gray-800 line-clamp-2" x-text="item.name"></h3>
                    <p class="text-xs text-gray-500 mt-1">
                        <span x-text="item.quantity"></span> × $<span x-text="item.price.toFixed(2)"></span>
                    </p>
                    <p class="text-sm font-bold mt-1" style="color: #236b43;">$<span x-text="item.subtotal.toFixed(2)"></span></p>
                </div>
                <button type="button" @click="$store.cart.remove(item.id)" aria-label="{{ $isAr ? 'إزالة' : 'Remove' }}" class="self-start text-gray-400 hover:text-red-600 p-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="3 6 5 6 21 6"/><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/></svg>
                </button>
            </div>
        </template>
    </div>

    {{-- Footer --}}
    <div x-show="$store.cart.items.length > 0" class="border-t px-5 py-4 space-y-3 bg-gray-50">
        <div class="flex items-center justify-between text-base font-semibold">
            <span>{{ $isAr ? 'المجموع' : 'Subtotal' }}</span>
            <span style="color: #236b43;">$<span x-text="$store.cart.total.toFixed(2)"></span></span>
        </div>
        <a href="{{ route('checkout') }}" class="block w-full text-center text-white font-semibold py-3 rounded-xl transition-all hover:shadow-md" style="background-color: #452aa8;">
            {{ $isAr ? 'إتمام الشراء' : 'Checkout' }}
        </a>
        <a href="{{ route('cart') }}" class="block w-full text-center text-sm font-medium py-2" style="color: #452aa8;">
            {{ $isAr ? 'عرض السلة الكاملة' : 'View full cart' }}
        </a>
    </div>
</aside>
