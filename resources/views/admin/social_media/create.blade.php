@extends('layouts.app')

@section('title', 'إضافة وسيلة تواصل اجتماعي')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">إضافة وسيلة تواصل اجتماعي</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">الرئيسية</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin-social-media.index') }}">وسائل التواصل الاجتماعي</a></li>
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
                            <h3 class="card-title">بيانات وسيلة التواصل الاجتماعي</h3>
                            <div class="card-tools">
                                <a href="{{ route('admin-social-media.index') }}" class="btn btn-default btn-sm">
                                    <i class="fas fa-arrow-left"></i> رجوع
                                </a>
                            </div>
                        </div>
                        <form action="{{ route('admin-social-media.store') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">الاسم <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
                                            @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="url">الرابط <span class="text-danger">*</span></label>
                                            <input type="url" class="form-control @error('url') is-invalid @enderror" id="url" name="url" value="{{ old('url') }}" required>
                                            @error('url')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="icon">الأيقونة</label>
                                            <input type="text" class="form-control @error('icon') is-invalid @enderror" id="icon" name="icon" value="{{ old('icon') }}" placeholder="مثال: fab fa-facebook">
                                            @error('icon')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            <small class="text-muted">استخدم أيقونات Font Awesome (مثال: fab fa-facebook, fab fa-twitter)</small>
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
                                    <div class="col-12">
                                        <div class="form-group">
                                            <div class="custom-control custom-switch">
                                                <input type="checkbox" class="custom-control-input" id="is_active" name="is_active" value="1" {{ old('is_active') ? 'checked' : '' }}>
                                                <label class="custom-control-label" for="is_active">نشط</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i> حفظ
                                </button>
                                <a href="{{ route('admin-social-media.index') }}" class="btn btn-default">
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
