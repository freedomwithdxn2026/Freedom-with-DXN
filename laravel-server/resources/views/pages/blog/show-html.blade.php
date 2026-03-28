@extends('layouts.app')
@section('title', $blog->title . ' - Freedom with DXN')

@section('content')
<div style="width: 100%; background: #faf6ef;">
    <iframe
        src="{{ route('blog.show.raw', $blog) }}"
        style="width: 100%; border: none; min-height: 100vh;"
        id="blog-frame"
        title="{{ $blog->title }}"
    ></iframe>
</div>

<script>
    // Auto-resize iframe to fit content
    const frame = document.getElementById('blog-frame');
    frame.addEventListener('load', function() {
        try {
            const h = frame.contentWindow.document.documentElement.scrollHeight;
            frame.style.height = h + 'px';
        } catch(e) {
            frame.style.height = '200vh';
        }
    });
</script>
@endsection
