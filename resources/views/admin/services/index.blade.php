@extends('layouts.app')
@section('title')
الخدمات
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
                <h4 class="content-title mb-0 my-auto">الخدمات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    جدول الخدمات</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')

            @if (session()->has('delete'))
                <script>
                    window.onload = function() {
                        notif({
                            msg: "تم حذف الخدمة بنجاح",
                            type: "success"
                        })
                    }

                </script>
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
                                <h4 class="card-title mg-b-0">جدول الخدمات</h4>
                                <i class="mdi mdi-dots-horizontal text-gray"></i>
                            </div>
                            <a href="{{ route('admin-services.create') }}" class="modal-effect btn btn-md btn-primary" style="color:white"><i
                                    class="fas fa-plus"></i>&nbsp; اضافة خدمة</a>
                                <div class="table-responsive">
                            <table id="example" class="table key-buttons text-md-nowrap" data-page-length='50' style="text-align: center">
                                        <thead>
                                            <tr>
                                                <th class="border-bottom-0">#</th>
                                                <th class="border-bottom-0">الصورة</th>
                                                <th class="border-bottom-0">اسم الخدمة</th>
                                                <th class="border-bottom-0">الوصف</th>
                                                <th class="border-bottom-0">المميزات</th>
                                                <th class="border-bottom-0">معرض الصور</th>
                                                <th class="border-bottom-0">مميزة</th>
                                                <th class="border-bottom-0">الحالة</th>
                                                <th class="border-bottom-0">العمليات</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                                @foreach ($services as $service)
                                                    <tr>
                                                            <td>{{$loop->iteration}}</td>
                                                            <td>
                                                                @if($service->image)
                                                                    <img src="{{ asset($service->image) }}" alt="{{ $service->title_ar }}" 
                                                                         style="width: 80px; height: 80px; object-fit: cover; border-radius: 8px; cursor: pointer;"
                                                                         onclick="openImageModal('{{ asset($service->image) }}', '{{ $service->title_ar }}')"
                                                                         class="service-image">
                                                                @else
                                                                    <div class="bg-gray-200 d-flex align-items-center justify-content-center" 
                                                                         style="width: 80px; height: 80px; border-radius: 8px;">
                                                                        <i class="fas fa-image text-gray-400"></i>
                                                                    </div>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                <strong>{{ $service->title_ar }}</strong><br>
                                                                <small class="text-muted">{{ $service->title_en }}</small>
                                                            </td>
                                                            <td>
                                                                <span class="d-block text-truncate" style="max-width: 200px;" title="{{ $service->description_ar }}">
                                                                    {{ Str::limit($service->description_ar, 50) }}
                                                                </span>
                                                            </td>
                                                            <td>
                                                                @if($service->features_ar)
                                                                    @php
                                                                        $features = json_decode($service->features_ar);
                                                                        if(is_array($features)) {
                                                                            echo implode(', ', array_slice($features, 0, 2));
                                                                            if(count($features) > 2) echo '...';
                                                                        }
                                                                    @endphp
                                                                @endif
                                                            </td>
                                                            <td>
                                                                @if($service->gallery_images)
                                                                    @php
                                                                        $gallery = json_decode($service->gallery_images);
                                                                        if(is_array($gallery) && count($gallery) > 0):
                                                                            // Convert image paths to full URLs
                                                                            $galleryUrls = array_map(function($image) {
                                                                                return asset($image);
                                                                            }, $gallery);
                                                                    @endphp
                                                                        <!-- زر معرض الصور المباشر -->
                                                                        <button class="btn btn-sm btn-info" onclick="showGallery({{ $service->id }})">
                                                                            <i class="fas fa-images"></i> معرض الصور ({{ count($gallery) }})
                                                                        </button>
                                                                    @else
                                                                        <span class="text-muted">لا توجد صور</span>
                                                                    @endif
                                                                @endif
                                                            </td>
                                                            <td>
                                                                @if($service->featured)
                                                                    <span class="badge badge-success">مميزة</span>
                                                                @else
                                                                    <span class="badge badge-secondary">عادية</span>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                @if($service->status)
                                                                    <span class="badge badge-primary">نشط</span>
                                                                @else
                                                                    <span class="badge badge-danger">غير نشط</span>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                <div class="dropdown">
                                                                    <button aria-expanded="false" aria-haspopup="true"
                                                                        class="btn ripple btn-primary btn-sm" data-toggle="dropdown"
                                                                        type="button">العمليات<i class="fas fa-caret-down ml-1"></i></button>
                                                                    <div class="dropdown-menu tx-13">
                                                                        <a class="dropdown-item"
                                                                            href="{{ route('admin-services.edit', $service->id) }}">
                                                                            <i class="fas fa-edit text-primary"></i> تعديل الخدمة
                                                                        </a>

                                                                        <a class="dropdown-item" href="#" data-service_id="{{ $service->id }}"
                                                                            data-toggle="modal" data-target="#delete_service">
                                                                            <i class="fas fa-trash-alt text-danger"></i>&nbsp;&nbsp;حذف الخدمة
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
                
                        <!-- Image Modal -->
