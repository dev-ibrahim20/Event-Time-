@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">تعديل صفحة من نحن</h3>
                    <div class="card-tools">
                        <a href="{{ route('admin-about-us.index') }}" class="btn btn-secondary btn-sm">
                            <i class="fas fa-arrow-left"></i> رجوع
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin-about-us.update') }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="company_introduction_ar">مقدمة الشركة</label>
                                    <textarea class="form-control" id="company_introduction_ar" name="company_introduction_ar" rows="4">{{ $aboutUs->company_introduction_ar ?? '' }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="company_introduction_en">Company Introduction</label>
                                    <textarea class="form-control" id="company_introduction_en" name="company_introduction_en" rows="4">{{ $aboutUs->company_introduction_en ?? '' }}</textarea>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="mission_ar">مهمتنا</label>
                                    <textarea class="form-control" id="mission_ar" name="mission_ar" rows="4">{{ $aboutUs->mission_ar ?? '' }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="mission_en">Our Mission</label>
                                    <textarea class="form-control" id="mission_en" name="mission_en" rows="4">{{ $aboutUs->mission_en ?? '' }}</textarea>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="vision_ar">رؤيتنا</label>
                                    <textarea class="form-control" id="vision_ar" name="vision_ar" rows="4">{{ $aboutUs->vision_ar ?? '' }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="vision_en">Our Vision</label>
                                    <textarea class="form-control" id="vision_en" name="vision_en" rows="4">{{ $aboutUs->vision_en ?? '' }}</textarea>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="core_values_ar">قيمنا الجوهرية</label>
                                    <textarea class="form-control" id="core_values_ar" name="core_values_ar" rows="6" placeholder="اكتب كل قيمة في سطر منفصل&#10;مثال:&#10;الجودة&#10;الابتكار&#10;النزاهة">{{ $aboutUs->core_values_ar ?? '' }}</textarea>
                                    <small class="text-muted">اكتب كل قيمة في سطر منفصل</small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="core_values_en">Our Core Values</label>
                                    <textarea class="form-control" id="core_values_en" name="core_values_en" rows="6" placeholder="Write each value on a separate line&#10;Example:&#10;Quality&#10;Innovation&#10;Integrity">{{ $aboutUs->core_values_en ?? '' }}</textarea>
                                    <small class="text-muted">Write each value on a separate line</small>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="message_ar">رسالتنا</label>
                                    <textarea class="form-control" id="message_ar" name="message_ar" rows="4">{{ $aboutUs->message_ar ?? '' }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="message_en">Our Message</label>
                                    <textarea class="form-control" id="message_en" name="message_en" rows="4">{{ $aboutUs->message_en ?? '' }}</textarea>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="is_active" name="is_active" value="1" {{ $aboutUs && $aboutUs->is_active ? 'checked' : '' }}>
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
                                    <a href="{{ route('admin-about-us.index') }}" class="btn btn-secondary">
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
@endsection
