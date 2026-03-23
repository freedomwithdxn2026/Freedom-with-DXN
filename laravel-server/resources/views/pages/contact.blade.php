@extends('layouts.app')
@section('title', 'Contact - Freedom with DXN')

@php
    $lang = session('lang', 'en');
    $whatsapp = $settings->contact['whatsapp'] ?? 'https://wa.me/message/EFSQ2IDNVG3YB1';
@endphp

@section('content')
{{-- Header --}}
<div class="bg-dxn-darkgreen py-16 px-4 text-center relative overflow-hidden">
    <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(circle at 70% 50%, #dfc378 0%, transparent 60%)"></div>
    <div class="relative">
        <h1 class="text-3xl md:text-4xl font-bold text-white mb-2">{{ $lang === 'ar' ? 'اتصل بنا' : 'Contact Us' }}</h1>
        <p class="text-gray-300">{{ $lang === 'ar' ? 'نحن هنا لمساعدتك' : "We're here to help" }}</p>
    </div>
</div>

{{-- WhatsApp CTA --}}
<div class="bg-[#25D366]/10 border-b border-[#25D366]/20 py-5">
    <div class="max-w-4xl mx-auto px-4 flex flex-col sm:flex-row items-center justify-between gap-4">
        <div>
            <p class="font-bold text-gray-800 text-lg">{{ $lang === 'ar' ? 'تفضّل الحديث المباشر؟' : 'Prefer to chat directly?' }}</p>
            <p class="text-gray-600 text-sm">{{ $lang === 'ar' ? 'أنا متاح على واتساب 7 أيام في الأسبوع.' : "I'm available on WhatsApp 7 days a week." }}</p>
        </div>
        <a href="{{ $whatsapp }}" target="_blank" class="btn-gold flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
            {{ $lang === 'ar' ? 'واتساب مباشر' : 'WhatsApp Direct' }}
        </a>
    </div>
</div>

<div class="max-w-6xl mx-auto px-4 py-16">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
        {{-- Contact Info --}}
        <div class="space-y-6">
            <div>
                <h2 class="text-xl font-bold text-dxn-darkgreen mb-4">{{ $lang === 'ar' ? 'معلومات التواصل' : 'Contact Information' }}</h2>
                <p class="text-gray-600 text-sm leading-relaxed">
                    {{ $lang === 'ar' ? 'سواء أردت تجربة منتجات DXN أو معرفة المزيد عن فرصة العمل أو الانضمام لفريقي — أنا على بعد رسالة!' : "Whether you want to try DXN products, learn about the business opportunity, or join my team — I'm just a message away!" }}
                </p>
            </div>
            @foreach([
                ['label' => $lang === 'ar' ? 'هاتف / واتساب' : 'Phone / WhatsApp', 'value' => $settings->contact['phone'] ?? '+971 50 666 2875'],
                ['label' => $lang === 'ar' ? 'البريد الإلكتروني' : 'Email', 'value' => $settings->contact['email'] ?? 'info@freedomwithdxn.com'],
                ['label' => $lang === 'ar' ? 'الموقع' : 'Location', 'value' => $settings->contact['location'] ?? ($lang === 'ar' ? 'الإمارات العربية المتحدة' : 'United Arab Emirates')],
            ] as $item)
                <div class="flex items-start gap-3">
                    <div class="w-10 h-10 bg-dxn-green/10 rounded-lg flex items-center justify-center shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#16392d" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-700">{{ $item['label'] }}</p>
                        <p class="text-sm text-gray-500">{{ $item['value'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- Form --}}
        <div class="lg:col-span-2 bg-white rounded-2xl shadow-lg p-8">
            <h2 class="text-xl font-bold text-dxn-darkgreen mb-6">{{ $lang === 'ar' ? 'أرسل رسالة' : 'Send a Message' }}</h2>
            <form method="POST" action="{{ route('contact.store') }}" class="space-y-4">
                @csrf
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">{{ $lang === 'ar' ? 'الاسم الكامل *' : 'Full Name *' }}</label>
                        <input type="text" name="name" required value="{{ old('name') }}" class="input-field" placeholder="{{ $lang === 'ar' ? 'أدخل اسمك' : 'John Doe' }}">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">{{ $lang === 'ar' ? 'البريد الإلكتروني *' : 'Email Address *' }}</label>
                        <input type="email" name="email" required value="{{ old('email') }}" class="input-field" placeholder="you@example.com">
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">{{ $lang === 'ar' ? 'الموضوع' : 'Subject' }}</label>
                    <input type="text" name="subject" value="{{ old('subject') }}" class="input-field" placeholder="{{ $lang === 'ar' ? 'كيف يمكنني مساعدتك؟' : 'How can I help you?' }}">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">{{ $lang === 'ar' ? 'الرسالة *' : 'Message *' }}</label>
                    <textarea name="message" required rows="5" class="input-field resize-none" placeholder="{{ $lang === 'ar' ? 'أخبرني المزيد...' : 'Tell me more...' }}">{{ old('message') }}</textarea>
                </div>
                <button type="submit" class="btn-primary w-full">{{ $lang === 'ar' ? 'إرسال الرسالة' : 'Send Message' }}</button>
            </form>
        </div>
    </div>
</div>
@endsection