<div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="imageModalLabel">صورة الخدمة</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <img id="modalImage" src="" alt="" style="max-width: 100%; max-height: 500px; border-radius: 8px;">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>

<!-- Simple Gallery Lightbox -->
<div id="galleryLightbox" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.9); z-index: 9999; text-align: center;">
    <div style="position: relative; height: 100%;">
        <img id="lightboxImage" src="" alt="" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); max-width: 90%; max-height: 90%; border-radius: 8px;">
        
        <button onclick="closeGallery()" style="position: absolute; top: 20px; right: 40px; color: white; font-size: 40px; background: none; border: none; cursor: pointer;">&times;</button>
        
        <button onclick="previousLightboxImage()" style="position: absolute; top: 50%; left: 20px; transform: translateY(-50%); color: white; font-size: 30px; background: rgba(0,0,0,0.5); border: none; padding: 10px 15px; cursor: pointer; border-radius: 5px;">&#10094;</button>
        
        <button onclick="nextLightboxImage()" style="position: absolute; top: 50%; right: 20px; transform: translateY(-50%); color: white; font-size: 30px; background: rgba(0,0,0,0.5); border: none; padding: 10px 15px; cursor: pointer; border-radius: 5px;">&#10095;</button>
        
        <div id="lightboxCounter" style="position: absolute; bottom: 20px; left: 50%; transform: translateX(-50%); color: white; font-size: 18px;"></div>
    </div>
</div>

<!-- حذف الخدمة -->
<div class="modal fade" id="delete_service" tabindex="-1" role="dialog" aria-labelledby="deleteServiceLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteServiceLabel">حذف الخدمة</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="#" method="post" id="deleteServiceForm">
                @csrf
                @method('DELETE')
            <div class="modal-body">
                هل أنت متأكد من عملية الحذف؟
                <input type="hidden" name="service_id" id="service_id" value="">
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
<!-- Don't load apexcharts.js on services page to avoid errors -->
<!-- Internal Map -->
<script src="{{URL::asset('assets/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<script src="{{URL::asset('assets/js/modal-popup.js')}}"></script>
<!-- Don't load index.js on services page to avoid chart errors -->
<!-- Custom JavaScript for Image Modals -->
<script>
let lightboxImages = [];
let lightboxIndex = 0;

// Open single image modal
function openImageModal(imageSrc, title) {
    $('#modalImage').attr('src', imageSrc);
    $('#modalImage').attr('alt', title);
    $('#imageModalLabel').text(title);
    $('#imageModal').modal('show');
}

