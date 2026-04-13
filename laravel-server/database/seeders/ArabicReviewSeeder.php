<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Review;

class ArabicReviewSeeder extends Seeder
{
    public function run(): void
    {
        // Map English comments to Arabic translations
        $translations = [
            // COFFEE
            'Amazing coffee! The Ganoderma gives it a smooth, rich taste without the usual bitterness. I drink it every morning and feel more energized throughout the day.'
                => 'قهوة مذهلة! الجانوديرما تمنحها طعمًا ناعمًا وغنيًا بدون المرارة المعتادة. أشربها كل صباح وأشعر بطاقة أكبر طوال اليوم.',

            'Best instant coffee I have ever tried. My whole family loves it. We order it every month now. The health benefits are a great bonus!'
                => 'أفضل قهوة سريعة التحضير جربتها على الإطلاق. عائلتي بأكملها تحبها. نطلبها كل شهر الآن. الفوائد الصحية ميزة رائعة!',

            'Really good flavor and easy to prepare. I wish the sachets were a bit bigger but overall great product. Will buy again.'
                => 'نكهة جيدة جدًا وسهلة التحضير. أتمنى لو كانت الأكياس أكبر قليلًا لكن بشكل عام منتج رائع. سأشتريه مرة أخرى.',

            'I switched from regular coffee to this and noticed a huge difference in my energy levels. No more afternoon crashes!'
                => 'انتقلت من القهوة العادية إلى هذه ولاحظت فرقًا كبيرًا في مستويات طاقتي. لم أعد أعاني من التعب بعد الظهر!',

            'Tastes great and dissolves well in hot water. The packaging is convenient for office use. Slightly sweet for my taste but still enjoyable.'
                => 'طعمها رائع وتذوب جيدًا في الماء الساخن. التغليف مريح للاستخدام في المكتب. حلوة قليلًا بالنسبة لذوقي لكنها ممتعة.',

            'My friend recommended this coffee and I am so glad she did. It is now a staple in my kitchen. Love the smooth texture.'
                => 'صديقتي نصحتني بهذه القهوة وأنا سعيدة جدًا أنها فعلت ذلك. أصبحت الآن أساسية في مطبخي. أحب ملمسها الناعم.',

            'Decent coffee. The taste is good but I expected it to be stronger. It is a bit mild for my preference, but the health benefits keep me buying.'
                => 'قهوة لا بأس بها. الطعم جيد لكنني توقعتها أقوى. هي خفيفة بعض الشيء بالنسبة لتفضيلي، لكن الفوائد الصحية تجعلني أستمر في شرائها.',

            'Outstanding product! I have been drinking DXN coffee for 3 years now. It helps with my digestion and I feel healthier overall.'
                => 'منتج ممتاز! أشرب قهوة DXN منذ 3 سنوات. تساعد في هضمي وأشعر بصحة أفضل بشكل عام.',

            // BEVERAGES
            'Refreshing and healthy! I love that it has Ganoderma extract. My kids enjoy it too. Perfect alternative to sugary drinks.'
                => 'منعش وصحي! أحب أنه يحتوي على مستخلص الجانوديرما. أطفالي يستمتعون به أيضًا. بديل مثالي للمشروبات السكرية.',

            'Good taste and very convenient. I take it to work every day. Would recommend to anyone looking for a healthy beverage option.'
                => 'طعم جيد ومريح جدًا. آخذه معي إلى العمل كل يوم. أنصح به لأي شخص يبحث عن خيار مشروب صحي.',

            'This has become my daily health drink. I noticed improvements in my overall well-being after just two weeks of regular consumption.'
                => 'أصبح هذا مشروبي الصحي اليومي. لاحظت تحسنات في صحتي العامة بعد أسبوعين فقط من الاستهلاك المنتظم.',

            'Nice flavor and good quality. Shipping was fast. Will definitely order again. My whole family enjoys this product.'
                => 'نكهة لطيفة وجودة عالية. الشحن كان سريعًا. سأطلبه بالتأكيد مرة أخرى. عائلتي بأكملها تستمتع بهذا المنتج.',

            'Love this product! It tastes amazing and the health benefits are incredible. I have recommended it to all my friends and colleagues.'
                => 'أحب هذا المنتج! طعمه مذهل والفوائد الصحية لا تصدق. نصحت به جميع أصدقائي وزملائي.',

            'The taste took some getting used to, but now I quite enjoy it. The nutritional value makes it worth it.'
                => 'الطعم احتاج بعض الوقت للاعتياد عليه، لكنني الآن أستمتع به كثيرًا. القيمة الغذائية تجعله يستحق ذلك.',

            // SUPPLEMENTS
            'I have been taking this for 6 months and my energy levels have significantly improved. I feel more alert and focused during the day. Highly recommend!'
                => 'أتناوله منذ 6 أشهر ومستويات طاقتي تحسنت بشكل ملحوظ. أشعر بيقظة وتركيز أكبر خلال اليوم. أنصح به بشدة!',

            'Excellent quality supplement. I trust DXN products because they use natural ingredients. This has become part of my daily health routine.'
                => 'مكمل ممتاز الجودة. أثق بمنتجات DXN لأنها تستخدم مكونات طبيعية. أصبح جزءًا من روتيني الصحي اليومي.',

            'Good results so far. I started taking this on my doctors recommendation. Easy to swallow and no side effects.'
                => 'نتائج جيدة حتى الآن. بدأت بتناوله بناءً على توصية طبيبي. سهل البلع وبدون آثار جانبية.',

            'The best Ganoderma supplement on the market. I have tried many brands but DXN consistently delivers the highest quality.'
                => 'أفضل مكمل جانوديرما في السوق. جربت العديد من العلامات التجارية لكن DXN تقدم دائمًا أعلى جودة.',

            'Very effective product. I noticed a difference in my immune system after about 3 weeks. Will continue using this.'
                => 'منتج فعال جدًا. لاحظت فرقًا في جهاز المناعة لدي بعد حوالي 3 أسابيع. سأستمر في استخدامه.',

            'Life-changing supplement! My cholesterol levels improved and I have more stamina. My doctor was impressed with my results.'
                => 'مكمل غيّر حياتي! تحسنت مستويات الكوليسترول لدي وأصبح لدي قدرة تحمل أكبر. طبيبي أُعجب بنتائجي.',

            'Quality product as expected from DXN. The tablets are easy to take and I appreciate the natural ingredients.'
                => 'منتج عالي الجودة كما هو متوقع من DXN. الأقراص سهلة التناول وأقدر المكونات الطبيعية.',

            // PERSONAL CARE
            'My hair has never felt softer! This shampoo is gentle yet effective. The Ganoderma extract makes a real difference.'
                => 'شعري لم يكن بهذه النعومة من قبل! هذا الشامبو لطيف وفعال في نفس الوقت. مستخلص الجانوديرما يحدث فرقًا حقيقيًا.',

            'Good quality personal care product. My skin feels clean and refreshed after using it. Will purchase again.'
                => 'منتج عناية شخصية عالي الجودة. بشرتي تشعر بالنظافة والانتعاش بعد استخدامه. سأشتريه مرة أخرى.',

            'I love that it is made with natural ingredients. No harsh chemicals. My sensitive skin handles it perfectly.'
                => 'أحب أنه مصنوع من مكونات طبيعية. بدون مواد كيميائية قاسية. بشرتي الحساسة تتقبله بشكل مثالي.',

            'Great product for the whole family. We have been using DXN personal care products for over a year now. Very satisfied.'
                => 'منتج رائع لجميع أفراد العائلة. نستخدم منتجات العناية الشخصية من DXN منذ أكثر من سنة. راضون جدًا.',

            'Excellent! My skin condition has improved noticeably. I am a loyal DXN customer now. The quality is unmatched.'
                => 'ممتاز! تحسنت حالة بشرتي بشكل ملحوظ. أصبحت عميلًا وفيًا لـ DXN الآن. الجودة لا تُضاهى.',

            'Good product but the scent is a bit strong for me. Otherwise, it works well and leaves my skin feeling clean.'
                => 'منتج جيد لكن الرائحة قوية بعض الشيء بالنسبة لي. بخلاف ذلك، يعمل جيدًا ويترك بشرتي نظيفة.',

            // SKINCARE
            'My skin has never looked better! The Ganoderma extract really makes a difference. I get compliments on my complexion all the time now.'
                => 'بشرتي لم تبدُ أفضل من هذا من قبل! مستخلص الجانوديرما يحدث فرقًا حقيقيًا. أتلقى إطراءات على بشرتي طوال الوقت الآن.',

            'This is the best skincare product I have used in years. It absorbed quickly and left my skin feeling hydrated all day.'
                => 'هذا أفضل منتج عناية بالبشرة استخدمته منذ سنوات. يُمتص بسرعة ويترك بشرتي رطبة طوال اليوم.',

            'Very good product. Lightweight and non-greasy. My skin feels nourished without any heaviness. Would recommend!'
                => 'منتج جيد جدًا. خفيف وغير دهني. بشرتي تشعر بالتغذية بدون أي ثقل. أنصح به!',

            'I switched my entire skincare routine to DXN products and the results are amazing. My skin is clearer and more radiant.'
                => 'غيّرت روتين العناية ببشرتي بالكامل إلى منتجات DXN والنتائج مذهلة. بشرتي أصبحت أنقى وأكثر إشراقًا.',

            'Nice product with pleasant scent. Works well under makeup. A little goes a long way which makes it good value.'
                => 'منتج لطيف برائحة عطرة. يعمل جيدًا تحت المكياج. كمية قليلة تكفي لمدة طويلة مما يجعله قيمة جيدة.',

            'After trying countless skincare brands, I finally found one that works. The natural ingredients make all the difference.'
                => 'بعد تجربة عدد لا يحصى من ماركات العناية بالبشرة، وجدت أخيرًا واحدة تعمل. المكونات الطبيعية تصنع كل الفرق.',

            'Good moisturizer that does not clog pores. I have combination skin and this works perfectly for me.'
                => 'مرطب جيد لا يسد المسام. لدي بشرة مختلطة وهذا يعمل بشكل مثالي معي.',
        ];

        $updated = 0;
        foreach ($translations as $english => $arabic) {
            $affected = Review::where('comment', $english)->update(['comment_ar' => $arabic]);
            $updated += $affected;
        }

        $this->command->info("Updated Arabic translations for {$updated} reviews.");
    }
}
