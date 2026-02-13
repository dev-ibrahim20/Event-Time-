<?php

namespace App\Http\Controllers;

use App\Models\TeamMember;
use Illuminate\Http\Request;

class TeamMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teamMembers = TeamMember::active()->ordered()->get();
        return view('admin.team_members.index', compact('teamMembers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.team_members.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name_ar' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'position_ar' => 'required|string|max:255',
            'position_en' => 'required|string|max:255',
            'bio_ar' => 'nullable|string',
            'bio_en' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,jpg,png,gif,webp|max:2048',
            'twitter_link' => 'nullable|url',
            'facebook_link' => 'nullable|url',
            'linkedin_link' => 'nullable|url',
            'instagram_link' => 'nullable|url',
            'featured' => 'boolean',
            'sort_order' => 'integer|min:0',
            'status' => 'boolean',
        ]);

        $data = $request->except(['image']);

        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store('team_members', 'public');
            $data['image'] = $path;
        }

        // Set defaults
        $data['featured'] = $request->featured ?? false;
        $data['sort_order'] = $request->sort_order ?? 0;
        $data['status'] = $request->status ?? true;

        TeamMember::create($data);

        return redirect()->route('admin-team-members.index')->with('success', 'تم إضافة عضو الفريق بنجاح');
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
    public function edit(TeamMember $teamMember)
    {
        return view('admin.team_members.edit', compact('teamMember'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TeamMember $teamMember)
    {
        $request->validate([
            'name_ar' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'position_ar' => 'required|string|max:255',
            'position_en' => 'required|string|max:255',
            'bio_ar' => 'nullable|string',
            'bio_en' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,jpg,png,gif,webp|max:2048',
            'twitter_link' => 'nullable|url',
            'facebook_link' => 'nullable|url',
            'linkedin_link' => 'nullable|url',
            'instagram_link' => 'nullable|url',
            'featured' => 'boolean',
            'sort_order' => 'integer|min:0',
            'status' => 'boolean',
        ]);

        $data = $request->except(['image']);

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image
            if ($teamMember->image) {
                $oldImagePath = storage_path('app/public/' . $teamMember->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
            
            $image = $request->file('image');
            $path = $image->store('team_members', 'public');
            $data['image'] = $path;
        }

        // Set defaults
        $data['featured'] = $request->featured ?? false;
        $data['sort_order'] = $request->sort_order ?? 0;
        $data['status'] = $request->status ?? true;

        $teamMember->update($data);

        return redirect()->route('admin-team-members.index')->with('success', 'تم تحديث عضو الفريق بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TeamMember $teamMember)
    {
        // Delete image
        if ($teamMember->image) {
            $imagePath = storage_path('app/public/' . $teamMember->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        $teamMember->delete();

        return redirect()->route('admin-team-members.index')->with('delete', 'تم حذف عضو الفريق بنجاح');
    }
}
