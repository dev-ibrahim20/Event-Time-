<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();
        
        $categories = [
            'ar' => ['خيام أوروبية', 'أثاث حفلات', 'إضاءة احترافية', 'صوتيات', 'شاشات LED', 'تكييف', 'ديكورات', 'معدات ترفيه'],
            'en' => ['European Tents', 'Party Furniture', 'Professional Lighting', 'Sound Systems', 'LED Screens', 'Air Conditioning', 'Decorations', 'Entertainment Equipment']
        ];
        
        $products = [
            [
                'ar' => [
                    'خيمة أوروبية فاخرة 6x9',
                    'خيمة أوروبية عالية الجودة بمساحة 6x9 متر، مثالية للفعاليات الخاصة والمناسبات الرسمية. مصنوعة من أفضل المواد مع تصميم أنيق وعصري.',
                    'خيام أوروبية'
                ],
                'en' => [
                    'Luxury European Tent 6x9',
                    'High-quality European tent with 6x9 meters area, perfect for private events and formal occasions. Made from the finest materials with elegant and modern design.',
                    'European Tents'
                ],
                'price' => 2500.00,
                'featured' => true
            ],
            [
                'ar' => [
                    'طاولة حفلات مستديرة 10 أشخاص',
                    'طاولة حفلات مستديرة تتسع لـ 10 أشخاص، مصنوعة من خشب عالي الجودة مع طلاء مقاوم للخدش. مثالية للولائم والمناسبات الخاصة.',
                    'أثاث حفلات'
                ],
                'en' => [
                    'Round Party Table for 10 Persons',
                    'Round party table accommodating 10 persons, made from high-quality wood with scratch-resistant coating. Perfect for banquets and special occasions.',
                    'Party Furniture'
                ],
                'price' => 450.00,
                'featured' => true
            ],
            [
                'ar' => [
                    'نظام إضاءة احترافي متحرك',
                    'نظام إضاءة احترافي متحرك مع 12 مصباح LED، إمكانية التحكم في الألوان والأشكال. مثالي للحفلات والمهرجانات والفعاليات الكبيرة.',
                    'إضاءة احترافية'
                ],
                'en' => [
                    'Professional Moving Light System',
                    'Professional moving light system with 12 LED lamps, controllable colors and patterns. Perfect for parties, festivals, and large events.',
                    'Professional Lighting'
                ],
                'price' => 1800.00,
                'featured' => false
            ],
            [
                'ar' => [
                    'نظام صوتي احترافي 5000 واط',
                    'نظام صوتي احترافي بقوة 5000 واط، يشمل مكبرات صوت ومضخم صوت ومixer. جودة صوت استثنائية للفعاليات الكبيرة والحفلات.',
                    'صوتيات'
                ],
                'en' => [
                    'Professional Sound System 5000W',
                    'Professional sound system with 5000W power, including speakers, amplifier, and mixer. Exceptional sound quality for large events and parties.',
                    'Sound Systems'
                ],
                'price' => 3200.00,
                'featured' => true
            ],
            [
                'ar' => [
                    'شاشة LED خارجية 4 متر',
                    'شاشة LED خارجية بحجم 4x3 متر، دقة عالية ومناسبة للاستخدام في الهواء الطلق. مثالية للمهرجانات والفعاليات الكبيرة.',
                    'شاشات LED'
                ],
                'en' => [
                    'Outdoor LED Screen 4 Meter',
                    'Outdoor LED screen with 4x3 meters size, high resolution suitable for outdoor use. Perfect for festivals and large events.',
                    'LED Screens'
                ],
                'price' => 5500.00,
                'featured' => true
            ],
            [
                'ar' => [
                    'وحدة تكييف محمولة 5 طن',
                    'وحدة تكييف محمولة بسعة 5 طن، مناسبة للخيام والفعاليات الخارجية. سهلة النقل والتركيب مع نظام تحكم عن بعد.',
                    'تكييف'
                ],
                'en' => [
                    'Portable AC Unit 5 Ton',
                    'Portable air conditioning unit with 5 ton capacity, suitable for tents and outdoor events. Easy to transport and install with remote control.',
                    'Air Conditioning'
                ],
                'price' => 1200.00,
                'featured' => false
            ],
            [
                'ar' => [
                    'طقم كراسي حفلات 20 قطعة',
                    'طقم كراسي حفلات يتكون من 20 كرسي، مصنوعة من البلاستيك المقوى مع تصميم مريح. سهلة التنظيف والتخزين.',
                    'أثاث حفلات'
                ],
                'en' => [
                    'Party Chairs Set 20 Pieces',
                    'Party chairs set consisting of 20 chairs, made from reinforced plastic with comfortable design. Easy to clean and store.',
                    'Party Furniture'
                ],
                'price' => 600.00,
                'featured' => false
            ],
            [
                'ar' => [
                    'ديكور زهور طبيعي',
                    'ديكور زهور طبيعي متنوع، يشمل باقات طاولات وديكورات جدران. زهور طازجة مع ترتيب احترافي من قبل خبراء الزينة.',
                    'ديكورات'
                ],
                'en' => [
                    'Natural Flower Decoration',
                    'Natural flower decoration set, including table bouquets and wall decorations. Fresh flowers with professional arrangement by decoration experts.',
                    'Decorations'
                ],
                'price' => 800.00,
                'featured' => false
            ],
            [
                'ar' => [
                    'آلة كرنفال بالقطن',
                    'آلة صنع قطن الكرنفال الاحترافية، سهلة الاستخدام ومناسبة للأطفال والفعاليات العائلية. تأتي مع جميع المستلزمات اللازمة.',
                    'معدات ترفيه'
                ],
                'en' => [
                    'Cotton Candy Machine',
                    'Professional cotton candy making machine, easy to use and suitable for children and family events. Comes with all necessary supplies.',
                    'Entertainment Equipment'
                ],
                'price' => 350.00,
                'featured' => false
            ],
            [
                'ar' => [
                    'خيمة عرس أوروبية 8x12',
                    'خيمة عرس أوروبية فاخرة بمساحة 8x12 متر، تصميم أنيق مع إمكانية إضافة الديكورات والإضاءة. مثالية للأعراس والمناسبات الكبيرة.',
                    'خيام أوروبية'
                ],
                'en' => [
                    'European Wedding Tent 8x12',
                    'Luxury European wedding tent with 8x12 meters area, elegant design with ability to add decorations and lighting. Perfect for weddings and large occasions.',
                    'European Tents'
                ],
                'price' => 4500.00,
                'featured' => true
            ],
            [
                'ar' => [
                    'نظام إضاءة خيمة متكامل',
                    'نظام إضاءة خيمة متكامل يشمل ثريات ومصابيح LED وأضواء ديكور. تحكم في الألوان والشدة من خلال جهاز تحكم عن بعد.',
                    'إضاءة احترافية'
                ],
                'en' => [
                    'Complete Tent Lighting System',
                    'Complete tent lighting system including chandeliers, LED lamps, and decorative lights. Control colors and intensity via remote control.',
                    'Professional Lighting'
                ],
                'price' => 1500.00,
                'featured' => false
            ],
            [
                'ar' => [
                    'مسرح متحرك احترافي',
                    'مسرح متحرك احترافي بأبعاد 6x4 متر، هيكل قوي مع إمكانية رفع وخفض. مثالي للعروض والمؤتمرات والفعاليات الفنية.',
                    'معدات ترفيه'
                ],
                'en' => [
                    'Professional Moving Stage',
                    'Professional moving stage with 6x4 meters dimensions, strong structure with lifting and lowering capabilities. Perfect for performances, conferences, and artistic events.',
                    'Entertainment Equipment'
                ],
                'price' => 2800.00,
                'featured' => true
            ],
            [
                'ar' => [
                    'طقم طاولات كوكتيل 10 قطع',
                    'طقم طاولات كوكتيل يتكون من 10 طاولات، ارتفاع مناسب مع تصميم عصري. سهلة التجميع والنقل مع قاعدة مستقرة.',
                    'أثاث حفلات'
                ],
                'en' => [
                    'Cocktail Tables Set 10 Pieces',
                    'Cocktail tables set consisting of 10 tables, suitable height with modern design. Easy to assemble and transport with stable base.',
                    'Party Furniture'
                ],
                'price' => 750.00,
                'featured' => false
            ],
            [
                'ar' => [
                    'نظام بث فيديو مباشر',
                    'نظام بث فيديو مباشر احترافي مع 4 كاميرات عالية الجودة ومixer فيديو. مثالبث الفعاليات والمؤتمرات عبر الإنترنت.',
                    'شاشات LED'
                ],
                'en' => [
                    'Live Video Broadcasting System',
                    'Professional live video broadcasting system with 4 high-quality cameras and video mixer. Perfect for broadcasting events and conferences online.',
                    'LED Screens'
                ],
                'price' => 4200.00,
                'featured' => false
            ],
            [
                'ar' => [
                    'ديكور شموع معطرة',
                    'ديكور شموع معطرة فاخرة، يشمل شموع بأحجام وأشكال مختلفة مع علب زجاجية أنيقة. رائحة مميزة وتصميم جذاب.',
                    'ديكورات'
                ],
                'en' => [
                    'Scented Candle Decoration',
                    'Luxury scented candle decoration, includes candles in various sizes and shapes with elegant glass holders. Distinctive fragrance and attractive design.',
                    'Decorations'
                ],
                'price' => 250.00,
                'featured' => false
            ]
        ];
        
        foreach ($products as $index => $productData) {
            $slug = Str::slug($productData['en'][0]);
            
            Product::create([
                'title_ar' => $productData['ar'][0],
                'title_en' => $productData['en'][0],
                'description_ar' => $productData['ar'][1],
                'description_en' => $productData['en'][1],
                'slug' => $slug,
                'category_ar' => $productData['ar'][2],
                'category_en' => $productData['en'][2],
                'price' => $productData['price'],
                'image' => null, // Can be updated later with actual images
                'featured' => $productData['featured'],
                'status' => true,
                'sort_order' => $index + 1,
                'created_at' => now()->subDays(rand(1, 30)),
                'updated_at' => now()->subDays(rand(1, 5)),
            ]);
        }
        
        $this->command->info('Created ' . count($products) . ' sample products successfully!');
    }
}
