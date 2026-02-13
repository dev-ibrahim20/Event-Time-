@extends('layouts.app')
@section('title')
    تعديل منتج
@stop
@section('css')
<!--  Owl-carousel css-->
<link href="{{URL::asset('assets/plugins/owl-carousel/owl.carousel.css')}}" rel="stylesheet" />
<!-- Maps css -->
<link href="{{URL::asset('assets/plugins/jqvmap/jqvmap.min.css')}}" rel="stylesheet">
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">المنتجات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    تعديل منتج</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
        <div>
            <!-- row -->
            <div class="row">
                    <!--div-->
                    <div class="col-xl-12">
                        <div class="card mg-b-20">
                            <div class="card-header pb-0">
                            <div class="d-flex justify-content-between">
                                <h4 class="card-title mg-b-0">تعديل المنتج</h4>
                                <i class="mdi mdi-dots-horizontal text-gray"></i>
                            </div>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('admin-products.update', $admin_product->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="title_ar">اسم المنتج بالعربي <span class="text-danger">*</span></label>
                                                <input type="text" name="title_ar" id="title_ar" class="form-control @error('title_ar') is-invalid @enderror" 
                                                       value="{{ old('title_ar', $admin_product->title_ar) }}" required>
                                                @error('title_ar')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="title_en">اسم المنتج بالإنجليزي <span class="text-danger">*</span></label>
                                                <input type="text" name="title_en" id="title_en" class="form-control @error('title_en') is-invalid @enderror" 
                                                       value="{{ old('title_en', $admin_product->title_en) }}" required>
                                                @error('title_en')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="category_ar">التصنيف بالعربي</label>
                                                <input type="text" name="category_ar" id="category_ar" class="form-control @error('category_ar') is-invalid @enderror" 
                                                       value="{{ old('category_ar', $admin_product->category_ar) }}" placeholder="مثال: إلكترونيات، ملابس">
                                                @error('category_ar')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="category_en">التصنيف بالإنجليزي</label>
                                                <input type="text" name="category_en" id="category_en" class="form-control @error('category_en') is-invalid @enderror" 
                                                       value="{{ old('category_en', $admin_product->category_en) }}" placeholder="Example: Electronics, Clothes">
                                                @error('category_en')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="price">السعر <span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <input type="number" name="price" id="price" class="form-control @error('price') is-invalid @enderror" 
                                                           value="{{ old('price', $admin_product->price) }}" min="0" step="0.01" required>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">ريال</span>
                                                    </div>
                                                </div>
                                                @error('price')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="sort_order">ترتيب المنتج</label>
                                                <input type="number" name="sort_order" id="sort_order" class="form-control @error('sort_order') is-invalid @enderror" 
                                                       value="{{ old('sort_order', $admin_product->sort_order) }}" min="0">
                                                @error('sort_order')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="image">صورة المنتج</label>
                                                <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror" 
                                                       accept="image/*">
                                                @if($admin_product->image)
                                                    <br>
                                                    <img src="{{ asset($admin_product->image) }}" alt="صورة المنتج" style="max-width: 100px; max-height: 100px; border-radius: 5px;">
                                                    <br>
                                                    <small class="text-muted">اترك الحقل فارغاً للحفاظ على الصورة الحالية</small>
                                                @endif
                                                @error('image')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                                <small class="text-muted">الصورة يجب أن تكون من نوع: jpeg, png, jpg, gif وحجمها لا يزيد عن 2 ميجابايت</small>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="description_ar">وصف المنتج بالعربي <span class="text-danger">*</span></label>
                                                <textarea name="description_ar" id="description_ar" class="form-control @error('description_ar') is-invalid @enderror" 
                                                          rows="6" required>{{ old('description_ar', $admin_product->description_ar) }}</textarea>
                                                @error('description_ar')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="description_en">وصف المنتج بالإنجليزي <span class="text-danger">*</span></label>
                                                <textarea name="description_en" id="description_en" class="form-control @error('description_en') is-invalid @enderror" 
                                                          rows="6" required>{{ old('description_en', $admin_product->description_en) }}</textarea>
                                                @error('description_en')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="featured">منتج مميز</label>
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" name="featured" id="featured" class="custom-control-input" value="1" {{ old('featured', $admin_product->featured) ? 'checked' : '' }}>
                                                    <label class="custom-control-label" for="featured">مميز</label>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="status">الحالة</label>
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" name="status" id="status" class="custom-control-input" value="1" {{ old('status', $admin_product->status) ? 'checked' : '' }}>
                                                    <label class="custom-control-label" for="status">نشط</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fas fa-save"></i> تحديث المنتج
                                        </button>
                                        <a href="{{ route('admin-products.index') }}" class="btn btn-secondary">
                                            <i class="fas fa-arrow-left"></i> رجوع
                                        </a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!--/div-->

            </div>

            <!-- row closed -->
        </div>
        <!-- Container closed -->
    </div>
    <!-- main-content closed -->
</div>
@endsection
@section('js')
<!--Internal  Chart.bundle js -->
<script src="{{URL::asset('assets/plugins/chart.js/Chart.bundle.min.js')}}"></script>
<!-- Moment js -->
<script src="{{URL::asset('assets/plugins/raphael/raphael.min.js')}}"></script>
<!--Internal  Flot js-->
<script src="{{URL::asset('assets/plugins/jquery.flot/jquery.flot.js')}}"></script>
<script src="{{URL::asset('assets/plugins/jquery.flot/jquery.flot.pie.js')}}"></script>
<!--Internal Apexchart js-->
<!-- Don't load apexcharts.js on products page to avoid errors -->
<!-- Internal Map -->
<script src="{{URL::asset('assets/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<script src="{{URL::asset('assets/js/modal-popup.js')}}"></script>
<!-- Don't load index.js on products page to avoid chart errors -->
@endsection
