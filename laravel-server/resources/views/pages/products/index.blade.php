@extends('layouts.app')
@section('title', 'Products - Freedom with DXN')

@php
    $lang = session('lang', 'en');
    $currentCategory = request('category', 'all');
    $currentSort = request('sort', 'default');
    $currentSearch = request('search', '');
    $catLabels = [
        'all' => 'All Products', 'coffee' => 'Coffee', 'beverages' => 'Beverages',
        'supplements' => 'Supplements', 'personal-care' => 'Personal Care',
        'skincare' => 'Skin Care', 'ganoderma' => 'Ganoderma', 'other' => 'Other',
    ];
    $catIcons = [
        'all' => '🌿', 'coffee' => '☕', 'beverages' => '🧃', 'supplements' => '💊',
        'personal-care' => '🧴', 'skincare' => '✨', 'ganoderma' => '🍄', 'other' => '📦',
    ];
@endphp

@section('content')
{{-- Header --}}
<div class="bg-dxn-darkgreen py-14 px-4">
    <div class="max-w-7xl mx-auto text-center">
        <span class="inline-block bg-dxn-gold/20 text-dxn-gold px-4 py-1 rounded-full text-sm font-medium mb-4">Official DXN Products</span>
        <h1 class="text-3xl md:text-4xl font-bold text-white mb-2">DXN Product Catalog</h1>
        <p class="text-gray-300">Premium health products powered by Ganoderma Lucidum</p>
    </div>
</div>

{{-- Category Tabs --}}
<div class="bg-white border-b sticky top-20 z-10 shadow-sm">
    <div class="max-w-7xl mx-auto px-4">
        <div class="flex items-center gap-1 overflow-x-auto py-3">
            @foreach($categories as $cat)
                <a href="{{ route('products', array_merge(request()->query(), ['category' => $cat, 'page' => 1])) }}"
                   class="flex items-center gap-1.5 px-4 py-2 rounded-full text-sm font-medium whitespace-nowrap transition-all {{ $currentCategory === $cat ? 'bg-dxn-green text-white shadow-md' : 'bg-gray-100 text-gray-600 hover:bg-gray-200' }}">
                    <span>{{ $catIcons[$cat] ?? '📦' }}</span>
                    {{ $catLabels[$cat] ?? ucfirst($cat) }}
                </a>
            @endforeach
        </div>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 py-8">
    {{-- Search + Sort --}}
    <div class="flex flex-col md:flex-row gap-3 mb-6">
        <form method="GET" action="{{ route('products') }}" class="flex-1 flex gap-2">
            @if($currentCategory !== 'all')
                <input type="hidden" name="category" value="{{ $currentCategory }}">
            @endif
            <input type="hidden" name="sort" value="{{ $currentSort }}">
            <div class="relative flex-1">
                <svg class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
                <input type="text" name="search" value="{{ $currentSearch }}" placeholder="Search products..."
                       class="w-full pl-10 pr-4 py-2.5 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-dxn-green bg-white">
            </div>
            <button type="submit" class="btn-primary px-5 py-2.5 rounded-xl">Search</button>
        </form>

        <select onchange="window.location.href='{{ route('products') }}?category={{ $currentCategory }}&search={{ $currentSearch }}&sort='+this.value"
                class="border border-gray-200 rounded-xl px-3 py-2.5 text-sm bg-white focus:outline-none focus:ring-2 focus:ring-dxn-green">
            <option value="default" {{ $currentSort === 'default' ? 'selected' : '' }}>Default</option>
            <option value="price-low" {{ $currentSort === 'price-low' ? 'selected' : '' }}>Price: Low → High</option>
            <option value="price-high" {{ $currentSort === 'price-high' ? 'selected' : '' }}>Price: High → Low</option>
            <option value="rating" {{ $currentSort === 'rating' ? 'selected' : '' }}>Top Rated</option>
            <option value="name" {{ $currentSort === 'name' ? 'selected' : '' }}>Name A → Z</option>
        </select>
    </div>

    {{-- Results --}}
    <div class="flex items-center justify-between mb-5">
        <h2 class="text-lg font-bold text-dxn-darkgreen">
            {{ $catIcons[$currentCategory] ?? '🌿' }} {{ $catLabels[$currentCategory] ?? 'All Products' }}
            <span class="text-sm font-normal text-gray-400 ml-2">({{ $products->total() }} products)</span>
        </h2>
    </div>

    @if($products->count() > 0)
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @foreach($products as $product)
                @include('components.product-card', ['product' => $product])
            @endforeach
        </div>

        <div class="mt-10">
            {{ $products->links() }}
        </div>
    @else
        <div class="text-center py-24 text-gray-400">
            <div class="text-5xl mb-4">🔍</div>
            <p class="text-xl font-medium">No products found</p>
            <p class="text-sm mt-1">Try a different category or search term</p>
            <a href="{{ route('products') }}" class="mt-4 btn-primary px-6 py-2 inline-block">View All Products</a>
        </div>
    @endif
</div>
@endsection
