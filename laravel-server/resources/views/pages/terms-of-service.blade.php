@extends('layouts.app')
@section('title', 'Terms of Service | Freedom With DXN')
@section('description', 'Read the Terms of Service for Freedom With DXN. By using our website or purchasing products, you agree to these terms.')
@section('keywords', 'terms of service, terms and conditions, Freedom With DXN, DXN products')

@php
    $lang = session('lang', 'en');
    $ar = $lang === 'ar';
@endphp

@section('content')
{{-- Hero --}}
<div class="bg-dxn-darkgreen py-20 px-4 text-center relative overflow-hidden">
    <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(circle at 30% 50%, #dfc378 0%, transparent 60%)"></div>
    <div class="relative max-w-3xl mx-auto">
        <span class="inline-block bg-dxn-gold/20 text-dxn-gold px-4 py-1 rounded-full text-sm font-medium mb-4">
            {{ $ar ? 'الشروط والأحكام' : 'Legal' }}
        </span>
        <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">{{ $ar ? 'شروط الخدمة' : 'Terms of Service' }}</h1>
        <p class="text-gray-300 text-base">{{ $ar ? 'آخر تحديث: أبريل 2026' : 'Last updated: April 2026' }}</p>
    </div>
</div>

{{-- Content --}}
<section class="py-16 bg-white">
    <div class="max-w-3xl mx-auto px-4 {{ $ar ? 'text-right' : '' }}" dir="{{ $ar ? 'rtl' : 'ltr' }}">

        <div class="prose prose-green max-w-none text-gray-700 leading-relaxed space-y-10">

            <div>
                <h2 class="text-2xl font-bold text-dxn-darkgreen mb-3">{{ $ar ? '1. القبول بالشروط' : '1. Acceptance of Terms' }}</h2>
                <p>{{ $ar
                    ? 'باستخدامك لموقع freedomwithdxn.com أو شرائك لأي منتج من خلاله، فإنك توافق على الالتزام بهذه الشروط والأحكام. إذا كنت لا توافق عليها، يُرجى عدم استخدام الموقع.'
                    : 'By accessing or using freedomwithdxn.com or purchasing any product through it, you agree to be bound by these Terms of Service. If you do not agree, please do not use the site.' }}</p>
            </div>

            <div>
                <h2 class="text-2xl font-bold text-dxn-darkgreen mb-3">{{ $ar ? '2. طبيعة الخدمة' : '2. Nature of Service' }}</h2>
                <p>{{ $ar
                    ? 'Freedom With DXN هو موزع مستقل معتمد من DXN. الموقع مخصص لعرض منتجات DXN، تقديم معلومات عن فرصة العمل، وتسهيل تواصلك معنا لإتمام الطلبات.'
                    : 'Freedom With DXN is an independent DXN distributor. This site is used to showcase DXN products, share information about the business opportunity, and facilitate orders through our team.' }}</p>
            </div>

            <div>
                <h2 class="text-2xl font-bold text-dxn-darkgreen mb-3">{{ $ar ? '3. المنتجات والطلبات' : '3. Products & Orders' }}</h2>
                <ul class="list-disc {{ $ar ? 'mr-6' : 'ml-6' }} space-y-2">
                    <li>{{ $ar ? 'جميع الأسعار المعروضة بالدرهم الإماراتي ما لم يُذكر خلاف ذلك.' : 'All prices are in AED unless otherwise stated.' }}</li>
                    <li>{{ $ar ? 'يتم تأكيد الطلبات عبر واتساب ويخضع التسليم للتوفر.' : 'Orders are confirmed via WhatsApp and delivery is subject to availability.' }}</li>
                    <li>{{ $ar ? 'نحتفظ بالحق في رفض أي طلب أو إلغائه في حالة وجود خطأ في المعلومات.' : 'We reserve the right to refuse or cancel any order in case of pricing or information errors.' }}</li>
                    <li>{{ $ar ? 'صور المنتجات توضيحية فقط وقد تختلف قليلاً عن المنتج الفعلي.' : 'Product images are illustrative and may differ slightly from the actual product.' }}</li>
                </ul>
            </div>

            <div>
                <h2 class="text-2xl font-bold text-dxn-darkgreen mb-3">{{ $ar ? '4. سياسة الإرجاع والاسترداد' : '4. Returns & Refunds' }}</h2>
                <p>{{ $ar
                    ? 'نسعى دائماً لرضاك التام. إذا وصلك منتج تالف أو خاطئ، تواصل معنا خلال 48 ساعة من الاستلام عبر واتساب وسنعمل على حل المشكلة فوراً. المنتجات المفتوحة أو المستخدمة غير قابلة للإرجاع.'
                    : 'We strive for your full satisfaction. If you receive a damaged or incorrect product, contact us within 48 hours of receipt via WhatsApp and we will resolve the issue promptly. Opened or used products cannot be returned.' }}</p>
            </div>

            <div>
                <h2 class="text-2xl font-bold text-dxn-darkgreen mb-3">{{ $ar ? '5. فرصة العمل' : '5. Business Opportunity' }}</h2>
                <p>{{ $ar
                    ? 'المعلومات المتعلقة بفرصة العمل مع DXN للأغراض التعليمية فقط. لا تُعدّ ضماناً للدخل. تختلف نتائج الأعمال بناءً على الجهد الشخصي والظروف الفردية.'
                    : 'Information about the DXN business opportunity is provided for educational purposes only and does not constitute a guarantee of income. Results vary based on individual effort and circumstances.' }}</p>
            </div>

            <div>
                <h2 class="text-2xl font-bold text-dxn-darkgreen mb-3">{{ $ar ? '6. الملكية الفكرية' : '6. Intellectual Property' }}</h2>
                <p>{{ $ar
                    ? 'جميع المحتويات الواردة في هذا الموقع بما فيها النصوص والصور والتصميمات هي ملك لـ Freedom With DXN أو مرخصة له. لا يجوز إعادة استخدامها بدون إذن كتابي مسبق.'
                    : 'All content on this site including text, images, and designs belongs to Freedom With DXN or is used under license. It may not be reproduced without prior written permission.' }}</p>
            </div>

            <div>
                <h2 class="text-2xl font-bold text-dxn-darkgreen mb-3">{{ $ar ? '7. إخلاء المسؤولية' : '7. Disclaimer' }}</h2>
                <p>{{ $ar
                    ? 'منتجات DXN ليست أدوية ولا تهدف إلى تشخيص أو علاج أو الوقاية من أي مرض. استشر طبيبك قبل استخدام أي منتج غذائي إذا كنت تعاني من حالة صحية.'
                    : 'DXN products are not medicines and are not intended to diagnose, treat, cure, or prevent any disease. Consult your physician before using any supplement if you have a medical condition.' }}</p>
            </div>

            <div>
                <h2 class="text-2xl font-bold text-dxn-darkgreen mb-3">{{ $ar ? '8. تحديد المسؤولية' : '8. Limitation of Liability' }}</h2>
                <p>{{ $ar
                    ? 'لن تكون Freedom With DXN مسؤولة عن أي أضرار مباشرة أو غير مباشرة تنشأ عن استخدامك للموقع أو المنتجات، بما يتجاوز ما يسمح به القانون المعمول به.'
                    : 'Freedom With DXN shall not be liable for any direct or indirect damages arising from your use of the site or products, to the fullest extent permitted by applicable law.' }}</p>
            </div>

            <div>
                <h2 class="text-2xl font-bold text-dxn-darkgreen mb-3">{{ $ar ? '9. القانون الحاكم' : '9. Governing Law' }}</h2>
                <p>{{ $ar
                    ? 'تخضع هذه الشروط لقوانين دولة الإمارات العربية المتحدة. أي نزاع يُحسم أمام المحاكم المختصة في الإمارات.'
                    : 'These terms are governed by the laws of the United Arab Emirates. Any disputes shall be resolved in the competent courts of the UAE.' }}</p>
            </div>

            <div>
                <h2 class="text-2xl font-bold text-dxn-darkgreen mb-3">{{ $ar ? '10. التعديلات' : '10. Changes to Terms' }}</h2>
                <p>{{ $ar
                    ? 'نحتفظ بالحق في تعديل هذه الشروط في أي وقت. استمرارك في استخدام الموقع بعد نشر التعديلات يُعدّ قبولاً لها.'
                    : 'We reserve the right to modify these terms at any time. Continued use of the site after changes are posted constitutes acceptance of the updated terms.' }}</p>
            </div>

            <div>
                <h2 class="text-2xl font-bold text-dxn-darkgreen mb-3">{{ $ar ? '11. تواصل معنا' : '11. Contact Us' }}</h2>
                <p>{{ $ar
                    ? 'لأي استفسارات تتعلق بهذه الشروط:'
                    : 'For any questions regarding these terms:' }}</p>
                <ul class="mt-3 space-y-2">
                    <li>
                        <a href="https://wa.me/971555574958" target="_blank" rel="noopener noreferrer" class="text-dxn-green font-medium hover:underline">
                            WhatsApp: +971 55 557 4958
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('contact') }}" class="text-dxn-green font-medium hover:underline">
                            {{ $ar ? 'نموذج الاتصال' : 'Contact Form' }}
                        </a>
                    </li>
                </ul>
            </div>

        </div>
    </div>
</section>
@endsection
