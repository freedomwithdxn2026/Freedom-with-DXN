@extends('layouts.app')
@section('title', 'Manage Orders - Admin')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold text-dxn-darkgreen">Orders</h1>
        <a href="{{ route('admin.index') }}" class="text-dxn-green hover:underline text-sm">← Back to Admin</a>
    </div>

    <div class="card overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-gray-50"><tr><th class="px-4 py-3 text-left">Order #</th><th class="px-4 py-3 text-left">Customer</th><th class="px-4 py-3 text-left">Total</th><th class="px-4 py-3 text-left">Status</th><th class="px-4 py-3 text-left">Date</th><th class="px-4 py-3 text-left">Action</th></tr></thead>
            <tbody>
                @forelse($orders as $order)
                    <tr class="border-t">
                        <td class="px-4 py-3 font-medium">#{{ $order->id }}</td>
                        <td class="px-4 py-3">{{ $order->user->name ?? 'N/A' }}</td>
                        <td class="px-4 py-3">${{ number_format($order->total_amount, 2) }}</td>
                        <td class="px-4 py-3">
                            <span class="badge {{ $order->status === 'delivered' ? 'bg-green-100 text-green-700' : ($order->status === 'cancelled' ? 'bg-red-100 text-red-700' : 'bg-yellow-100 text-yellow-700') }}">{{ ucfirst($order->status) }}</span>
                        </td>
                        <td class="px-4 py-3 text-gray-500">{{ $order->created_at->format('M d, Y') }}</td>
                        <td class="px-4 py-3">
                            <form method="POST" action="{{ route('admin.orders.status', $order) }}" class="flex items-center gap-2">
                                @csrf @method('PUT')
                                <select name="status" class="text-xs border rounded px-2 py-1">
                                    @foreach(['pending','processing','shipped','delivered','cancelled'] as $s)
                                        <option value="{{ $s }}" {{ $order->status === $s ? 'selected' : '' }}>{{ ucfirst($s) }}</option>
                                    @endforeach
                                </select>
                                <button type="submit" class="text-dxn-green text-xs font-medium hover:underline">Update</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6" class="px-4 py-8 text-center text-gray-400">No orders yet.</td></tr>
                @endforelse
            </tbody>
        </table>
        <div class="p-4">{{ $orders->links() }}</div>
    </div>
</div>
@endsection
