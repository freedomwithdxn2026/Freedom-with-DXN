@extends('layouts.app')
@section('title', 'Privacy Policy | Freedom With DXN')
@section('description', 'Read our Privacy Policy to understand how Freedom With DXN collects, uses, and protects your personal information.')
@section('keywords', 'privacy policy, data protection, Freedom With DXN, personal information')

@php
    $lang = session('lang', 'en');
    $ar = $lang === 'ar';
@endphp

@section('content')
{{-- Hero --}}
<div class="bg-dxn-darkgreen py-20 px-4 text-center relative overflow-hidden">
    <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(circle at 70% 50%, #dfc378 0%, transparent 60%)"></div>
    <div class="relative max-w-3xl mx-auto">
        <span class="inline-block bg-dxn-gold/20 text-dxn-gold px-4 py-1 rounded-full text-sm font-medium mb-4">
            {{ $ar ? 'الخصوصية والأمان' : 'Privacy & Security' }}
        </span>
        <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">{{ $ar ? 'سياسة الخصوصية' : 'Privacy Policy' }}</h1>
        <p class="text-gray-300 text-base">{{ $ar ? 'آخر تحديث: أبريل 2026' : 'Last updated: April 2026' }}</p>
    </div>
</div>

{{-- Content --}}
<section class="py-16 bg-white">
    <div class="max-w-3xl mx-auto px-4 {{ $ar ? 'text-right' : '' }}" dir="{{ $ar ? 'rtl' : 'ltr' }}">

        <div class="prose prose-green max-w-none text-gray-700 leading-relaxed space-y-10">

            <div>
                <h2 class="text-2xl font-bold text-dxn-darkgreen mb-3">{{ $ar ? '1. مقدمة' : '1. Introduction' }}</h2>
                <p>{{ $ar
                    ? 'تلتزم Freedom With DXN بحماية خصوصيتك. توضح هذه السياسة كيفية جمع معلوماتك الشخصية وكيفية استخدامها والحفاظ عليها عند زيارتك لموقعنا freedomwithdxn.com.'
                    : 'Freedom With DXN is committed to protecting your privacy. This policy explains what personal information we collect, how we use it, and how we keep it safe when you visit freedomwithdxn.com.' }}</p>
            </div>

            <div>
                <h2 class="text-2xl font-bold text-dxn-darkgreen mb-3">{{ $ar ? '2. المعلومات التي نجمعها' : '2. Information We Collect' }}</h2>
                <p class="mb-3">{{ $ar ? 'قد نجمع الأنواع التالية من المعلومات:' : 'We may collect the following types of information:' }}</p>
                <ul class="list-disc {{ $ar ? 'mr-6' : 'ml-6' }} space-y-2">
                    <li>{{ $ar ? 'المعلومات الشخصية: الاسم، عنوان البريد الإلكتروني، رقم الهاتف عند التسجيل أو التواصل معنا.' : 'Personal details: name, email address, phone number when you register or contact us.' }}</li>
                    <li>{{ $ar ? 'بيانات الاستخدام: عنوان IP، نوع المتصفح، الصفحات التي تمت زيارتها، ومدة الزيارة.' : 'Usage data: IP address, browser type, pages visited, and session duration.' }}</li>
                    <li>{{ $ar ? 'بيانات الطلبات: تفاصيل المنتجات التي تطلبها عبر واتساب أو موقعنا.' : 'Order data: product details you request through WhatsApp or our website.' }}</li>
                    <li>{{ $ar ? 'رسائل التواصل: أي رسائل ترسلها عبر نموذج الاتصال.' : 'Communications: any messages you send through our contact form.' }}</li>
                </ul>
            </div>

            <div>
                <h2 class="text-2xl font-bold text-dxn-darkgreen mb-3">{{ $ar ? '3. كيف نستخدم معلوماتك' : '3. How We Use Your Information' }}</h2>
                <ul class="list-disc {{ $ar ? 'mr-6' : 'ml-6' }} space-y-2">
                    <li>{{ $ar ? 'معالجة طلباتك والرد على استفساراتك.' : 'To process your orders and respond to your enquiries.' }}</li>
                    <li>{{ $ar ? 'تحسين تجربة الموقع وتخصيص المحتوى لك.' : 'To improve your website experience and personalise content.' }}</li>
                    <li>{{ $ar ? 'إرسال تحديثات أو عروض ترويجية إذا وافقت على ذلك.' : 'To send updates or promotions if you have opted in.' }}</li>
                    <li>{{ $ar ? 'الامتثال للالتزامات القانونية.' : 'To comply with legal obligations.' }}</li>
                </ul>
            </div>

            <div>
                <h2 class="text-2xl font-bold text-dxn-darkgreen mb-3">{{ $ar ? '4. مشاركة البيانات' : '4. Data Sharing' }}</h2>
                <p>{{ $ar
                    ? 'لا نبيع معلوماتك الشخصية ولا نؤجرها لأي طرف ثالث. قد نشارك البيانات مع مزودي الخدمات الموثوقين الذين يساعدوننا في تشغيل الموقع (مثل الاستضافة والتحليلات)، بشرط الالتزام بسياسات الخصوصية.'
                    : 'We do not sell or rent your personal information to third parties. We may share data with trusted service providers who help us operate the site (e.g., hosting, analytics), subject to strict confidentiality obligations.' }}</p>
            </div>

            <div>
                <h2 class="text-2xl font-bold text-dxn-darkgreen mb-3">{{ $ar ? '5. ملفات تعريف الارتباط (الكوكيز)' : '5. Cookies' }}</h2>
                <p>{{ $ar
                    ? 'يستخدم موقعنا ملفات تعريف الارتباط الأساسية للحفاظ على جلسة تسجيل الدخول وإعداد اللغة. لا نستخدم ملفات تعريف ارتباط التتبع التسويقي دون إذنك.'
                    : 'Our site uses essential cookies to maintain your login session and language preference. We do not use marketing tracking cookies without your consent.' }}</p>
            </div>

            <div>
                <h2 class="text-2xl font-bold text-dxn-darkgreen mb-3">{{ $ar ? '6. أمان البيانات' : '6. Data Security' }}</h2>
                <p>{{ $ar
                    ? 'نطبق تدابير تقنية وتنظيمية معقولة لحماية بياناتك من الوصول غير المصرح به أو الفقدان. ومع ذلك، لا توجد طريقة نقل عبر الإنترنت آمنة بنسبة 100%.'
                    : 'We implement reasonable technical and organisational measures to protect your data from unauthorised access or loss. However, no internet transmission is 100% secure.' }}</p>
            </div>

            <div>
                <h2 class="text-2xl font-bold text-dxn-darkgreen mb-3">{{ $ar ? '7. روابط الطرف الثالث' : '7. Third-Party Links' }}</h2>
                <p>{{ $ar
                    ? 'قد يحتوي موقعنا على روابط لمواقع خارجية مثل واتساب وكاليندلي. نحن لسنا مسؤولين عن ممارسات الخصوصية لهذه المواقع.'
                    : 'Our site may contain links to external websites such as WhatsApp and Calendly. We are not responsible for the privacy practices of those sites.' }}</p>
            </div>

            <div>
                <h2 class="text-2xl font-bold text-dxn-darkgreen mb-3">{{ $ar ? '8. حقوقك' : '8. Your Rights' }}</h2>
                <p class="mb-3">{{ $ar ? 'يحق لك في أي وقت:' : 'You have the right at any time to:' }}</p>
                <ul class="list-disc {{ $ar ? 'mr-6' : 'ml-6' }} space-y-2">
                    <li>{{ $ar ? 'طلب الاطلاع على بياناتك الشخصية التي نحتفظ بها.' : 'Request access to the personal data we hold about you.' }}</li>
                    <li>{{ $ar ? 'طلب تصحيح أو حذف بياناتك.' : 'Request correction or deletion of your data.' }}</li>
                    <li>{{ $ar ? 'الانسحاب من أي اتصالات تسويقية.' : 'Opt out of any marketing communications.' }}</li>
                </ul>
                <p class="mt-3">{{ $ar
                    ? 'للممارسة هذه الحقوق، تواصل معنا عبر واتساب أو نموذج الاتصال.'
                    : 'To exercise these rights, contact us via WhatsApp or the contact form.' }}</p>
            </div>

            <div>
                <h2 class="text-2xl font-bold text-dxn-darkgreen mb-3">{{ $ar ? '9. تعديلات السياسة' : '9. Policy Updates' }}</h2>
                <p>{{ $ar
                    ? 'قد نقوم بتحديث هذه السياسة من وقت لآخر. ستظهر التغييرات على هذه الصفحة مع تاريخ التحديث.'
                    : 'We may update this policy from time to time. Changes will appear on this page with the updated date.' }}</p>
            </div>

            <div>
                <h2 class="text-2xl font-bold text-dxn-darkgreen mb-3">{{ $ar ? '10. تواصل معنا' : '10. Contact Us' }}</h2>
                <p>{{ $ar
                    ? 'إذا كان لديك أي أسئلة حول سياسة الخصوصية هذه، لا تتردد في التواصل معنا:'
                    : 'If you have any questions about this Privacy Policy, please get in touch:' }}</p>
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
