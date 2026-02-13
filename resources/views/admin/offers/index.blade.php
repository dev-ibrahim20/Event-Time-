@extends('layouts.app')
@section('title')
    العروض
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
                <h4 class="content-title mb-0 my-auto">العروض</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    جدول العروض</span>
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
                                <h4 class="card-title mg-b-0">جدول العروض</h4>
                                <i class="mdi mdi-dots-horizontal text-gray"></i>
                            </div>
                            <a href="{{ route('admin-offers.create') }}" class="modal-effect btn btn-md btn-primary" style="color:white"><i
                                    class="fas fa-plus"></i>&nbsp; اضافة عرض</a>
                                <div class="table-responsive">
                            <table id="example" class="table key-buttons text-md-nowrap" data-page-length='50' style="text-align: center">
                                        <thead>
                                            <tr>
                                                <th class="border-bottom-0">#</th>
                                                <th class="border-bottom-0">الخدمة</th>
                                                <th class="border-bottom-0">العنوان</th>
                                                <th class="border-bottom-0">نسبة الخصم</th>
                                                <th class="border-bottom-0">تاريخ البدء</th>
                                                <th class="border-bottom-0">تاريخ الانتهاء</th>
                                                <th class="border-bottom-0">الحالة</th>
                                                <th class="border-bottom-0">الصلاحية</th>
                                                <th class="border-bottom-0">العمليات</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                                @foreach ($offers as $offer)
                                                    <tr>
                                                            <td>{{$loop->iteration}}</td>
                                                            <td>
                                                                @if($offer->service)
                                                                    <strong>{{ $offer->service->title_ar }}</strong>
                                                                @else
                                                                    <span class="text-muted">خدمة محذوفة</span>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                <strong>{{ $offer->title_ar }}</strong><br>
                                                                <small class="text-muted">{{ $offer->title_en }}</small>
                                                            </td>
                                                            <td>
                                                                <span class="badge badge-danger">{{ $offer->discount_percentage }}%</span>
                                                            </td>
                                                            <td>{{ $offer->start_date->format('Y-m-d') }}</td>
                                                            <td>{{ $offer->end_date->format('Y-m-d') }}</td>
                                                            <td>
                                                                @if($offer->status)
                                                                    <span class="badge badge-success">نشط</span>
                                                                @else
                                                                    <span class="badge badge-secondary">غير نشط</span>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                @if($offer->is_active)
                                                                    <span class="badge badge-primary">صالح</span>
                                                                    <br>
                                                                    <small class="text-muted">العرض ساري الآن</small>
                                                                @else
                                                                    @if(!$offer->status)
                                                                        <span class="badge badge-secondary">معطل</span>
                                                                        <br>
                                                                        <small class="text-muted">العرض غير مفعّل</small>
                                                                    @elseif($offer->start_date > now())
                                                                        <span class="badge badge-info">لم يبدأ</span>
                                                                        <br>
                                                                        <small class="text-muted">يبدأ: {{ $offer->start_date->format('Y-m-d') }}</small>
                                                                    @else
                                                                        <span class="badge badge-warning">منتهي</span>
                                                                        <br>
                                                                        <small class="text-muted">انتهى: {{ $offer->end_date->format('Y-m-d') }}</small>
                                                                    @endif
                                                                @endif
                                                            </td>
                                                            <td>
                                                                <div class="dropdown">
                                                                    <button aria-expanded="false" aria-haspopup="true"
                                                                        class="btn ripple btn-primary btn-sm" data-toggle="dropdown"
                                                                        type="button">العمليات<i class="fas fa-caret-down ml-1"></i></button>
                                                                    <div class="dropdown-menu tx-13">
                                                                        <a class="dropdown-item"
                                                                            href="{{ route('admin-offers.edit', $offer->id) }}">
                                                                            <i class="fas fa-edit text-primary"></i> تعديل العرض
                                                                        </a>

                                                                        <a class="dropdown-item" href="#" data-offer_id="{{ $offer->id }}"
                                                                            data-toggle="modal" data-target="#delete_offer">
                                                                            <i class="fas fa-trash-alt text-danger"></i>&nbsp;&nbsp;حذف العرض
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
                
                        <!-- حذف العرض -->
<div class="modal fade" id="delete_offer" tabindex="-1" role="dialog" aria-labelledby="deleteOfferLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteOfferLabel">حذف العرض</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="#" method="post" id="deleteOfferForm">
                @csrf
                @method('DELETE')
            <div class="modal-body">
                هل أنت متأكد من عملية الحذف؟
                <input type="hidden" name="offer_id" id="offer_id" value="">
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
<!-- Don't load apexcharts.js on offers page to avoid errors -->
<!-- Internal Map -->
<script src="{{URL::asset('assets/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<script src="{{URL::asset('assets/js/modal-popup.js')}}"></script>
<!-- Don't load index.js on offers page to avoid chart errors -->
<script>
// Handle delete offer modal
$('#delete_offer').on('show.bs.modal', function (e) {
    const offerId = $(e.relatedTarget).data('offer_id');
    $('#offer_id').val(offerId);
    $('#deleteOfferForm').attr('action', `/admin-offers/${offerId}`);
});
</script>
@endsection
