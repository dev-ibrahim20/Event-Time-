@extends('layouts.app')
@section('title')
    التوظيف
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
                    جدول الوظائف</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')

        @if (session()->has('delete'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('delete') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif

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
                                <h4 class="card-title mg-b-0">جدول الوظائف</h4>
                                <i class="mdi mdi-dots-horizontal text-gray"></i>
                            </div>
                            <a href="{{ route('admin-careers.create') }}" class="modal-effect btn btn-md btn-primary" style="color:white"><i
                                    class="fas fa-plus"></i>&nbsp; اضافة وظيفة</a>
                                <div class="table-responsive">
                            <table id="example" class="table key-buttons text-md-nowrap" data-page-length='50' style="text-align: center">
                                        <thead>
                                            <tr>
                                                <th class="border-bottom-0">#</th>
                                                <th class="border-bottom-0">اسم الوظيفة</th>
                                                <th class="border-bottom-0">متطلبات الوظيفة</th>
                                                <th class="border-bottom-0">الحالة</th>
                                                <th class="border-bottom-0">العمليات</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                                @foreach ($careers as $career)
                                                    <tr>
                                                            <td>{{$loop->iteration}}</td>
                                                            <td>
                                                                <strong>{{ $career->title_ar }}</strong><br>
                                                                <small class="text-muted">{{ $career->title_en }}</small>
                                                            </td>
                                                            <td>
                                                                <span class="d-block text-truncate" style="max-width: 300px;" title="{{ $career->requirements_ar }}">
                                                                    {{ Str::limit($career->requirements_ar, 100) }}
                                                                </span>
                                                            </td>
                                                            <td>
                                                                @if($career->status)
                                                                    <span class="badge badge-success">نشط</span>
                                                                @else
                                                                    <span class="badge badge-secondary">غير نشط</span>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                <div class="dropdown">
                                                                    <button aria-expanded="false" aria-haspopup="true"
                                                                        class="btn ripple btn-primary btn-sm" data-toggle="dropdown"
                                                                        type="button">العمليات<i class="fas fa-caret-down ml-1"></i></button>
                                                                    <div class="dropdown-menu tx-13">
                                                                        <a class="dropdown-item"
                                                                            href="{{ route('admin-careers.edit', $career->id) }}">
                                                                            <i class="fas fa-edit text-primary"></i> تعديل الوظيفة
                                                                        </a>

                                                                        <a class="dropdown-item" href="#" data-career_id="{{ $career->id }}"
                                                                            data-toggle="modal" data-target="#delete_career">
                                                                            <i class="fas fa-trash-alt text-danger"></i>&nbsp;&nbsp;حذف الوظيفة
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/div-->

                    <!--div-->
                
                        <!-- حذف الوظيفة -->
<div class="modal fade" id="delete_career" tabindex="-1" role="dialog" aria-labelledby="deleteCareerLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteCareerLabel">حذف الوظيفة</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="#" method="post" id="deleteCareerForm">
                @csrf
                @method('DELETE')
            <div class="modal-body">
                هل أنت متأكد من عملية الحذف؟
                <input type="hidden" name="career_id" id="career_id" value="">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>
                <button type="submit" class="btn btn-danger">تأكيد الحذف</button>
            </div>
            </form>
        </div>
    </div>
</div>
                

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
<script>
// Handle delete career modal
$('#delete_career').on('show.bs.modal', function (e) {
    const careerId = $(e.relatedTarget).data('career_id');
    $('#career_id').val(careerId);
    $('#deleteCareerForm').attr('action', `/admin-careers/${careerId}`);
});
</script>
@endsection
