@extends('layouts.app')

@section('title', 'إضافة عضو فريق')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">إضافة عضو فريق</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">الرئيسية</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin-team-members.index') }}">أعضاء الفريق</a></li>
                        <li class="breadcrumb-item active">إضافة</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">بيانات عضو الفريق</h3>
                            <div class="card-tools">
                                <a href="{{ route('admin-team-members.index') }}" class="btn btn-default btn-sm">
                                    <i class="fas fa-arrow-left"></i> رجوع
                                </a>
                            </div>
                        </div>
                        <form action="{{ route('admin-team-members.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name_ar">الاسم (عربي) <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control @error('name_ar') is-invalid @enderror" id="name_ar" name="name_ar" value="{{ old('name_ar') }}" required>
                                            @error('name_ar')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name_en">الاسم (إنجليزي) <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control @error('name_en') is-invalid @enderror" id="name_en" name="name_en" value="{{ old('name_en') }}" required>
                                            @error('name_en')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="position_ar">المنصب (عربي) <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control @error('position_ar') is-invalid @enderror" id="position_ar" name="position_ar" value="{{ old('position_ar') }}" required>
                                            @error('position_ar')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="position_en">المنصب (إنجليزي) <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control @error('position_en') is-invalid @enderror" id="position_en" name="position_en" value="{{ old('position_en') }}" required>
                                            @error('position_en')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="bio_ar">النبذة (عربي)</label>
                                            <textarea class="form-control @error('bio_ar') is-invalid @enderror" id="bio_ar" name="bio_ar" rows="3">{{ old('bio_ar') }}</textarea>
                                            @error('bio_ar')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="bio_en">النبذة (إنجليزي)</label>
                                            <textarea class="form-control @error('bio_en') is-invalid @enderror" id="bio_en" name="bio_en" rows="3">{{ old('bio_en') }}</textarea>
                                            @error('bio_en')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="image">الصورة الشخصية</label>
                                            <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" accept="image/*">
                                            @error('image')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            <small class="text-muted">الحجم الأقصى: 2MB, الصيغ المسموحة: jpeg, jpg, png, gif, webp</small>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="sort_order">ترتيب العرض</label>
                                            <input type="number" class="form-control @error('sort_order') is-invalid @enderror" id="sort_order" name="sort_order" value="{{ old('sort_order', 0) }}" min="0">
                                            @error('sort_order')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="twitter_link">رابط تويتر</label>
                                            <input type="url" class="form-control @error('twitter_link') is-invalid @enderror" id="twitter_link" name="twitter_link" value="{{ old('twitter_link') }}" placeholder="https://twitter.com/username">
                                            @error('twitter_link')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="facebook_link">رابط فيسبوك</label>
                                            <input type="url" class="form-control @error('facebook_link') is-invalid @enderror" id="facebook_link" name="facebook_link" value="{{ old('facebook_link') }}" placeholder="https://facebook.com/page">
                                            @error('facebook_link')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="linkedin_link">رابط لينكدإن</label>
                                            <input type="url" class="form-control @error('linkedin_link') is-invalid @enderror" id="linkedin_link" name="linkedin_link" value="{{ old('linkedin_link') }}" placeholder="https://linkedin.com/in/username">
                                            @error('linkedin_link')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="instagram_link">رابط انستجرام</label>
                                            <input type="url" class="form-control @error('instagram_link') is-invalid @enderror" id="instagram_link" name="instagram_link" value="{{ old('instagram_link') }}" placeholder="https://instagram.com/username">
                                            @error('instagram_link')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="custom-control custom-switch">
                                                <input type="checkbox" class="custom-control-input" id="featured" name="featured" value="1" {{ old('featured') ? 'checked' : '' }}>
                                                <label class="custom-control-label" for="featured">عضو مميز</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="custom-control custom-switch">
                                                <input type="checkbox" class="custom-control-input" id="status" name="status" value="1" {{ old('status', 1) ? 'checked' : '' }}>
                                                <label class="custom-control-label" for="status">نشط</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i> حفظ
                                </button>
                                <a href="{{ route('admin-team-members.index') }}" class="btn btn-default">
                                    <i class="fas fa-times"></i> إلغاء
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