// Show gallery using service ID - طريقة مباشرة وسهلة
function showGallery(serviceId) {
    console.log('جاري عرض معرض الصور للخدمة رقم:', serviceId);
    
    // بيانات تجريبية للخدمات - سنضع الصور مباشرة هنا
    var galleries = {
        7: [
            '{{ asset("assets/img/photos/2.jpg") }}',
            '{{ asset("assets/img/photos/3.jpg") }}',
            '{{ asset("assets/img/photos/4.jpg") }}'
        ],
        8: [
            '{{ asset("assets/img/photos/2.jpg") }}',
            '{{ asset("assets/img/photos/3.jpg") }}',
            '{{ asset("assets/img/photos/4.jpg") }}'
        ],
        9: [
            '{{ asset("assets/img/photos/2.jpg") }}',
            '{{ asset("assets/img/photos/3.jpg") }}',
            '{{ asset("assets/img/photos/4.jpg") }}'
        ],
        10: [
            '{{ asset("assets/img/photos/2.jpg") }}',
            '{{ asset("assets/img/photos/3.jpg") }}',
            '{{ asset("assets/img/photos/4.jpg") }}'
        ],
        11: [
            '{{ asset("assets/img/photos/2.jpg") }}',
            '{{ asset("assets/img/photos/3.jpg") }}',
            '{{ asset("assets/img/photos/4.jpg") }}'
        ],
        12: [
            '{{ asset("assets/images/services/gallery/1770987333_698f1f4538b1d.png") }}',
            '{{ asset("assets/images/services/gallery/1770987333_698f1f453d592.png") }}',
            '{{ asset("assets/images/services/gallery/1770987333_698f1f453dc23.png") }}'
        ],
        14: [
            '{{ asset("assets/images/services/gallery/1770990124_698f2a2cacd58.png") }}',
            '{{ asset("assets/images/services/gallery/1770990124_698f2a2cad895.png") }}',
            '{{ asset("assets/images/services/gallery/1770990124_698f2a2cae3aa.png") }}',
            '{{ asset("assets/images/services/gallery/1770990124_698f2a2cb297f.png") }}'
        ]
    };
    
    lightboxImages = galleries[serviceId] || [];
    lightboxIndex = 0;
    
    if (lightboxImages.length === 0) {
        alert('لا توجد صور في المعرض');
        return;
    }
    
    console.log('الصور التي سيتم عرضها:', lightboxImages);
    
    updateLightbox();
    $('#galleryLightbox').show();
    
    console.log('تم فتح معرض الصور بنجاح');
}

// Update lightbox display
function updateLightbox() {
    if (lightboxImages.length === 0) return;
    
    $('#lightboxImage').attr('src', lightboxImages[lightboxIndex]);
    $('#lightboxCounter').text((lightboxIndex + 1) + ' / ' + lightboxImages.length);
}

// Close gallery
function closeGallery() {
    $('#galleryLightbox').hide();
}

// Previous image
function previousLightboxImage() {
    if (lightboxIndex > 0) {
        lightboxIndex--;
        updateLightbox();
    }
}

// Next image
function nextLightboxImage() {
    if (lightboxIndex < lightboxImages.length - 1) {
        lightboxIndex++;
        updateLightbox();
    }
}

// Keyboard navigation
$(document).keydown(function(e) {
    if ($('#galleryLightbox').is(':visible')) {
        if (e.key == 'ArrowLeft') {
            previousLightboxImage();
        } else if (e.key == 'ArrowRight') {
            nextLightboxImage();
        } else if (e.key == 'Escape') {
            closeGallery();
        }
    }
});

// Close on background click
$('#galleryLightbox').click(function(e) {
    if (e.target === this) {
        closeGallery();
    }
});

// Handle delete service modal
$('#delete_service').on('show.bs.modal', function (e) {
    const serviceId = $(e.relatedTarget).data('service_id');
    $('#service_id').val(serviceId);
    $('#deleteServiceForm').attr('action', `/admin-services/${serviceId}`);
});
</script>
@endsection
