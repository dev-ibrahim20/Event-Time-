<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOfferRequest;
use App\Models\Offer;
use App\Models\Service;

class AdminOffersController extends Controller
{
    public function index()
    {
        $offers = Offer::with('service')->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.offers.index', compact('offers'));
    }

    public function create()
    {
        $services = Service::where('status', true)->orderBy('title_ar')->get();
        return view('admin.offers.create', compact('services'));
    }

    public function store(StoreOfferRequest $request)
    {
        $data = $request->validated();

        // Handle image upload
        if (isset($data['image']) && $data['image'] !== null) {
            $image = $data['image'];
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets/images/offers'), $imageName);
            $data['image'] = 'assets/images/offers/' . $imageName;
        }

        // Handle status checkbox - if not checked, set to false
        $data['status'] = $request->has('status') ? true : false;
        $data['sort_order'] = $data['sort_order'] ?? 0;

        Offer::create($data);

        return redirect()->route('admin-offers.index')->with('add', 'تم إضافة العرض بنجاح');
    }

    public function edit(Offer $admin_offer)
    {
        $services = Service::where('status', true)->orderBy('title_ar')->get();
        return view('admin.offers.edit', compact('admin_offer', 'services'));
    }

    public function update(StoreOfferRequest $request, Offer $admin_offer)
    {
        $data = $request->validated();

        // Handle image upload
        if (isset($data['image']) && $data['image'] !== null) {
            $image = $data['image'];
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets/images/offers'), $imageName);
            $data['image'] = 'assets/images/offers/' . $imageName;
        }

        // Handle status checkbox - if not checked, set to false
        $data['status'] = $request->has('status') ? true : false;
        $data['sort_order'] = $data['sort_order'] ?? 0;

        $admin_offer->update($data);

        return redirect()->route('admin-offers.index')->with('edit', 'تم تعديل العرض بنجاح');
    }

    public function destroy(Offer $admin_offer)
    {
        $admin_offer->delete();
        return redirect()->route('admin-offers.index')->with('delete', 'تم حذف العرض بنجاح');
    }
}
