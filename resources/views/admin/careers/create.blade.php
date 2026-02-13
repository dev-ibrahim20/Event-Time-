@extends('layouts.app')
@section('title')
    إضافة وظيفة
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
                <h4 class="content-title mb-0 my-auto">التوظيف</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    إضافة وظيفة</span>
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
                                <h4 class="card-title mg-b-0">إضافة وظيفة جديدة</h4>
                                <i class="mdi mdi-dots-horizontal text-gray"></i>
                            </div>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('admin-careers.store') }}" method="POST">
                                    @csrf
                                    
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="title_ar">اسم الوظيفة بالعربي <span class="text-danger">*</span></label>
                                                <input type="text" name="title_ar" id="title_ar" class="form-control @error('title_ar') is-invalid @enderror" 
                                                       value="{{ old('title_ar') }}" required>
                                                @error('title_ar')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="title_en">اسم الوظيفة بالإنجليزي <span class="text-danger">*</span></label>
                                                <input type="text" name="title_en" id="title_en" class="form-control @error('title_en') is-invalid @enderror" 
                                                       value="{{ old('title_en') }}" required>
                                                @error('title_en')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="requirements_ar">متطلبات الوظيفة بالعربي <span class="text-danger">*</span></label>
                                                <textarea name="requirements_ar" id="requirements_ar" class="form-control @error('requirements_ar') is-invalid @enderror" 
                                                          rows="6" required>{{ old('requirements_ar') }}</textarea>
                                                @error('requirements_ar')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="requirements_en">متطلبات الوظيفة بالإنجليزي <span class="text-danger">*</span></label>
                                                <textarea name="requirements_en" id="requirements_en" class="form-control @error('requirements_en') is-invalid @enderror" 
                                                          rows="6" required>{{ old('requirements_en') }}</textarea>
                                                @error('requirements_en')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="sort_order">ترتيب الوظيفة</label>
                                                <input type="number" name="sort_order" id="sort_order" class="form-control @error('sort_order') is-invalid @enderror" 
                                                       value="{{ old('sort_order', 0) }}" min="0">
                                                @error('sort_order')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="status">الحالة</label>
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" name="status" id="status" class="custom-control-input" value="1" checked>
                                                    <label class="custom-control-label" for="status">نشط</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fas fa-save"></i> حفظ الوظيفة
                                        </button>
                                        <a href="{{ route('admin-careers.index') }}" class="btn btn-secondary">
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
<!-- Don't load apexcharts.js on careers page to avoid errors -->
<!-- Internal Map -->
<script src="{{URL::asset('assets/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<script src="{{URL::asset('assets/js/modal-popup.js')}}"></script>
<!-- Don't load index.js on careers page to avoid chart errors -->
@endsection
