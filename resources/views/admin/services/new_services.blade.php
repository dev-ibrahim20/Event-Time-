@extends('layouts.app')
@section('title')
Dashboard - Add New Service
@stop
@section('css')
<!--  Owl-carousel css-->
<link href="{{URL::asset('assets/plugins/owl-carousel/owl.carousel.css')}}" rel="stylesheet" />
<!-- Maps css -->
<link href="{{URL::asset('assets/plugins/jqvmap/jqvmap.min.css')}}" rel="stylesheet">
<!-- Dropify CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/dropify/0.2.2/css/dropify.min.css" rel="stylesheet">
<!-- Image preview CSS -->
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
        transition: .4s;
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
        transition: .4s;
        border-radius: 50%;
    }
    input:checked + .custom-slider {
        background-color: #2196F3;
    }
    input:checked + .custom-slider:before {
        transform: translateX(26px);
    }
</style>
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">الخدمات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    إضافة خدمة جديدة</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('success') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

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
                    <h4 class="card-title">إضافة خدمة جديدة</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin-services.store') }}" method="post" enctype="multipart/form-data" id="serviceForm">
                        @csrf
                        
                        <!-- Basic Information -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="title_ar" class="form-label">اسم الخدمة بالعربي <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="title_ar" name="title_ar"
                                        placeholder="اسم الخدمة بالعربي" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="title_en" class="form-label">اسم الخدمة بالإنجليزي <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="title_en" name="title_en"
                                        placeholder="Service Name in English" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="slug" class="form-label">Slug <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="slug" name="slug"
                                        placeholder="service-name" required>
                                    <small class="form-text text-muted">سيتم استخدامه في رابط الخدمة</small>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="description_ar" class="form-label">الوصف بالعربي <span class="text-danger">*</span></label>
                                    <textarea class="form-control" id="description_ar" name="description_ar"
                                        placeholder="وصف الخدمة بالعربي" rows="4" required></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="description_en" class="form-label">الوصف بالإنجليزي <span class="text-danger">*</span></label>
                                    <textarea class="form-control" id="description_en" name="description_en"
                                        placeholder="Service Description in English" rows="4" required></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="features_ar" class="form-label">المميزات بالعربي <span class="text-danger">*</span></label>
                                    <textarea class="form-control" id="features_ar" name="features_ar"
                                        placeholder="مميزة 1, مميزة 2, مميزة 3" rows="3" required></textarea>
                                    <small class="form-text text-muted">افصل بين كل مميزة بفاصلة</small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="features_en" class="form-label">المميزات بالإنجليزي <span class="text-danger">*</span></label>
                                    <textarea class="form-control" id="features_en" name="features_en"
                                        placeholder="Feature 1, Feature 2, Feature 3" rows="3" required></textarea>
                                    <small class="form-text text-muted">Separate each feature with a comma</small>
                                </div>
                            </div>
                        </div>

                        <!-- Images Section -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="image" class="form-label">الصورة الرئيسية</label>
                                    <input type="file" class="form-control" id="image" name="image"
                                        accept="image/*" onchange="previewImage(this, 'mainPreview')">
                                    <div id="mainPreview" class="image-preview" style="display: none;">
                                        <img src="" alt="Main Image Preview" style="width: 100%; height: 100%; object-fit: cover;">
                                    </div>
                                    <small class="form-text text-muted">صيغ مدعومة: jpeg, png, jpg, gif (أقصى حجم: 2MB)</small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="gallery_images" class="form-label">معرض الصور</label>
                                    <input type="file" class="form-control" id="gallery_images" name="gallery_images[]"
                                        accept="image/*" multiple onchange="previewGallery(this, 'galleryPreview')">
                                    <div id="galleryPreview" class="gallery-preview"></div>
                                    <small class="form-text text-muted">يمكنك اختيار أكثر من صورة</small>
                                </div>
                            </div>
                        </div>

                        <!-- Options Section -->
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="sort_order" class="form-label">ترتيب العرض</label>
                                    <input type="number" class="form-control" id="sort_order" name="sort_order"
                                        value="0" min="0">
                                    <small class="form-text text-muted">كلما كان الرقم أصغر، كلما كان العرض أسبق</small>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label d-block mb-2">خدمة مميزة</label>
                                    <label class="custom-switch">
                                        <input type="checkbox" name="featured" value="1">
                                        <span class="custom-slider"></span>
                                    </label>
                                    <small class="form-text text-muted">سيتم عرض الخدمة في الصفحة الرئيسية</small>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label d-block mb-2">الحالة</label>
                                    <label class="custom-switch">
                                        <input type="checkbox" name="status" value="1" checked>
                                        <span class="custom-slider"></span>
                                    </label>
                                    <small class="form-text text-muted">نشط = سيتم عرض الخدمة</small>
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
                                        <i class="fas fa-save"></i> حفظ الخدمة
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
<!--Internal  Chart.bundle js -->
<script src="{{URL::asset('assets/plugins/chart.js/Chart.bundle.min.js')}}"></script>
<!-- Moment js -->
<script src="{{URL::asset('assets/plugins/raphael/raphael.min.js')}}"></script>
<!--Internal  Flot js-->
<script src="{{URL::asset('assets/plugins/jquery.flot/jquery.flot.js')}}"></script>
<script src="{{URL::asset('assets/plugins/jquery.flot/jquery.flot.pie.js')}}"></script>
<script src="{{URL::asset('assets/plugins/jquery.flot/jquery.flot.resize.js')}}"></script>
<script src="{{URL::asset('assets/plugins/jquery.flot/jquery.flot.categories.js')}}"></script>
<script src="{{URL::asset('assets/js/dashboard.sampledata.js')}}"></script>
<script src="{{URL::asset('assets/js/chart.flot.sampledata.js')}}"></script>
<!--Internal Apexchart js-->
<script src="{{URL::asset('assets/js/apexcharts.js')}}"></script>
<!-- Internal Map -->
<script src="{{URL::asset('assets/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<script src="{{URL::asset('assets/js/modal-popup.js')}}"></script>
<!--Internal  index js -->
<script src="{{URL::asset('assets/js/index.js')}}"></script>
<script src="{{URL::asset('assets/js/jquery.vmap.sampledata.js')}}"></script>
<!-- Dropify JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropify/0.2.2/js/dropify.min.js"></script>
<script>
// Image preview functions
function previewImage(input, previewId) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById(previewId).style.display = 'block';
            document.querySelector('#' + previewId + ' img').src = e.target.result;
        }
        reader.readAsDataURL(input.files[0]);
    }
}

