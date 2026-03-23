@extends('layouts.app')
@section('title', 'Manage Products - Admin')

@section('content')
<div class="max-w-6xl mx-auto px-4 py-8">
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold text-dxn-darkgreen">Products</h1>
        <a href="{{ route('admin.index') }}" class="text-dxn-green hover:underline text-sm">← Back to Admin</a>
    </div>

    {{-- Add Product Form --}}
    <details class="card p-6 mb-8">
        <summary class="font-bold text-dxn-darkgreen cursor-pointer">+ Add New Product</summary>
        <form method="POST" action="{{ route('admin.products.store') }}" class="mt-4 space-y-4">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div><label class="block text-sm font-medium text-gray-700 mb-1">Name *</label><input type="text" name="name" required class="input-field"></div>
                <div><label class="block text-sm font-medium text-gray-700 mb-1">Category *</label>
                    <select name="category" required class="input-field">
                        @foreach(['coffee','ganoderma','supplements','skincare','beverages','personal-care','other'] as $cat)
                            <option value="{{ $cat }}">{{ ucfirst($cat) }}</option>
                        @endforeach
                    </select>
                </div>
                <div><label class="block text-sm font-medium text-gray-700 mb-1">Price *</label><input type="number" name="price" step="0.01" required class="input-field"></div>
                <div><label class="block text-sm font-medium text-gray-700 mb-1">Image URL</label><input type="text" name="image" class="input-field"></div>
                <div><label class="block text-sm font-medium text-gray-700 mb-1">Landing Image URL</label><input type="text" name="landing_image" class="input-field"></div>
                <div><label class="block text-sm font-medium text-gray-700 mb-1">Landing Page URL</label><input type="text" name="landing_page" class="input-field"></div>
            </div>
            <div><label class="block text-sm font-medium text-gray-700 mb-1">Description *</label><textarea name="description" required rows="3" class="input-field"></textarea></div>
            <div class="flex items-center gap-4">
                <label class="flex items-center gap-2"><input type="checkbox" name="in_stock" value="1" checked> In Stock</label>
                <label class="flex items-center gap-2"><input type="checkbox" name="featured" value="1"> Featured</label>
            </div>
            <button type="submit" class="btn-primary">Create Product</button>
        </form>
    </details>

    {{-- Products Table --}}
    <div class="card overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-gray-50"><tr><th class="px-4 py-3 text-left">Product</th><th class="px-4 py-3 text-left">Category</th><th class="px-4 py-3 text-left">Price</th><th class="px-4 py-3 text-left">Stock</th><th class="px-4 py-3 text-left">Actions</th></tr></thead>
            <tbody>
                @foreach($products as $product)
                    <tr class="border-t">
                        <td class="px-4 py-3 flex items-center gap-3">
                            <div class="w-10 h-10 bg-gray-100 rounded overflow-hidden shrink-0">
                                @if($product->image)<img src="{{ $product->image }}" class="w-full h-full object-cover">@else<div class="w-full h-full bg-dxn-green flex items-center justify-center text-dxn-gold text-xs font-bold">DXN</div>@endif
                            </div>
                            <span class="font-medium">{{ $product->name }}</span>
                        </td>
                        <td class="px-4 py-3 text-gray-500">{{ ucfirst($product->category) }}</td>
                        <td class="px-4 py-3">${{ number_format($product->price, 2) }}</td>
                        <td class="px-4 py-3"><span class="badge {{ $product->in_stock ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">{{ $product->in_stock ? 'Yes' : 'No' }}</span></td>
                        <td class="px-4 py-3">
                            <form method="POST" action="{{ route('admin.products.destroy', $product) }}" onsubmit="return confirm('Delete this product?')">
                                @csrf @method('DELETE')
                                <button class="text-red-500 hover:text-red-700 text-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="p-4">{{ $products->links() }}</div>
    </div>
</div>
@endsection
