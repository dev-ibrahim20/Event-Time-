@extends('layouts.app')
@section('title')
Dashboard - Edit Service
@stop
@section('css')
<link href="{{URL::asset('assets/plugins/owl-carousel/owl.carousel.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/jqvmap/jqvmap.min.css')}}" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/dropify/0.2.2/css/dropify.min.css" rel="stylesheet">
<style>
    .image-preview {
        max-width: 200px;
        max-height: 200px;
        margin-top: 10px;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }
    .gallery-preview {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        margin-top: 10px;
    }
    .gallery-preview img {
        width: 80px;
        height: 80px;
        object-fit: cover;
        border-radius: 6px;
        border: 2px solid #e9ecef;
    }
    .form-group {
        margin-bottom: 1.5rem;
    }
    .custom-switch {
        position: relative;
        display: inline-block;
        width: 50px;
        height: 24px;
    }
    .custom-switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }
    .custom-slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        transition: 0.4s;
        border-radius: 24px;
    }
    .custom-slider:before {
        position: absolute;
        content: "";
        height: 18px;
        width: 18px;
        left: 3px;
        bottom: 3px;
        background-color: white;
        transition: 0.4s;
        border-radius: 50%;
    }
    input:checked + .custom-slider {
        background-color: #007bff;
    }
    input:checked + .custom-slider:before {
        transform: translateX(26px);
    }
</style>
@endsection
@section('page-header')
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">الخدمات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    تعديل خدمة</span>
            </div>
        </div>
    </div>
@endsection
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">تعديل خدمة</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin-services.update', $service->id) }}" method="post" enctype="multipart/form-data" id="serviceForm">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="title_ar" class="form-label">اسم الخدمة بالعربي <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="title_ar" name="title_ar"
                                        value="{{ old('title_ar', $service->title_ar) }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="title_en" class="form-label">اسم الخدمة بالإنجليزي <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="title_en" name="title_en"
                                        value="{{ old('title_en', $service->title_en) }}" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="slug" class="form-label">Slug <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="slug" name="slug"
                                        value="{{ old('slug', $service->slug) }}" required>
                                    <small class="form-text text-muted">سيتم استخدامه في رابط الخدمة</small>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="description_ar" class="form-label">الوصف بالعربي <span class="text-danger">*</span></label>
                                    <textarea class="form-control" id="description_ar" name="description_ar" rows="4" required>{{ old('description_ar', $service->description_ar) }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="description_en" class="form-label">الوصف بالإنجليزي <span class="text-danger">*</span></label>
                                    <textarea class="form-control" id="description_en" name="description_en" rows="4" required>{{ old('description_en', $service->description_en) }}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="features_ar" class="form-label">المميزات بالعربي <span class="text-danger">*</span></label>
                                    <textarea class="form-control" id="features_ar" name="features_ar" rows="3" required>{{ old('features_ar', is_array($service->features_ar) ? implode(', ', $service->features_ar) : $service->features_ar) }}</textarea>
                                    <small class="form-text text-muted">افصل بين كل مميزة بفاصلة</small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="features_en" class="form-label">المميزات بالإنجليزي <span class="text-danger">*</span></label>
                                    <textarea class="form-control" id="features_en" name="features_en" rows="3" required>{{ old('features_en', is_array($service->features_en) ? implode(', ', $service->features_en) : $service->features_en) }}</textarea>
                                    <small class="form-text text-muted">Separate each feature with a comma</small>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="image" class="form-label">الصورة الرئيسية</label>
                                    <input type="file" class="form-control" id="image" name="image" accept="image/*">
                                    @if($service->image)
                                        <div class="mt-2">
                                            <img src="{{ asset($service->image) }}" alt="{{ $service->title_ar }}" class="image-preview">
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="gallery_images" class="form-label">معرض الصور</label>
                                    <input type="file" class="form-control" id="gallery_images" name="gallery_images[]" accept="image/*" multiple>
                                    @php
                                        $gallery = $service->gallery_images;
                                        if (is_string($gallery)) {
                                            $gallery = json_decode($gallery, true);
                                        }
                                    @endphp
                                    @if(is_array($gallery) && count($gallery) > 0)
                                        <div class="gallery-preview">
                                            @foreach($gallery as $img)
                                                <img src="{{ asset($img) }}" alt="Gallery">
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="sort_order" class="form-label">ترتيب العرض</label>
                                    <input type="number" class="form-control" id="sort_order" name="sort_order"
                                        value="{{ old('sort_order', $service->sort_order) }}" min="0">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label d-block mb-2">خدمة مميزة</label>
                                    <label class="custom-switch">
                                        <input type="checkbox" name="featured" value="1" {{ old('featured', $service->featured) ? 'checked' : '' }}>
                                        <span class="custom-slider"></span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label d-block mb-2">الحالة</label>
                                    <label class="custom-switch">
                                        <input type="checkbox" name="status" value="1" {{ old('status', $service->status) ? 'checked' : '' }}>
                                        <span class="custom-slider"></span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="d-flex justify-content-between">
                                    <a href="{{ route('admin-services.index') }}" class="btn btn-secondary">
                                        <i class="fas fa-times"></i> إلغاء
                                    </a>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-save"></i> حفظ التعديلات
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
<script src="{{URL::asset('assets/plugins/chart.js/Chart.bundle.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/raphael/raphael.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/jquery.flot/jquery.flot.js')}}"></script>
<script src="{{URL::asset('assets/plugins/jquery.flot/jquery.flot.pie.js')}}"></script>
<script src="{{URL::asset('assets/plugins/jquery.flot/jquery.flot.resize.js')}}"></script>
<script src="{{URL::asset('assets/plugins/jquery.flot/jquery.flot.categories.js')}}"></script>
<script src="{{URL::asset('assets/js/dashboard.sampledata.js')}}"></script>
@endsection
