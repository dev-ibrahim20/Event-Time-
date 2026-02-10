<?php

namespace App\Http\Traits;

use Illuminate\Http\UploadedFile;

trait UploadsImages
{
    /**
     * Upload main image
     */
    public function uploadMainImage($request, $fieldName = 'image')
    {
        if ($request->hasFile($fieldName)) {
            $image = $request->file($fieldName);
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets/images/services'), $imageName);
            
            return 'assets/images/services/' . $imageName;
        }
        
        return null;
    }

    /**
     * Upload gallery images
     */
    public function uploadGalleryImages($request, $fieldName = 'gallery_images')
    {
        $galleryImages = [];
        
        if ($request->hasFile($fieldName)) {
            foreach ($request->file($fieldName) as $galleryImage) {
                $galleryName = time() . '_' . uniqid() . '.' . $galleryImage->getClientOriginalExtension();
                $galleryImage->move(public_path('assets/images/services/gallery'), $galleryName);
                $galleryImages[] = 'assets/images/services/gallery/' . $galleryName;
            }
        }
        
        return $galleryImages;
    }

    /**
     * Get image validation rules
     */
    public function getImageValidationRules()
    {
        return [
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'gallery_images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }

    /**
     * Get image validation messages
     */
    public function getImageValidationMessages()
    {
        return [
            'image.image' => 'حقل الصورة يجب أن يكون صورة صالحة.',
            'image.mimes' => 'حقل الصورة يجب أن يكون من نوع: jpeg, png, jpg, gif.',
            'image.max' => 'حجم الصورة يجب ألا يزيد عن 2048 كيلوبايت.',
            'gallery_images.*.image' => 'كل الصور في المعرض يجب أن تكون صوراً صالحة.',
            'gallery_images.*.mimes' => 'صور المعرض يجب أن تكون من نوع: jpeg, png, jpg, gif.',
            'gallery_images.*.max' => 'حجم كل صورة يجب ألا يزيد عن 2048 كيلوبايت.',
        ];
    }
}
