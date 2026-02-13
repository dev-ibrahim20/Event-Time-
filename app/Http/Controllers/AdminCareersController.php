<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCareerRequest;
use App\Models\Career;

class AdminCareersController extends Controller
{
    public function index()
    {
        $careers = Career::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.careers.index', compact('careers'));
    }

    public function create()
    {
        return view('admin.careers.create');
    }

    public function store(StoreCareerRequest $request)
    {
        $data = $request->validated();

        // Handle status checkbox
        $data['status'] = $request->has('status') ? true : false;
        $data['sort_order'] = $data['sort_order'] ?? 0;

        Career::create($data);

        return redirect()->route('admin-careers.index')->with('add', 'تم إضافة الوظيفة بنجاح');
    }

    public function edit(Career $admin_career)
    {
        return view('admin.careers.edit', compact('admin_career'));
    }

    public function update(StoreCareerRequest $request, Career $admin_career)
    {
        $data = $request->validated();

        // Handle status checkbox
        $data['status'] = $request->has('status') ? true : false;
        $data['sort_order'] = $data['sort_order'] ?? 0;

        $admin_career->update($data);

        return redirect()->route('admin-careers.index')->with('edit', 'تم تعديل الوظيفة بنجاح');
    }

    public function destroy(Career $admin_career)
    {
        $admin_career->delete();
        return redirect()->route('admin-careers.index')->with('delete', 'تم حذف الوظيفة بنجاح');
    }
}
