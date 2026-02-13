@extends('layouts.app')
@section('title')
Dashboard - About Us
@stop
@section('page-header')
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">من نحن</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    إدارة من نحن</span>
            </div>
        </div>
    </div>
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">من نحن</h3>
                    <div class="card-tools">
                        <a href="{{ route('admin-about-us.edit') }}" class="btn btn-primary btn-sm">
                            <i class="fas fa-edit"></i> تعديل
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    @if($aboutUs)
                        <div class="row">
                            <div class="col-md-6">
                                <h5>مقدمة الشركة</h5>
                                <p>{{ $aboutUs->company_introduction_ar ?? 'غير متوفر' }}</p>
                            </div>
                            <div class="col-md-6">
                                <h5>Company Introduction</h5>
                                <p>{{ $aboutUs->company_introduction_en ?? 'Not available' }}</p>
                            </div>
                        </div>
                        
                        <hr>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <h5>مهمتنا</h5>
                                <p>{{ $aboutUs->mission_ar ?? 'غير متوفر' }}</p>
                            </div>
                            <div class="col-md-6">
                                <h5>Our Mission</h5>
                                <p>{{ $aboutUs->mission_en ?? 'Not available' }}</p>
                            </div>
                        </div>
                        
                        <hr>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <h5>رؤيتنا</h5>
                                <p>{{ $aboutUs->vision_ar ?? 'غير متوفر' }}</p>
                            </div>
                            <div class="col-md-6">
                                <h5>Our Vision</h5>
                                <p>{{ $aboutUs->vision_en ?? 'Not available' }}</p>
                            </div>
                        </div>
                        
                        <hr>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <h5>قيمنا الجوهرية</h5>
                                @if($aboutUs && $aboutUs->core_values_ar)
                                    <?php 
                                    $values_ar = explode("\n", $aboutUs->core_values_ar);
                                    $values_ar = array_filter(array_map('trim', $values_ar));
                                    ?>
                                    @if(!empty($values_ar))
                                        <ul class="list-unstyled">
                                            @foreach($values_ar as $value)
                                                <li><i class="fas fa-check-circle text-success mr-2"></i>{{ $value }}</li>
                                            @endforeach
                                        </ul>
                                    @else
                                        <p>غير متوفر</p>
                                    @endif
                                @else
                                    <p>غير متوفر</p>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <h5>Our Core Values</h5>
                                @if($aboutUs && $aboutUs->core_values_en)
                                    <?php 
                                    $values_en = explode("\n", $aboutUs->core_values_en);
                                    $values_en = array_filter(array_map('trim', $values_en));
                                    ?>
                                    @if(!empty($values_en))
                                        <ul class="list-unstyled">
                                            @foreach($values_en as $value)
                                                <li><i class="fas fa-check-circle text-success mr-2"></i>{{ $value }}</li>
                                            @endforeach
                                        </ul>
                                    @else
                                        <p>Not available</p>
                                    @endif
                                @else
                                    <p>Not available</p>
                                @endif
                            </div>
                        </div>
                        
                        <hr>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <h5>رسالتنا</h5>
                                <p>{{ $aboutUs->message_ar ?? 'غير متوفر' }}</p>
                            </div>
                            <div class="col-md-6">
                                <h5>Our Message</h5>
                                <p>{{ $aboutUs->message_en ?? 'Not available' }}</p>
                            </div>
                        </div>
                        
                        <div class="row mt-3">
                            <div class="col-12">
                                <span class="badge {{ $aboutUs && $aboutUs->is_active ? 'badge-success' : 'badge-secondary' }}">
                                    {{ $aboutUs && $aboutUs->is_active ? 'نشط' : 'غير نشط' }}
                                </span>
                            </div>
                        </div>
                    @else
                        <div class="text-center">
                            <i class="fas fa-info-circle fa-3x text-muted mb-3"></i>
                            <h4>لا توجد بيانات</h4>
                            <p class="text-muted">لم يتم إضافة بيانات صفحة "من نحن" بعد.</p>
                            <a href="{{ route('admin-about-us.edit') }}" class="btn btn-primary">
                                <i class="fas fa-plus"></i> إضافة بيانات
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
