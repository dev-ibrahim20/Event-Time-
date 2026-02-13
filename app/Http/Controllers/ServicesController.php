<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreServiceRequest;
use App\Http\Traits\UploadsImages;
use App\Models\Service;
use App\Services\ServiceModelService;
use Illuminate\Http\Request;

class ServicesController extends Controller
{



    public function __construct(private ServiceModelService $serviceModelService){}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::all();
        return view('admin.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.services.new_services');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreServiceRequest $request)
    {
        $this->serviceModelService->create($request->validated());
        
        return redirect()->route('admin-services.index')->with('add', 'تم إضافة الخدمة بنجاح');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $service = Service::findOrFail($id);
        return view('admin.services.edit_services', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $service = Service::findOrFail($id);

        $validated = $request->validate([
            'title_ar' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'description_ar' => 'required|string',
            'description_en' => 'required|string',
            'slug' => 'required|string|max:255|unique:services,slug,' . $service->id,
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'gallery_images' => 'nullable|array',
            'gallery_images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'features_ar' => 'required|string',
            'features_en' => 'required|string',
            'featured' => 'nullable|boolean',
            'sort_order' => 'nullable|integer',
            'status' => 'nullable|boolean',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets/images/services'), $imageName);
            $validated['image'] = 'assets/images/services/' . $imageName;
        }

        $existingGallery = $service->gallery_images;
        if (is_string($existingGallery)) {
            $existingGallery = json_decode($existingGallery, true);
        }
        if (!is_array($existingGallery)) {
            $existingGallery = [];
        }

        $newGallery = [];
        if ($request->hasFile('gallery_images')) {
            foreach ($request->file('gallery_images') as $galleryImage) {
                $galleryName = time() . '_' . uniqid() . '.' . $galleryImage->getClientOriginalExtension();
                $galleryImage->move(public_path('assets/images/services/gallery'), $galleryName);
                $newGallery[] = 'assets/images/services/gallery/' . $galleryName;
            }
        }

        $validated['gallery_images'] = json_encode(array_values(array_merge($existingGallery, $newGallery)));

        $validated['features_ar'] = json_encode(explode(',', $request->features_ar));
        $validated['features_en'] = json_encode(explode(',', $request->features_en));

        $validated['featured'] = $request->featured ?? false;
        $validated['sort_order'] = $request->sort_order ?? 0;
        $validated['status'] = $request->status ?? true;

        unset($validated['icon']);

        try {
            $service->update($validated);
        } catch (\Throwable $e) {
            return back()->withErrors(['store' => $e->getMessage()])->withInput();
        }

        return redirect()->route('admin-services.index')->with('edit', 'تم تعديل الخدمة بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $service = Service::findOrFail($id);

        try {
            $service->delete();
        } catch (\Throwable $e) {
            return back()->withErrors(['store' => $e->getMessage()]);
        }

        return redirect()->route('admin-services.index')->with('delete', 'تم حذف الخدمة بنجاح');
    }
}
