<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use App\Models\Service;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index()
    {
        $portfolios = Portfolio::with('service')
            ->orderBy('sort_order')
            ->orderBy('is_featured', 'desc')
            ->get();
        
        return view('admin.portfolios.index', compact('portfolios'));
    }

    public function create()
    {
        $services = Service::where('status', true)->get();
        return view('admin.portfolios.create', compact('services'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title_ar' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'description_ar' => 'required|string',
            'description_en' => 'required|string',
            'client_name' => 'nullable|string|max:255',
            'project_date' => 'required|date',
            'location' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,jpg,png,gif,webp|max:2048',
            'videos' => 'nullable|file|mimes:mp4,avi,mov,wmv,flv,webm|max:10240',
            'technologies' => 'nullable|array',
            'technologies.*' => 'string|max:100',
            'service_id' => 'nullable|exists:services,id',
            'is_featured' => 'boolean',
            'is_active' => 'boolean',
            'sort_order' => 'integer|min:0',
        ]);

        $images = null;
        if ($request->hasFile('image')) {
                $image = $request->file('image');
                $path = $image->store('portfolio_images', 'public');
                $images = $path;
        }

        $videos = null;
        if ($request->hasFile('videos')) {
                $video = $request->file('videos');
                $path = $video->store('portfolio_videos', 'public');
                $videos = $path;
        }

        Portfolio::create([
            'title_ar' => $request->title_ar,
            'title_en' => $request->title_en,
            'description_ar' => $request->description_ar,
            'description_en' => $request->description_en,
            'client_name' => $request->client_name,
            'project_date' => $request->project_date,
            'location' => $request->location,
            'images' => $images,
            'videos' => $videos,
            'service_id' => $request->service_id,
            'is_featured' => $request->boolean('is_featured'),
            'is_active' => $request->boolean('is_active'),
            'sort_order' => $request->sort_order,
        ]);

        return redirect()->route('admin-portfolios.index')->with('success', 'تم إضافة العمل بنجاح');
    }

    public function edit(Portfolio $portfolio)
    {
        $services = Service::where('status', true)->get();
        return view('admin.portfolios.edit', compact('portfolio', 'services'));
    }

    public function update(Request $request, Portfolio $portfolio)
    {
        $request->validate([
            'title_ar' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'description_ar' => 'required|string',
            'description_en' => 'required|string',
            'client_name' => 'nullable|string|max:255',
            'project_date' => 'required|date',
            'location' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,jpg,png,gif,webp|max:2048',
            'videos' => 'nullable|file|mimes:mp4,avi,mov,wmv,flv,webm|max:10240',
            'technologies' => 'nullable|array',
            'technologies.*' => 'string|max:100',
            'service_id' => 'nullable|exists:services,id',
            'is_featured' => 'boolean',
            'is_active' => 'boolean',
            'sort_order' => 'integer|min:0',
        ]);

        $images = $portfolio->images ?? [];
        
        // // Handle images from AJAX removeImage function
        // if ($request->has('images') && is_string($request->images)) {
        //     $newImages = explode(',', $request->images);
            
        //     // Delete removed images from storage
        //     foreach ($images as $image) {
        //         if (!in_array($image, $newImages)) {
        //             $imagePath = storage_path('app/public/' . $image);
        //             if (file_exists($imagePath)) {
        //                 unlink($imagePath);
        //             }
        //         }
        //     }
            
        //     $images = array_filter($newImages); // Remove empty values
        // }
        
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store('portfolio_images', 'public');
            $images = $path;
        }

        $videos = $portfolio->videos ?? '';
        if ($request->hasFile('videos')) {
            $video = $request->file('videos');
            $path = $video->store('portfolio_videos', 'public');
            $videos = $path;
        }

        $portfolio->update([
            'title_ar' => $request->title_ar,
            'title_en' => $request->title_en,
            'description_ar' => $request->description_ar,
            'description_en' => $request->description_en,
            'client_name' => $request->client_name,
            'project_date' => $request->project_date,
            'location' => $request->location,
            'images' => $images,
            'videos' => $videos,
            'service_id' => $request->service_id,
            'is_featured' => $request->boolean('is_featured'),
            'is_active' => $request->boolean('is_active'),
            'sort_order' => $request->sort_order,
        ]);

        return redirect()->route('admin-portfolios.index')->with('success', 'تم تحديث العمل بنجاح');
    }

    public function destroy(Portfolio $portfolio)
    {
        // Delete image from storage if exists
        if ($portfolio->images) {
            $imagePath = storage_path('app/public/' . $portfolio->images);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        // Delete video from storage if exists
        if ($portfolio->videos) {
            $videoPath = storage_path('app/public/' . $portfolio->videos);
            if (file_exists($videoPath)) {
                unlink($videoPath);
            }
        }

        $portfolio->delete();
        
        if (request()->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'تم حذف العمل بنجاح'
            ]);
        }
        
        return redirect()->route('admin-portfolios.index')->with('delete', 'تم حذف العمل بنجاح');
    }
}
