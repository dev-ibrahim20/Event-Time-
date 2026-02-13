<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function index()
    {
        $aboutUs = AboutUs::first();
        return view('admin.about_us.index', compact('aboutUs'));
    }

    public function edit()
    {
        $aboutUs = AboutUs::first();
        return view('admin.about_us.edit', compact('aboutUs'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'company_introduction_ar' => 'nullable|string',
            'company_introduction_en' => 'nullable|string',
            'mission_ar' => 'nullable|string',
            'mission_en' => 'nullable|string',
            'vision_ar' => 'nullable|string',
            'vision_en' => 'nullable|string',
            'core_values_ar' => 'nullable|string',
            'core_values_en' => 'nullable|string',
            'message_ar' => 'nullable|string',
            'message_en' => 'nullable|string',
            'is_active' => 'boolean',
        ]);

        $aboutUs = AboutUs::first();
        
        if (!$aboutUs) {
            $aboutUs = AboutUs::create($request->all());
        } else {
            $aboutUs->update($request->all());
        }

        return redirect()->route('admin-about-us.index')->with('success', 'تم تحديث صفحة من نحن بنجاح');
    }
}
