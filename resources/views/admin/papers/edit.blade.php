@extends('layouts.app')
@section('title')
Dashboard - Papers
@stop
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">تعديل صفحة الأوراق</h3>
                    <div class="card-tools">
                        <a href="{{ route('admin-papers.index') }}" class="btn btn-secondary btn-sm">
                            <i class="fas fa-arrow-left"></i> رجوع
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin-papers.update') }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="image_type">نوع الصورة</label>
                                    <select class="form-control" id="image_type" name="image_type" onchange="toggleImageUpload()">
                                        <option value="">اختر نوع الصورة</option>
                                        <option value="quality_certificates">شهادة جودة</option>
                                        <option value="official_papers">شهادة رسمية</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="image_upload">رفع الصورة</label>
                                    <input type="file" class="form-control" id="image_upload" name="image_upload" accept="image/*">
                                    <small class="text-muted">اختر نوع الصورة أولاً، ثم ارفع الصورة</small>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="official_papers_ar">الأوراق الرسمية</label>
                                    <textarea class="form-control" id="official_papers_ar" name="official_papers_ar" rows="6">{{ $papers->official_papers_ar ?? '' }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="official_papers_en">Official Papers</label>
                                    <textarea class="form-control" id="official_papers_en" name="official_papers_en" rows="6">{{ $papers->official_papers_en ?? '' }}</textarea>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="quality_certificates_ar">شهادات الجودة</label>
                                    <textarea class="form-control" id="quality_certificates_ar" name="quality_certificates_ar" rows="6">{{ $papers->quality_certificates_ar ?? '' }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="quality_certificates_en">Quality Certificates</label>
                                    <textarea class="form-control" id="quality_certificates_en" name="quality_certificates_en" rows="6">{{ $papers->quality_certificates_en ?? '' }}</textarea>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <h6>صور الأوراق الرسمية</h6>
                                @if($papers && $papers->official_papers_images && count($papers->official_papers_images) > 0)
                                    <div class="row">
                                        @foreach($papers->official_papers_images as $index => $image)
                                            <div class="col-md-3 mb-2">
                                                <img src="{{ asset('storage/' . $image) }}" alt="Official Paper {{ $index + 1 }}" 
                                                     class="img-fluid rounded" style="max-height: 80px; object-fit: cover;">
                                            </div>
                                        @endforeach
                                    </div>
                                @else
                                    <p class="text-muted">لا توجد صور</p>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <h6>صور شهادات الجودة</h6>
                                @if($papers && $papers->quality_certificates_images && count($papers->quality_certificates_images) > 0)
                                    <div class="row">
                                        @foreach($papers->quality_certificates_images as $index => $image)
                                            <div class="col-md-3 mb-2">
                                                <img src="{{ asset('storage/' . $image) }}" alt="Quality Certificate {{ $index + 1 }}" 
                                                     class="img-fluid rounded" style="max-height: 80px; object-fit: cover;">
                                            </div>
                                        @endforeach
                                    </div>
                                @else
                                    <p class="text-muted">لا توجد صور</p>
                                @endif
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="is_active" name="is_active" value="1" {{ $papers && $papers->is_active ? 'checked' : '' }}>
                                        <label class="form-check-label" for="is_active">
                                            نشط
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-12">
                                <div class="d-flex gap-2">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-save"></i> حفظ
                                    </button>
                                    <a href="{{ route('admin-papers.index') }}" class="btn btn-secondary">
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

<script>
function toggleImageUpload() {
    const imageType = document.getElementById('image_type').value;
    const imageUpload = document.getElementById('image_upload');
    
    // Clear the file input
    imageUpload.value = '';
    
    // Update the label based on selection
    const label = imageUpload.parentElement.querySelector('label');
    if (imageType === 'quality_certificates') {
        label.textContent = 'رفع شهادة جودة';
    } else if (imageType === 'official_papers') {
        label.textContent = 'رفع شهادة رسمية';
    } else {
        label.textContent = 'رفع الصورة';
    }
}
</script>

@endsection