function previewGallery(input, previewId) {
    var preview = document.getElementById(previewId);
    preview.innerHTML = '';
    
    if (input.files) {
        for (var i = 0; i < input.files.length; i++) {
            var reader = new FileReader();
            reader.onload = function(e) {
                var img = document.createElement('img');
                img.src = e.target.result;
                img.className = 'img-thumbnail';
                img.style.cursor = 'pointer';
                img.onclick = function() {
                    window.open(e.target.result, '_blank');
                };
                preview.appendChild(img);
            }
            reader.readAsDataURL(input.files[i]);
        }
    }
}

// Auto-generate slug from title
document.getElementById('title_ar').addEventListener('input', function() {
    var title = this.value;
    var slug = title.toLowerCase()
        .replace(/[^a-z0-9\s-]/g, '')
        .replace(/\s+/g, '-')
        .replace(/-+/g, '-');
    document.getElementById('slug').value = slug;
});

// Form validation
document.getElementById('serviceForm').addEventListener('submit', function(e) {
    var titleAr = document.getElementById('title_ar').value.trim();
    var titleEn = document.getElementById('title_en').value.trim();
    var descriptionAr = document.getElementById('description_ar').value.trim();
    var descriptionEn = document.getElementById('description_en').value.trim();
    var slug = document.getElementById('slug').value.trim();
    var featuresAr = document.getElementById('features_ar').value.trim();
    var featuresEn = document.getElementById('features_en').value.trim();
    
    if (!titleAr || !titleEn || !descriptionAr || !descriptionEn || !slug || !featuresAr || !featuresEn) {
        e.preventDefault();
        alert('يرجى ملء جميع الحقول المطلوبة');
        return false;
    }
    
    // Validate features format
    if (featuresAr.split(',').length < 2 || featuresEn.split(',').length < 2) {
        e.preventDefault();
        alert('يرجى إدخال مميزتين على الأقل');
        return false;
    }
});

// Initialize Dropify
$(document).ready(function() {
    $('.dropify').dropify({
        messages: {
            'default': 'اسحب وأفلت الصور هنا أو انقر للاختيار',
            'replace': 'اسحب وأفلت الصور هنا أو انقر للاستبدال',
            'remove': 'حذف',
            'error': 'حدث خطأ أثناء تحميل الملف'
        }
    });
});
</script>
@endsection
