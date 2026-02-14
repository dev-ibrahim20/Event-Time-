<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Client;

class ClientsSeeder extends Seeder
{
    public function run()
    {
        $clients = [
            [
                'name_ar' => 'شركة التخرد',
                'name_en' => 'Theater Company',
                'image' => 'testimonial1.jpg',
                'website_url' => 'https://www.theater.com',
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'name_ar' => 'شركة مؤتمرات',
                'name_en' => 'Conferences Company',
                'image' => 'testimonial2.jpg',
                'website_url' => 'https://www.conferences.com',
                'is_active' => true,
                'sort_order' => 2,
            ],
            [
                'name_ar' => 'شركة الامن ',
                'name_en' => 'Security Company',
                'image' => 'testimonial3.jpg',
                'website_url' => 'https://www.security.com',
                'is_active' => true,
                'sort_order' => 3,
            ]
           
        ];

        foreach ($clients as $client) {
            DB::table('clients')->insert([
                'name_ar' => $client['name_ar'],
                'name_en' => $client['name_en'],
                'image' => $client['image'],
                'website_url' => $client['website_url'],
                'is_active' => $client['is_active'],
                'sort_order' => $client['sort_order'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        $this->command->info('Clients seeded successfully!');
    }
}
