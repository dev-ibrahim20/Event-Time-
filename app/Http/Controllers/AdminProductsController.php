<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Models\Product;

class AdminProductsController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(StoreProductRequest $request)
    {
        $data = $request->validated();

        // Handle image upload
        if (isset($data['image']) && $data['image'] !== null) {
            $image = $data['image'];
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets/images/products'), $imageName);
            $data['image'] = 'assets/images/products/' . $imageName;
        }

        // Handle checkboxes
        $data['featured'] = $request->has('featured') ? true : false;
        $data['status'] = $request->has('status') ? true : false;
        $data['sort_order'] = $data['sort_order'] ?? 0;

        Product::create($data);

        return redirect()->route('admin-products.index')->with('add', 'تم إضافة المنتج بنجاح');
    }

    public function edit(Product $admin_product)
    {
        return view('admin.products.edit', compact('admin_product'));
    }

    public function update(StoreProductRequest $request, Product $admin_product)
    {
        $data = $request->validated();

        // Handle image upload
        if (isset($data['image']) && $data['image'] !== null) {
            $image = $data['image'];
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets/images/products'), $imageName);
            $data['image'] = 'assets/images/products/' . $imageName;
        }

        // Handle checkboxes
        $data['featured'] = $request->has('featured') ? true : false;
        $data['status'] = $request->has('status') ? true : false;
        $data['sort_order'] = $data['sort_order'] ?? 0;

        $admin_product->update($data);

        return redirect()->route('admin-products.index')->with('edit', 'تم تعديل المنتج بنجاح');
    }

    public function destroy(Product $admin_product)
    {
        $admin_product->delete();
        return redirect()->route('admin-products.index')->with('delete', 'تم حذف المنتج بنجاح');
    }
}
