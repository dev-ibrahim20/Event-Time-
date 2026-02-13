<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = Client::active()->ordered()->get();
        return view('admin.clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.clients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name_ar' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,jpg,png,gif,webp|max:2048',
            'website_url' => 'nullable|url',
            'sort_order' => 'integer|min:0',
            'is_active' => 'boolean',
        ]);

        $data = $request->except(['image']);

        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store('clients', 'public');
            $data['image'] = $path;
        }

        // Set defaults
        $data['sort_order'] = $request->sort_order ?? 0;
        $data['is_active'] = $request->is_active ?? true;

        Client::create($data);

        return redirect()->route('admin-clients.index')->with('success', 'تم إضافة العميل بنجاح');
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
    public function edit(Client $client)
    {
        return view('admin.clients.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client)
    {
        $request->validate([
            'name_ar' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,jpg,png,gif,webp|max:2048',
            'website_url' => 'nullable|url',
            'sort_order' => 'integer|min:0',
            'is_active' => 'boolean',
        ]);

        $data = $request->except(['image']);

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image
            if ($client->image) {
                $oldImagePath = storage_path('app/public/' . $client->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
            
            $image = $request->file('image');
            $path = $image->store('clients', 'public');
            $data['image'] = $path;
        }

        // Set defaults
        $data['sort_order'] = $request->sort_order ?? 0;
        $data['is_active'] = $request->is_active ?? true;

        $client->update($data);

        return redirect()->route('admin-clients.index')->with('success', 'تم تحديث العميل بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        // Delete image
        if ($client->image) {
            $imagePath = storage_path('app/public/' . $client->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        $client->delete();

        return redirect()->route('admin-clients.index')->with('delete', 'تم حذف العميل بنجاح');
    }
}
