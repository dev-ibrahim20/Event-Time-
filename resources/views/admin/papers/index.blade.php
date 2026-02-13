@extends('layouts.app')
@section('title')
Dashboard - Papers
@stop
@section('page-header')
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">الأوراق</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    إدارة الأوراق</span>
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
                    <h3 class="card-title">الأوراق</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-info btn-sm" onclick="showAddQualityModal()">
                            <i class="fas fa-plus"></i> إضافة شهادة جودة
                        </button>
                        <button type="button" class="btn btn-success btn-sm ml-1" onclick="showAddOfficialModal()">
                            <i class="fas fa-plus"></i> إضافة شهادة رسمية
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    @if($papers)
                        <!-- Quality Certificates Table -->
                        <div class="card mb-4">
                            <div class="card-header">
                                <h5 class="card-title mb-0">شهادات الجودة</h5>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#addQualityModal">
                                        <i class="fas fa-plus"></i> إضافة شهادة جودة
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                @if($papers->quality_certificates_images && count($papers->quality_certificates_images) > 0)
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>الترتيب</th>
                                                    <th>الصورة</th>
                                                    <th>العمليات</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($papers->quality_certificates_images as $index => $certificate)
                                                    <tr>
                                                        <td>{{ $index + 1 }}</td>
                                                        <td>
                                                            <img src="{{ asset('storage/' . $certificate) }}" alt="Quality Certificate {{ $index + 1 }}" 
                                                                 class="img-fluid rounded" style="max-height: 100px; object-fit: cover; cursor: pointer;"
                                                                 onclick="openImageModal('{{ asset('storage/' . $certificate) }}', 'شهادة الجودة {{ $index + 1 }}')">
                                                        </td>
                                                        <td>
                                                            <button type="button" class="btn btn-sm btn-info" onclick="openImageModal('{{ asset('storage/' . $certificate) }}', 'شهادة الجودة {{ $index + 1 }}')">
                                                                <i class="fas fa-eye"></i> عرض
                                                            </button>
                                                            <hr>
                                                            <form method="POST" action="{{ route('admin-papers.destroy', $papers) }}" id="deleteQualityForm{{ $index }}">
                                                                @csrf
                                                                @method('DELETE')
                                                                <input type="hidden" name="delete_quality_index" value="{{ $index }}">
                                                                <button type="submit" class="btn btn-sm btn-danger" form="deleteQualityForm{{ $index }}">
                                                                    <i class="fas fa-trash"></i> مسح
                                                                </button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    @else
                                        <div class="text-center text-muted">
                                            <i class="fas fa-info-circle fa-2x mb-2"></i>
                                            <p>لا توجد شهادات جودة</p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        
                        <!-- Official Papers Table -->
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">الشهادات الرسمية</h5>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#addOfficialModal">
                                        <i class="fas fa-plus"></i> إضافة شهادة رسمية
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                @if($papers->official_papers_images && count($papers->official_papers_images) > 0)
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>الترتيب</th>
                                                    <th>الصورة</th>
                                                    <th>العمليات</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($papers->official_papers_images as $index => $paper)
                                                    <tr>
                                                        <td>{{ $index + 1 }}</td>
                                                        <td>
                                                            <img src="{{ asset('storage/' . $paper) }}" alt="Official Paper {{ $index + 1 }}" 
                                                                 class="img-fluid rounded" style="max-height: 100px; object-fit: cover; cursor: pointer;"
                                                                 onclick="openImageModal('{{ asset('storage/' . $paper) }}', 'الشهادة الرسمية {{ $index + 1 }}')">
                                                        </td>
                                                        <td>
                                                            <button type="button" class="btn btn-sm btn-info" onclick="openImageModal('{{ asset('storage/' . $paper) }}', 'الشهادة الرسمية {{ $index + 1 }}')">
                                                                <i class="fas fa-eye"></i> عرض
                                                            </button>
                                                            <button type="button" class="btn btn-sm btn-danger ml-1" onclick="deleteOfficialPaper({{ $index }})">
                                                                <i class="fas fa-trash"></i> مسح
                                                            </button>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    @else
                                        <div class="text-center text-muted">
                                            <i class="fas fa-info-circle fa-2x mb-2"></i>
                                            <p>لا توجد شهادات رسمية</p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        
                        <div class="row mt-3">
                            <div class="col-12">
                                <span class="badge {{ $papers && $papers->is_active ? 'badge-success' : 'badge-secondary' }}">
                                    {{ $papers && $papers->is_active ? 'نشط' : 'غير نشط' }}
                                </span>
                            </div>
                        </div>
                    @else
                        <div class="text-center">
                            <i class="fas fa-file-alt fa-3x text-muted mb-3"></i>
                            <h4>لا توجد بيانات</h4>
                            <p class="text-muted">لم يتم إضافة بيانات صفحة "الأوراق" بعد.</p>
                            <a href="{{ route('admin-papers.edit') }}" class="btn btn-primary">
                                <i class="fas fa-plus"></i> إضافة بيانات
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add Quality Certificate Modal -->
<div class="modal fade" id="addQualityModal" tabindex="-1" role="dialog" aria-labelledby="addQualityModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addQualityModalLabel">إضافة شهادة جودة</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addQualityForm" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="quality_image">صورة شهادة الجودة</label>
                        <input type="file" class="form-control" id="quality_image" name="quality_image" accept="image/*" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">إغلاق</button>
                <button type="button" class="btn btn-info" onclick="addQualityCertificate()">إضافة</button>
            </div>
        </div>
    </div>
</div>

<!-- Add Official Paper Modal -->
<div class="modal fade" id="addOfficialModal" tabindex="-1" role="dialog" aria-labelledby="addOfficialModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addOfficialModalLabel">إضافة شهادة رسمية</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addOfficialForm" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="official_image">صورة الشهادة الرسمية</label>
                        <input type="file" class="form-control" id="official_image" name="official_image" accept="image/*" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">إغلاق</button>
                <button type="button" class="btn btn-success" onclick="addOfficialPaper()">إضافة</button>
            </div>
        </div>
    </div>
</div>

<!-- Image Modal -->
<div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="imageModalLabel">معاينة الصورة</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <img id="modalImage" src="" alt="" class="img-fluid" style="max-height: 80vh;">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>

<script>
function openImageModal(imageSrc, imageTitle) {
    document.getElementById('modalImage').src = imageSrc;
    document.getElementById('modalImage').alt = imageTitle;
    document.getElementById('imageModalLabel').textContent = imageTitle;
    $('#imageModal').modal('show');
}

function addQualityCertificate() {
    const form = document.getElementById('addQualityForm');
    const formData = new FormData(form);
    
    fetch('{{ route("admin-papers.update") }}', {
        method: 'POST',
        body: formData,
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            $('#addQualityModal').modal('hide');
            location.reload();
        } else {
            alert('حدث خطأ أثناء الإضافة');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('حدث خطأ في الاتصال');
    });
}

function addOfficialPaper() {
    const form = document.getElementById('addOfficialForm');
    const formData = new FormData(form);
    
    fetch('{{ route("admin-papers.update") }}', {
        method: 'POST',
        body: formData,
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            $('#addOfficialModal').modal('hide');
            location.reload();
        } else {
            alert('حدث خطأ أثناء الإضافة');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('حدث خطأ في الاتصال');
    });
}
</script>

@endsection
