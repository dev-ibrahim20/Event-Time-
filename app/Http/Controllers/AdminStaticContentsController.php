<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateStaticContentRequest;
use App\Models\StaticContent;

class AdminStaticContentsController extends Controller
{
    public function index()
    {
        $contents = StaticContent::orderBy('key')->get();
        return view('admin.static-contents.index', compact('contents'));
    }

    public function update(UpdateStaticContentRequest $request)
    {
        $data = $request->validated();
        
        // Handle image uploads
        foreach ($data as $key => $value) {
            // Check if this is an image upload field (e.g., 'image_1')
            if (preg_match('/^image_(\d+)$/', $key, $matches)) {
                $id = $matches[1];
                $content = StaticContent::find($id);
                
                if ($content && $content->type == 'image' && $request->hasFile($key)) {
                    $image = $request->file($key);
                    $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                    
                    // Create directory if it doesn't exist
                    $uploadPath = public_path('assets/images/static');
                    if (!file_exists($uploadPath)) {
                        mkdir($uploadPath, 0755, true);
                    }
                    
                    $image->move($uploadPath, $imageName);
                    $imagePath = 'assets/images/static/' . $imageName;
                    
                    // Update both Arabic and English image paths
                    StaticContent::where('id', $id)->update([
                        'value_ar' => $imagePath,
                        'value_en' => $imagePath
                    ]);
                    
                    // If there are manual path inputs, clear them to avoid confusion
                    if (isset($data['value_ar_' . $id])) {
                        unset($data['value_ar_' . $id]);
                    }
                    if (isset($data['value_en_' . $id])) {
                        unset($data['value_en_' . $id]);
                    }
                }
            }
            // Extract the content ID from the key (e.g., 'value_ar_1' -> id=1)
            elseif (preg_match('/^(value_ar|value_en|description_ar|description_en)_(\d+)$/', $key, $matches)) {
                $field = $matches[1];
                $id = $matches[2];
                
                StaticContent::where('id', $id)->update([$field => $value]);
            }
        }

        return redirect()->route('admin-static-contents.index')->with('edit', 'تم تحديث الحاجات الثابتة بنجاح');
    }

    public function createDefaultContent()
    {
        $defaultContents = [
            [
                'key' => 'home_image',
                'type' => 'image',
                'value_ar' => '/assets/img/home-banner.jpg',
                'value_en' => '/assets/img/home-banner.jpg',
                'description_ar' => 'صورة صفحة الرئيسية',
                'description_en' => 'Home page image',
            ],
            [
                'key' => 'phone',
                'type' => 'phone',
                'value_ar' => '+966500000000',
                'value_en' => '+966500000000',
                'description_ar' => 'رقم الهاتف',
                'description_en' => 'Phone number',
            ],
            [
                'key' => 'email',
                'type' => 'email',
                'value_ar' => 'info@example.com',
                'value_en' => 'info@example.com',
                'description_ar' => 'البريد الإلكتروني',
                'description_en' => 'Email address',
            ],
            [
                'key' => 'map_url',
                'type' => 'map',
                'value_ar' => 'https://maps.google.com/embed?pb=!1m18!1m12!1m3!1d3624.123456789!2d123456789!3d123456789!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMz',
                'value_en' => 'https://maps.google.com/embed?pb=!1m18!1m12!1m3!1d3624.123456789!2d123456789!3d123456789!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMz',
                'description_ar' => 'رابط الخريطة',
                'description_en' => 'Map URL',
            ],
            [
                'key' => 'address',
                'type' => 'address',
                'value_ar' => 'الرياض، المملكة العربية السعودية',
                'value_en' => 'Riyadh, Saudi Arabia',
                'description_ar' => 'العنوان',
                'description_en' => 'Address',
            ],
            [
                'key' => 'details',
                'type' => 'text',
                'value_ar' => 'تفاصيل إضافية عن الشركة',
                'value_en' => 'Additional company details',
                'description_ar' => 'التفاصيل الإضافية',
                'description_en' => 'Additional details',
            ],
        ];

        foreach ($defaultContents as $content) {
            StaticContent::updateOrCreate(['key' => $content['key']], $content);
        }

        return redirect()->route('admin-static-contents.index')->with('add', 'تم إنشاء الحاجات الثابتة الافتراضية بنجاح');
    }
}
