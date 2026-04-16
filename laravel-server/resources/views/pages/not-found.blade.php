@extends('layouts.app')
@section('title', '404 - Page Not Found')

@section('content')
<div class="page-empty-state">
    <div class="page-empty-card">
        <div class="text-8xl font-bold mb-4" style="color: var(--dxn-gold);">404</div>
        <h1 class="text-2xl font-bold mb-2">Page Not Found</h1>
        <p class="mb-6" style="color: rgba(255,255,255,0.74);">The page you're looking for doesn't exist or has been moved.</p>
        <a href="{{ route('home') }}" class="btn-primary">Go Home</a>
    </div>
</div>
@endsection
