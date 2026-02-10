@extends('layouts.app')
@section('title')
ٍDashboard - Services
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
                                                                    @endphp
                                                                        <button class="btn btn-sm btn-info" onclick="openGalleryModal(<?= json_encode($gallery) ?>, '{{ $service->title_ar }}')">
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

<!-- Gallery Modal -->
<div class="modal fade" id="galleryModal" tabindex="-1" role="dialog" aria-labelledby="galleryModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="galleryModalLabel">معرض الصور</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="galleryContainer" class="row">
                    <!-- Gallery images will be loaded here -->
                </div>
                <div class="text-center mt-3">
                    <button id="prevBtn" class="btn btn-secondary" onclick="changeImage(-1)">
                        <i class="fas fa-chevron-right"></i> السابق
                    </button>
                    <span id="imageCounter" class="mx-3"></span>
                    <button id="nextBtn" class="btn btn-secondary" onclick="changeImage(1)">
                        التالي <i class="fas fa-chevron-left"></i>
                    </button>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
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
let currentGallery = [];
let currentImageIndex = 0;

// Open single image modal
function openImageModal(imageSrc, title) {
    $('#modalImage').attr('src', imageSrc);
    $('#modalImage').attr('alt', title);
    $('#imageModalLabel').text(title);
    $('#imageModal').modal('show');
}

// Open gallery modal
function openGalleryModal(gallery, title) {
    console.log('Gallery data:', gallery);
    console.log('Title:', title);
    
    currentGallery = gallery;
    currentImageIndex = 0;
    
    $('#galleryModalLabel').text('معرض الصور - ' + title);
    displayGalleryImage();
    $('#galleryModal').modal('show');
}

// Display current gallery image
function displayGalleryImage() {
    if (currentGallery.length === 0) return;
    
    const container = $('#galleryContainer');
    container.empty();
    
    // Create main image display
    const mainImage = `
        <div class="col-12 text-center mb-3">
            <img src="${currentGallery[currentImageIndex]}" 
                 alt="Gallery Image ${currentImageIndex + 1}" 
                 style="max-width: 100%; max-height: 400px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
        </div>
    `;
    
    // Create thumbnail strip
    let thumbnails = '<div class="col-12"><div class="d-flex justify-content-center flex-wrap">';
    
    currentGallery.forEach((image, index) => {
        const activeClass = index === currentImageIndex ? 'border-primary border-3' : 'border-secondary';
        thumbnails += `
            <img src="${image}" 
                 alt="Thumbnail ${index + 1}" 
                 class="img-thumbnail m-1 ${activeClass}" 
                 style="width: 60px; height: 60px; object-fit: cover; cursor: pointer; border: 2px solid;"
                 onclick="goToImage(${index})">
        `;
    });
    
    thumbnails += '</div></div>';
    
    container.html(mainImage + thumbnails);
    
    // Update counter
    $('#imageCounter').text(`${currentImageIndex + 1} / ${currentGallery.length}`);
    
    // Update button states
    $('#prevBtn').prop('disabled', currentImageIndex === 0);
    $('#nextBtn').prop('disabled', currentImageIndex === currentGallery.length - 1);
}

// Go to specific image
function goToImage(index) {
    currentImageIndex = index;
    displayGalleryImage();
}

// Change image (next/previous)
function changeImage(direction) {
    const newIndex = currentImageIndex + direction;
    if (newIndex >= 0 && newIndex < currentGallery.length) {
        currentImageIndex = newIndex;
        displayGalleryImage();
    }
}

// Handle delete service modal
$('#delete_service').on('show.bs.modal', function (e) {
    const serviceId = $(e.relatedTarget).data('service_id');
    $('#service_id').val(serviceId);
    $('#deleteServiceForm').attr('action', `/admin-services/${serviceId}`);
});

// Keyboard navigation for gallery
$(document).keydown(function(e) {
    if ($('#galleryModal').hasClass('show')) {
        if (e.key == 'ArrowLeft') {
            changeImage(1);
        } else if (e.key == 'ArrowRight') {
            changeImage(-1);
        } else if (e.key == 'Escape') {
            $('#galleryModal').modal('hide');
        }
    }
});
</script>
@endsection
