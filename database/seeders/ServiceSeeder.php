<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            [
                'title_ar' => 'تنظيم المؤتمرات',
                'title_en' => 'Conference Organization',
                'description_ar' => 'نقدم خدمات تنظيم المؤتمرات والفعاليات الكبرى بأعلى معايير الاحترافية، مع توفير جميع التجهيزات والخدمات اللوجستية اللازمة.',
                'description_en' => 'We provide conference and large event organization services with the highest professional standards, providing all necessary equipment and logistics services.',
                'slug' => 'conference-organization',
                'icon' => 'fas fa-users',
                'image' => 'assets/img/photos/1.jpg',
                'features_ar' => json_encode(['تجهيز القاعات', 'الصوتيات والإضاءة', 'الخدمات اللوجستية', 'الإقامة والتنقلات']),
                'features_en' => json_encode(['Hall Setup', 'Sound & Lighting', 'Logistics Services', 'Accommodation & Transportation']),
                'gallery_images' => json_encode([
                    'assets/img/photos/2.jpg',
                    'assets/img/photos/3.jpg',
                    'assets/img/photos/4.jpg'
                ]),
                'featured' => true,
                'sort_order' => 1,
                'status' => true,
            ],
            [
                'title_ar' => 'حفلات الزفاف',
                'title_en' => 'Wedding Parties',
                'description_ar' => 'نحلم معك بيومك الأجمل، ننظم حفلات زفاف ساحرة تجمع بين الأناقة والفخامة بلمسات عصرية.',
                'description_en' => 'We dream with you of your most beautiful day, organizing enchanting wedding parties that combine elegance and luxury with modern touches.',
                'slug' => 'wedding-parties',
                'icon' => 'fas fa-heart',
                'image' => 'assets/img/photos/1.jpg',
                'features_ar' => json_encode(['تزيين القاعة', 'الدي جي والموسيقى', 'التصوير الفوتوغرافي', 'تقديم الضيافة']),
                'features_en' => json_encode(['Hall Decoration', 'DJ & Music', 'Photography', 'Catering Service']),
                'gallery_images' => json_encode([
                    'assets/img/photos/2.jpg',
                    'assets/img/photos/3.jpg',
                    'assets/img/photos/4.jpg'
                ]),
                'featured' => true,
                'sort_order' => 2,
                'status' => true,
            ],
            [
                'title_ar' => 'المناسبات الخاصة',
                'title_en' => 'Private Events',
                'description_ar' => 'ننظم جميع أنواع المناسبات الخاصة من حفلات أعياد الميلاد وحتى الحفلات العائلية باهتمام فائق بالتفاصيل.',
                'description_en' => 'We organize all types of private events from birthday parties to family gatherings with utmost attention to details.',
                'slug' => 'private-events',
                'icon' => 'fas fa-gift',
                'image' => 'assets/img/photos/1.jpg',
                'features_ar' => json_encode(['التخطيط الشخصي', 'الديكورات المخصصة', 'الخدمات الترفيهية', 'إدارة الحدث']),
                'features_en' => json_encode(['Personal Planning', 'Custom Decorations', 'Entertainment Services', 'Event Management']),
                'gallery_images' => json_encode([
                    'assets/img/photos/2.jpg',
                    'assets/img/photos/3.jpg',
                    'assets/img/photos/4.jpg'
                ]),
                'featured' => false,
                'sort_order' => 3,
                'status' => true,
            ],
            [
                'title_ar' => 'الفعاليات الشركات',
                'title_en' => 'Corporate Events',
                'description_ar' => 'نقدم خدمات تنظيم فعاليات الشركات والاحتفالات الداخلية والخارجية بأسلوب احترافي يعكس صورة شركتك.',
                'description_en' => 'We provide corporate event organization services for internal and external celebrations in a professional style that reflects your company image.',
                'slug' => 'corporate-events',
                'icon' => 'fas fa-briefcase',
                'image' => 'assets/img/photos/1.jpg',
                'features_ar' => json_encode(['تخطيط الفعاليات', 'الإعلام والتغطية', 'الضيافة الفاخرة', 'إدارة المشاركين']),
                'features_en' => json_encode(['Event Planning', 'Media Coverage', 'Luxury Catering', 'Attendees Management']),
                'gallery_images' => json_encode([
                    'assets/img/photos/2.jpg',
                    'assets/img/photos/3.jpg',
                    'assets/img/photos/4.jpg'
                ]),
                'featured' => false,
                'sort_order' => 4,
                'status' => true,
            ],
            [
                'title_ar' => 'الحفلات الموسيقية',
                'title_en' => 'Musical Concerts',
                'description_ar' => 'ننظم الحفلات الموسيقية بأنواعها المختلفة، مع توفير أفضل الفرق الموسيقية والمعدات الصوتية المتطورة.',
                'description_en' => 'We organize musical concerts of all types, providing best musical bands and advanced sound equipment.',
                'slug' => 'musical-concerts',
                'icon' => 'fas fa-music',
                'image' => 'assets/img/photos/1.jpg',
                'features_ar' => json_encode(['الفرق الموسيقية', 'الصوتيات الاحترافية', 'الإضاءة المسرحية', 'تنظيم الجمهور']),
                'features_en' => json_encode(['Musical Bands', 'Professional Sound', 'Stage Lighting', 'Audience Organization']),
                'gallery_images' => json_encode([
                    'assets/img/photos/2.jpg',
                    'assets/img/photos/3.jpg',
                    'assets/img/photos/4.jpg'
                ]),
                'featured' => true,
                'sort_order' => 5,
                'status' => true,
            ],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}
