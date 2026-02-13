<?php

namespace App\Actions\Service;

use App\Models\Service;

class StoreServiceAction
{
    public function execute(array $data): void
    {
        $this
            ->handleMainImage($data)
            ->handleGalleryImages($data)
            ->convertFeaturesToJson($data)
            ->setDefaults($data)
            ->setDefaultImage($data)
            ->removeIcon($data)
            ->createService($data);
    }

    private function handleMainImage(array &$data): self
    {
        if (isset($data['image']) && $data['image'] !== null) {
            $image = $data['image'];
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets/images/services'), $imageName);
            $data['image'] = 'assets/images/services/' . $imageName;
        }
        return $this;
    }

    private function handleGalleryImages(array &$data): self
    {
        $galleryImages = [];
        if (isset($data['gallery_images']) && is_array($data['gallery_images'])) {
            foreach ($data['gallery_images'] as $galleryImage) {
                $galleryName = time() . '_' . uniqid() . '.' . $galleryImage->getClientOriginalExtension();
                $galleryImage->move(public_path('assets/images/services/gallery'), $galleryName);
                $galleryImages[] = 'assets/images/services/gallery/' . $galleryName;
            }
        }
        $data['gallery_images'] = json_encode($galleryImages);
        return $this;
    }

    private function convertFeaturesToJson(array &$data): self
    {
        $data['features_ar'] = json_encode(explode(',', $data['features_ar']));
        $data['features_en'] = json_encode(explode(',', $data['features_en']));
        return $this;
    }

    private function setDefaults(array &$data): self
    {
        $data['featured'] = $data['featured'] ?? false;
        $data['sort_order'] = $data['sort_order'] ?? 0;
        $data['status'] = $data['status'] ?? true;
        return $this;
    }

    private function setDefaultImage(array &$data): self
    {
        if (!array_key_exists('image', $data) || $data['image'] === null) {
            $data['image'] = 'assets/img/photos/1.jpg';
        }
        return $this;
    }

    private function removeIcon(array &$data): self
    {
        unset($data['icon']);
        return $this;
    }

    private function createService(array $data): self
    {
        Service::create($data);
        return $this;
    }
}