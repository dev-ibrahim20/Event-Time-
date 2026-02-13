<?php

namespace App\Http\Controllers;

use App\Models\Papers;
use Illuminate\Http\Request;

class PapersController extends Controller
{
    public function index()
    {
        $papers = Papers::first();
        return view('admin.papers.index', compact('papers'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'quality_image' => 'nullable|image|mimes:jpeg,jpg,png,gif,webp|max:2048',
            'official_image' => 'nullable|image|mimes:jpeg,jpg,png,gif,webp|max:2048',
        ]);

        $papers = Papers::first();
        
        if (!$papers) {
            $papers = Papers::create([
                'quality_certificates_images' => [],
                'official_papers_images' => [],
            ]);
        }
        
        $data = [];
        
        // Handle quality certificate image upload
        if ($request->hasFile('quality_image')) {
            $image = $request->file('quality_image');
            $path = $image->store('papers/quality_certificates', 'public');
            $existingImages = $papers->quality_certificates_images ?? [];
            $existingImages[] = $path;
            $data['quality_certificates_images'] = $existingImages;
        }
        
        // Handle official paper image upload
        if ($request->hasFile('official_image')) {
            $image = $request->file('official_image');
            $path = $image->store('papers/official_papers', 'public');
            $existingImages = $papers->official_papers_images ?? [];
            $existingImages[] = $path;
            $data['official_papers_images'] = $existingImages;
        }
        
        if (!empty($data)) {
            $papers->update($data);
        }

        if ($request->ajax()) {
            return response()->json(['success' => true, 'message' => 'تمت الإضافة بنجاح']);
        }

        return redirect()->route('admin-papers.index')->with('success', 'تم تحديث صفحة الأوراق بنجاح');
    }

    public function destroy(Request $request, Papers $papers)
    {
        $request->validate([
            'delete_quality_index' => 'nullable|integer|min:0',
            'delete_official_index' => 'nullable|integer|min:0',
        ]);

        if ($request->has('delete_quality_index')) {
            $existingImages = $papers->quality_certificates_images ?? [];
            if (isset($existingImages[$request->delete_quality_index])) {
                $imagePath = storage_path('app/public/' . $existingImages[$request->delete_quality_index]);
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
                array_splice($existingImages, $request->delete_quality_index, 1);
                $papers->update(['quality_certificates_images' => $existingImages]);
            }
            
            return redirect()->route('admin-papers.index')->with('success', 'تم حذف شهادة الجودة بنجاح');
        }
        
        if ($request->has('delete_official_index')) {
            $existingImages = $papers->official_papers_images ?? [];
            if (isset($existingImages[$request->delete_official_index])) {
                $imagePath = storage_path('app/public/' . $existingImages[$request->delete_official_index]);
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
                array_splice($existingImages, $request->delete_official_index, 1);
                $papers->update(['official_papers_images' => $existingImages]);
            }
            
            return redirect()->route('admin-papers.index')->with('success', 'تم حذف الشهادة الرسمية بنجاح');
        }

        return redirect()->route('admin-papers.index')->with('error', 'لم يتم تحديد أي صورة للحذف');
    }
}
