@extends('layouts.app')
@section('title')
تعديل معرض الاعمال
@stop
@section('page-header')
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">الأعمال</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    تعديل العمل</span>
            </div>
        </div>
    </div>
@endsection

@section('content')
<div>
    <div class="row">
        <div class="col-xl-12">
            <div class="card mg-b-20">
                <div class="card-header pb-0">
                    <h4 class="card-title mg-b-0">تعديل العمل: {{ $portfolio->title }}</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin-portfolios.update', $portfolio->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="title_ar">العنوان بالعربية <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="title_ar" name="title_ar" value="{{ $portfolio->title_ar }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="title_en">العنوان بالإنجليزية <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="title_en" name="title_en" value="{{ $portfolio->title_en }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="description_ar">الوصف بالعربية <span class="text-danger">*</span></label>
                                    <textarea class="form-control" id="description_ar" name="description_ar" rows="4" required>{{ $portfolio->description_ar }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="description_en">الوصف بالإنجليزية <span class="text-danger">*</span></label>
                                    <textarea class="form-control" id="description_en" name="description_en" rows="4" required>{{ $portfolio->description_en }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="client_name">اسم العميل</label>
                                    <input type="text" class="form-control" id="client_name" name="client_name" value="{{ $portfolio->client_name }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="project_date">تاريخ المشروع <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" id="project_date" name="project_date" value="{{ $portfolio->project_date ? $portfolio->project_date->format('Y-m-d') : '' }}" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="location">الموقع</label>
                                    <input type="text" class="form-control" id="location" name="location" value="{{ $portfolio->location }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="service_id">الخدمة المرتبطة</label>
                                    <select class="form-control" id="service_id" name="service_id">
                                        <option value="">اختر خدمة</option>
                                        @foreach ($services as $service)
                                            <option value="{{ $service->id }}" {{ $portfolio->service_id == $service->id ? 'selected' : '' }}>
                                                {{ $service->title_ar ?? $service->title_en }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="is_featured">
                                        <input type="checkbox" id="is_featured" name="is_featured" value="1" {{ $portfolio->is_featured ? 'checked' : '' }}>
                                        عمل مميز
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="is_active">
                                        <input type="checkbox" id="is_active" name="is_active" value="1" {{ $portfolio->is_active ? 'checked' : '' }}>
                                        نشط
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="sort_order">الترتيب</label>
                                    <input type="number" class="form-control" id="sort_order" name="sort_order" value="{{ $portfolio->sort_order }}" min="0">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="images">الصور الحالية</label>
                                    <input type="hidden" name="current_images" id="current_images" value="{{ is_string($portfolio->images) ? $portfolio->images : '' }}">
                                    @if($portfolio->images )
                                        <div class="alert alert-info">
                                            <i class="fas fa-info-circle"></i>
                                            صورة محملة بالفعل
                                        </div>
                                        <div class="row">
                                                <div class="col-md-3 mb-2" >
                                                    <img src="{{ asset('storage/' . $portfolio->images) }}" alt="Portfolio Image" 
                                                         class="img-fluid rounded" style="max-height: 100px; object-fit: cover;">
                                                </div>
                                        </div>
                                    @else
                                        <span class="text-muted">لا توجد صور</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="new_images">إضافة صور جديدة</label>
                                    <input type="file" class="form-control" id="new_images" name="images" multiple accept="image/*">
                                    <small class="text-muted">يمكنك رفع عدة صور</small>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="videos">الفيديوهات الحالية</label>
                                    <input type="hidden" name="current_videos" id="current_videos" value="{{ is_string($portfolio->videos) ? $portfolio->videos : '' }}">
                                    @if($portfolio->videos )
                                        <div class="alert alert-info">
                                            <i class="fas fa-info-circle"></i>
                                            فيديو محمل بالفعل
                                        </div>
                                        <div class="row">
                                                <div class="col-md-3 mb-2" >
                                                    <video src="{{ asset('storage/' . $portfolio->videos) }}" alt="Portfolio Video" 
                                                         class="img-fluid rounded" style="max-height: 100px; object-fit: cover;" controls></video>
                                                </div>
                                        </div>
                                    @else
                                        <span class="text-muted">لا توجد فيديوهات</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="new_videos">إضافة فيديو جديد</label>
                                    <input type="file" class="form-control" id="new_videos" name="videos" accept="video/*">
                                    <small class="text-muted">يمكنك رفع فيديو واحد فقط</small>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="d-flex gap-2">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-save"></i> تحديث العمل
                                    </button>
                                    <a href="{{ route('admin-portfolios.index') }}" class="btn btn-secondary">
                                        <i class="fas fa-times"></i> إلغاء
                                    </a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@if (session()->has('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>{{ session()->get('error') }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{ session()->get('success') }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

<script>
// Remove image from portfolio
function removeImage(index) {
    if (confirm('هل أنت متأكد من حذف هذه الصورة؟')) {
        // Get current images array from hidden input
        const imagesInput = document.getElementById('current_images');
        let currentImages = imagesInput.value ? imagesInput.value.split(',') : [];
        
        // Remove the image at the specified index
        const removedImage = currentImages[index];
        currentImages.splice(index, 1);
        
        // Filter out empty values
        currentImages = currentImages.filter(img => img && img.trim() !== '');
        
        // Update the hidden input
        imagesInput.value = currentImages.join(',');
        
        // Remove the image from display immediately
        const imageContainer = document.getElementById('image-container-' + index);
        if (imageContainer) {
            imageContainer.remove();
        }
        
        // Send AJAX request to update database
        $.ajax({
            url: '{{ route("admin-portfolios.update", $portfolio->id) }}',
            method: 'POST',
            data: {
                '_token': '{{ csrf_token() }}',
                '_method': 'PUT',
                'images': currentImages.join(',')
            },
            success: function(response) {
                // Show success notification
                notif({
                    msg: "تم حذف الصورة بنجاح",
                    type: "success"
                });
                
                // Update the image count
                const countElement = document.querySelector('.alert-info');
                if (countElement) {
                    countElement.innerHTML = `<i class="fas fa-info-circle"></i> ${currentImages.length} صور محملة بالفعل`;
                }
            },
            error: function(xhr) {
                // Show error notification
                notif({
                    msg: "حدث خطأ أثناء حذف الصورة",
                    type: "error"
                });
                
                // Reload page on error to restore state
                setTimeout(function() {
                    location.reload();
                }, 2000);
            }
        });
    }
}
</script>
@endsection
