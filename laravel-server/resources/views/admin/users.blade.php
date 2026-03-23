@extends('layouts.app')
@section('title', 'Manage Users - Admin')

@section('content')
<div class="max-w-6xl mx-auto px-4 py-8">
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold text-dxn-darkgreen">Users</h1>
        <a href="{{ route('admin.index') }}" class="text-dxn-green hover:underline text-sm">← Back to Admin</a>
    </div>

    <div class="card overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-gray-50"><tr><th class="px-4 py-3 text-left">Name</th><th class="px-4 py-3 text-left">Email</th><th class="px-4 py-3 text-left">Role</th><th class="px-4 py-3 text-left">Referral Code</th><th class="px-4 py-3 text-left">Joined</th></tr></thead>
            <tbody>
                @foreach($users as $user)
                    <tr class="border-t">
                        <td class="px-4 py-3 font-medium">{{ $user->name }}</td>
                        <td class="px-4 py-3 text-gray-500">{{ $user->email }}</td>
                        <td class="px-4 py-3"><span class="badge {{ $user->role === 'admin' ? 'bg-purple-100 text-purple-700' : ($user->role === 'distributor' ? 'bg-blue-100 text-blue-700' : 'bg-gray-100 text-gray-700') }}">{{ ucfirst($user->role) }}</span></td>
                        <td class="px-4 py-3 text-dxn-gold font-mono text-xs">{{ $user->referral_code }}</td>
                        <td class="px-4 py-3 text-gray-500">{{ $user->created_at->format('M d, Y') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="p-4">{{ $users->links() }}</div>
    </div>
</div>
@endsection
