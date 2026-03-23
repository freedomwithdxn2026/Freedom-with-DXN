@extends('layouts.app')
@section('title', 'Register - Freedom with DXN')

@section('content')
<div class="min-h-screen bg-gray-50 flex items-center justify-center px-4 py-12">
    <div class="w-full max-w-lg">
        <div class="text-center mb-8">
            <div class="w-16 h-16 bg-dxn-green rounded-full flex items-center justify-center text-white font-bold text-xl mx-auto mb-4">DXN</div>
            <h1 class="text-2xl font-bold text-dxn-darkgreen">Create Your Account</h1>
            <p class="text-gray-500 mt-1">Join our growing DXN distributor community</p>
            @if(request('ref') ?? ($ref ?? ''))
                <div class="mt-3 bg-green-50 border border-green-200 rounded-lg px-4 py-2 text-sm text-dxn-green">
                    You were referred by code: <strong>{{ request('ref') ?? $ref }}</strong>
                </div>
            @endif
        </div>

        <div class="bg-white rounded-2xl shadow-lg p-8">
            <form method="POST" action="{{ route('register') }}" class="space-y-4">
                @csrf
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Full Name *</label>
                        <input type="text" name="name" required value="{{ old('name') }}" class="input-field" placeholder="John Doe">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Phone Number</label>
                        <input type="tel" name="phone" value="{{ old('phone') }}" class="input-field" placeholder="+1 234 567 890">
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Email Address *</label>
                    <input type="email" name="email" required value="{{ old('email') }}" class="input-field" placeholder="you@example.com">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Country</label>
                    <input type="text" name="country" value="{{ old('country') }}" class="input-field" placeholder="Your country">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Password *</label>
                    <input type="password" name="password" required class="input-field" placeholder="Min 6 characters">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Confirm Password *</label>
                    <input type="password" name="password_confirmation" required class="input-field" placeholder="Confirm password">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Referral Code (optional)</label>
                    <input type="text" name="referral_code" value="{{ old('referral_code', request('ref') ?? '') }}" class="input-field" placeholder="Enter referral code">
                </div>
                <button type="submit" class="btn-primary w-full mt-2">Create Free Account</button>
            </form>

            <p class="text-center text-sm text-gray-500 mt-6">
                Already have an account?
                <a href="{{ route('login') }}" class="text-dxn-green font-semibold hover:underline">Sign in</a>
            </p>
        </div>
    </div>
</div>
@endsection
