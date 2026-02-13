@extends('layouts.app')
@section('title')
    الحاجات الثابتة
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
                <h4 class="content-title mb-0 my-auto">الحاجات الثابتة</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    إدارة محتوى الموقع</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')

        @if (session()->has('edit'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('edit') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif

        @if (session()->has('add'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('add') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif

        <div>
            <!-- row -->
            <div class="row">
                    <!--div-->
                    <div class="col-xl-12">
                        <div class="card mg-b-20">
                            <div class="card-header pb-0">
                            <div class="d-flex justify-content-between">
                                <h4 class="card-title mg-b-0">إدارة الحاجات الثابتة</h4>
                                <i class="mdi mdi-dots-horizontal text-gray"></i>
                            </div>
                            @if($contents->count() == 0)
                            <a href="{{ route('admin-static-contents.create-default') }}" class="modal-effect btn btn-md btn-info" style="color:white">
                                <i class="fas fa-plus"></i>&nbsp; إنشاء محتوى افتراضي
                            </a>
                            @endif
                            </div>
                            <div class="card-body">
                                <form action="{{ route('admin-static-contents.update') }}" method="POST">
                                    @csrf
                                    
                                    @if($contents->count() > 0)
                                        <div class="row">
                                            @foreach($contents as $content)
                                                <div class="col-md-6">
                                                    <div class="card border mb-3">
                                                        <div class="card-header bg-light">
                                                            <h6 class="card-title mb-0">{{ $content->description_ar ?? $content->key }}</h6>
                                                        </div>
                                                        <div class="card-body">
                                                            <input type="hidden" name="content_id_{{ $content->id }}" value="{{ $content->id }}">
                                                            
                                                            @if($content->type == 'image')
                                                                <div class="form-group">
                                                                    <label class="form-label">الصورة الحالية</label>
                                                                    @if($content->value_ar)
                                                                        <img src="{{ asset($content->value_ar) }}" alt="{{ $content->description_ar }}" style="max-width: 200px; max-height: 150px; border-radius: 5px; margin-bottom: 10px;">
                                                                    @else
                                                                        <div class="alert alert-info">لا توجد صورة</div>
                                                                    @endif
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="form-label">رفع صورة جديدة</label>
                                                                    <input type="file" name="image_{{ $content->id }}" class="form-control" accept="image/*">
                                                                    <small class="text-muted">اخترار صورة جديدة (jpeg, png, jpg, gif) - الحجم الأقصى 2 ميجابايت</small>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="form-label">رابط الصورة بالعربي</label>
                                                                    <input type="text" name="value_ar_{{ $content->id }}" class="form-control" 
                                                                           value="{{ $content->value_ar }}" placeholder="/assets/img/home-banner.jpg">
                                                                    <small class="text-muted">يمكنك تركه فارغاً إذا رفعت صورة جديدة</small>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="form-label">رابط الصورة بالإنجليزي</label>
                                                                    <input type="text" name="value_en_{{ $content->id }}" class="form-control" 
                                                                           value="{{ $content->value_en }}" placeholder="/assets/img/home-banner.jpg">
                                                                    <small class="text-muted">يمكنك تركه فارغاً إذا رفعت صورة جديدة</small>
                                                                </div>
                                                            @elseif($content->type == 'phone')
                                                                <div class="form-group">
                                                                    <label class="form-label">رقم الهاتف بالعربي</label>
                                                                    <input type="text" name="value_ar_{{ $content->id }}" class="form-control" 
                                                                           value="{{ $content->value_ar }}" placeholder="+966500000000">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="form-label">رقم الهاتف بالإنجليزي</label>
                                                                    <input type="text" name="value_en_{{ $content->id }}" class="form-control" 
                                                                           value="{{ $content->value_en }}" placeholder="+966500000000">
                                                                </div>
                                                            @elseif($content->type == 'email')
                                                                <div class="form-group">
                                                                    <label class="form-label">البريد الإلكتروني بالعربي</label>
                                                                    <input type="email" name="value_ar_{{ $content->id }}" class="form-control" 
                                                                           value="{{ $content->value_ar }}" placeholder="info@example.com">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="form-label">البريد الإلكتروني بالإنجليزي</label>
                                                                    <input type="email" name="value_en_{{ $content->id }}" class="form-control" 
                                                                           value="{{ $content->value_en }}" placeholder="info@example.com">
                                                                </div>
                                                            @elseif($content->type == 'map')
                                                                <div class="form-group">
                                                                    <label class="form-label">رابط الخريطة بالعربي</label>
                                                                    <textarea name="value_ar_{{ $content->id }}" class="form-control" rows="3" 
                                                                              placeholder="https://maps.google.com/embed/...">{{ $content->value_ar }}</textarea>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="form-label">رابط الخريطة بالإنجليزي</label>
                                                                    <textarea name="value_en_{{ $content->id }}" class="form-control" rows="3" 
                                                                              placeholder="https://maps.google.com/embed/...">{{ $content->value_en }}</textarea>
                                                                </div>
                                                            @elseif($content->type == 'address')
                                                                <div class="form-group">
                                                                    <label class="form-label">العنوان بالعربي</label>
                                                                    <input type="text" name="value_ar_{{ $content->id }}" class="form-control" 
                                                                           value="{{ $content->value_ar }}" placeholder="الرياض، المملكة العربية السعودية">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="form-label">العنوان بالإنجليزي</label>
                                                                    <input type="text" name="value_en_{{ $content->id }}" class="form-control" 
                                                                           value="{{ $content->value_en }}" placeholder="Riyadh, Saudi Arabia">
                                                                </div>
                                                            @elseif($content->type == 'text')
                                                                <div class="form-group">
                                                                    <label class="form-label">النص بالعربي</label>
                                                                    <textarea name="value_ar_{{ $content->id }}" class="form-control" rows="4" 
                                                                              placeholder="تفاصيل إضافية">{{ $content->value_ar }}</textarea>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="form-label">النص بالإنجليزي</label>
                                                                    <textarea name="value_en_{{ $content->id }}" class="form-control" rows="4" 
                                                                              placeholder="Additional details">{{ $content->value_en }}</textarea>
                                                                </div>
                                                            @endif
                                                            
                                                            <div class="form-group">
                                                                <label class="form-label">الوصف الإضافي بالعربي</label>
                                                                <textarea name="description_ar_{{ $content->id }}" class="form-control" rows="2" 
                                                                          placeholder="وصف إضافي">{{ $content->description_ar }}</textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="form-label">الوصف الإضافي بالإنجليزي</label>
                                                                <textarea name="description_en_{{ $content->id }}" class="form-control" rows="2" 
                                                                          placeholder="Additional description">{{ $content->description_en }}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                        
                                        <div class="form-group mt-4">
                                            <button type="submit" class="btn btn-primary">
                                                <i class="fas fa-save"></i> حفظ التغييرات
                                            </button>
                                            <a href="{{ route('admin-dashboard') }}" class="btn btn-secondary">
                                                <i class="fas fa-arrow-left"></i> رجوع
                                            </a>
                                        </div>
                                    @else
                                        <div class="text-center py-5">
                                            <i class="fas fa-file-alt fa-3x text-muted mb-3"></i>
                                            <h5 class="text-muted">لا توجد حاجات ثابتة حالياً</h5>
                                            <p class="text-muted">قم بإنشاء المحتوى الافتراضي للبدء</p>
                                            <a href="{{ route('admin-static-contents.create-default') }}" class="btn btn-primary">
                                                <i class="fas fa-plus"></i> إنشاء محتوى افتراضي
                                            </a>
                                        </div>
                                    @endif
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
<!-- Don't load apexcharts.js on static contents page to avoid errors -->
<!-- Internal Map -->
<script src="{{URL::asset('assets/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<script src="{{URL::asset('assets/js/modal-popup.js')}}"></script>
<!-- Don't load index.js on static contents page to avoid chart errors -->
@endsection
