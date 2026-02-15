@extends('layouts.app')
@section('title')
معرض الاعمال
@stop

<style>
.portfolio-thumbnail {
    border: 2px solid transparent;
    transition: all 0.3s ease;
}

.portfolio-thumbnail:hover {
    border-color: #007bff;
    transform: scale(1.05);
    box-shadow: 0 4px 12px rgba(0,123,255,0.3);
}

.no-image-placeholder {
    border: 2px dashed #ddd;
    transition: all 0.3s ease;
}

.no-image-placeholder:hover {
    border-color: #007bff;
    background: linear-gradient(135deg, #f0f8ff 0%, #e6f3ff 100%);
}
</style>
@section('page-header')
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">الأعمال</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    إدارة أعمال السابقة</span>
            </div>
        </div>
    </div>
@endsection

@section('content')

@if (session()->has('delete'))
    <script>
        window.onload = function() {
            notif({
                msg: "{{ session()->get('delete') }}",
                type: "success"
            })
        }
    </script>
@endif

@if (session()->has('success'))
    <script>
        window.onload = function() {
            notif({
                msg: "{{ session()->get('success') }}",
                type: "success"
            })
        }
    </script>
@endif

<div>
    <div class="row">
        <div class="col-xl-12">
            <div class="card mg-b-20">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title mg-b-0">الأعمال السابقة</h4>
                        <a href="{{ route('admin-portfolios.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus"></i>&nbsp; إضافة عمل جديد
                        </a>
                    </div>
                    <div class="table-responsive">
                        <table id="example" class="table key-buttons text-md-nowrap" data-page-length='50' style="text-align: center">
                            <thead>
                                <tr>
                                    <th class="border-bottom-0">#</th>
                                    <th class="border-bottom-0">المرفق</th>
                                    <th class="border-bottom-0">العنوان</th>
                                    <th class="border-bottom-0">العميل</th>
                                    <th class="border-bottom-0">التاريخ</th>
                                    <th class="border-bottom-0">الخدمة</th>
                                    <th class="border-bottom-0">مميز</th>
                                    <th class="border-bottom-0">الحالة</th>
                                    <th class="border-bottom-0">العمليات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($portfolios as $portfolio)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            @if($portfolio->images)
                                                <div class="image-preview-container">
                                                    <img src="{{ asset('storage/' . $portfolio->images) }}" 
                                                         alt="{{ $portfolio->title }}" 
                                                         class="portfolio-thumbnail"
                                                         style="width: 80px; height: 80px; object-fit: cover; border-radius: 8px; cursor: pointer; box-shadow: 0 2px 8px rgba(0,0,0,0.1); transition: all 0.3s ease;"
                                                         onclick="openPortfolioModal('{{ $portfolio->id }}', 0)"
                                                         onmouseover="this.style.transform='scale(1.05)'; this.style.boxShadow='0 4px 12px rgba(0,0,0,0.15)'"
                                                         onmouseout="this.style.transform='scale(1)'; this.style.boxShadow='0 2px 8px rgba(0,0,0,0.1)'">
                                                </div>
                                            @elseif($portfolio->videos)
                                                <div class="no-image-placeholder" 
                                                     style="width: 80px; height: 80px; border-radius: 8px; background: linear-gradient(135deg, #f5f5f5 0%, #e0e0e0 100%); display: flex; align-items: center; justify-content: center; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
                                                     <video src="{{ asset('storage/' . $portfolio->videos) }}" controls style="width: 100%; height: 100%; object-fit: cover; border-radius: 8px; cursor: pointer; box-shadow: 0 2px 8px rgba(0,0,0,0.1); transition: all 0.3s ease;"></video>
                                                </div>
                                            @endif
                                        </td>
                                        <td>
                                            <strong>{{ $portfolio->title }}</strong>
                                            @if($portfolio->is_featured)
                                                <span class="badge badge-warning ml-2">مميز</span>
                                            @endif
                                        </td>
                                        <td>{{ $portfolio->client_name ?? '-' }}</td>
                                        <td>{{ $portfolio->project_date ?? '-' }}</td>
                                        <td>
                                            @if($portfolio->service)
                                                <span class="badge badge-info">{{ $portfolio->service->title_ar ?? $portfolio->service->title_en }}</span>
                                            @else
                                                <span class="text-muted">-</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($portfolio->is_featured)
                                                <span class="badge badge-success">نعم</span>
                                            @else
                                                <span class="text-muted">لا</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($portfolio->is_active)
                                                <span class="badge badge-primary">نشط</span>
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
                                                    <a class="dropdown-item" href="{{ route('admin-portfolios.edit', $portfolio->id) }}">
                                                        <i class="fas fa-edit text-primary"></i> تعديل
                                                    </a>
                                                    <a class="dropdown-item" href="#" onclick="deletePortfolio({{ $portfolio->id }}); return false;" data-portfolio_id="{{ $portfolio->id }}">
                                                        <i class="fas fa-trash text-danger"></i> حذف
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
    </div>
</div>

<!-- Portfolio Delete Confirmation Modal -->
<div class="modal fade" id="deletePortfolioModal" tabindex="-1" role="dialog" aria-labelledby="deletePortfolioModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deletePortfolioModalLabel">تأكيد الحذف</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>هل أنت متأكد من حذف هذا العمل؟</p>
                <p class="text-muted">هذا الإجراء لا يمكن التراجع عنه.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>
                <button type="button" class="btn btn-danger" onclick="confirmDelete()">حذف</button>
            </div>
        </div>
    </div>
</div>

<!-- Portfolio Images Modal -->
<div class="modal fade" id="portfolioImagesModal" tabindex="-1" role="dialog" aria-labelledby="portfolioImagesModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="portfolioImagesModalLabel">صور العمل</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="position-relative">
                    <!-- Navigation Arrows -->
                    <button type="button" class="btn btn-dark position-absolute" style="top: 50%; left: 10px; z-index: 1000; transform: translateY(-50%);" 
                            onclick="navigateImage(-1)" id="prevImageBtn" style="display: none;">
                        <i class="fas fa-chevron-left"></i>
                    </button>
                    <button type="button" class="btn btn-dark position-absolute" style="top: 50%; right: 10px; z-index: 1000; transform: translateY(-50%);" 
                            onclick="navigateImage(1)" id="nextImageBtn" style="display: none;">
                        <i class="fas fa-chevron-right"></i>
                    </button>
                    
                    <!-- Main Image Display -->
                    <div id="mainImageContainer" class="text-center">
                        <img id="mainPortfolioImage" src="" alt="Portfolio Image" 
                             class="img-fluid rounded" style="max-height: 500px; object-fit: contain;">
                    </div>
                </div>
                
                <!-- Thumbnail Gallery -->
                <div id="portfolioImagesContainer" class="row mt-3">
                    <!-- Images will be loaded here -->
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>

<!-- حذف العمل -->
<div class="modal fade" id="delete_portfolio" tabindex="-1" role="dialog" aria-labelledby="deletePortfolioLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deletePortfolioLabel">حذف العمل</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="#" method="post" id="deletePortfolioForm">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    هل أنت متأكد من عملية الحذف؟
                    <input type="hidden" name="portfolio_id" id="portfolio_id" value="">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>
                    <button type="submit" class="btn btn-danger">تأكيد الحذف</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

<script>
// Open portfolio images modal
let currentPortfolioImages = [];
let currentImageIndex = 0;

function openPortfolioModal(portfolioId, imageIndex = 0) {
    const portfolio = @json($portfolios);
    const selectedPortfolio = portfolio.find(p => p.id == portfolioId);
    
    if (selectedPortfolio && selectedPortfolio.images && selectedPortfolio.images.length > 0) {
        currentPortfolioImages = selectedPortfolio.images;
        currentImageIndex = 0; // Always start with first image
        
        // Hide navigation buttons since we only show one image
        document.getElementById('prevImageBtn').style.display = 'none';
        document.getElementById('nextImageBtn').style.display = 'none';
        
        updateMainImage();
        loadThumbnails();
        
        $('#portfolioImagesModal').modal('show');
    }
}

// Navigate between images
function navigateImage(direction) {
    currentImageIndex += direction;
    
    // Wrap around if at boundaries
    if (currentImageIndex < 0) {
        currentImageIndex = currentPortfolioImages.length - 1;
    } else if (currentImageIndex >= currentPortfolioImages.length) {
        currentImageIndex = 0;
    }
    
    updateMainImage();
    loadThumbnails();
}

// Update main image display
function updateMainImage() {
    const mainImage = document.getElementById('mainPortfolioImage');
    if (mainImage && currentPortfolioImages[currentImageIndex]) {
        mainImage.src = asset('storage/' + currentPortfolioImages[currentImageIndex]);
        mainImage.alt = `Portfolio Image ${currentImageIndex + 1}`;
    }
}

// Load thumbnail gallery
function loadThumbnails() {
    const container = document.getElementById('portfolioImagesContainer');
    container.innerHTML = '';
    
    // Only show the first image
    if (currentPortfolioImages.length > 0) {
        const image = currentPortfolioImages[0];
        const imageHtml = `
            <div class="col-md-12 mb-3 text-center">
                <img src="${asset('storage/' + image)}" alt="Portfolio Image" 
                     class="img-fluid rounded border-primary" 
                     style="max-height: 400px; object-fit: contain;">
            </div>
        `;
        container.innerHTML += imageHtml;
    }
}

// Delete portfolio function
let currentPortfolioId = null;

function deletePortfolio(portfolioId) {
    currentPortfolioId = portfolioId;
    $('#deletePortfolioModal').modal('show');
}

function confirmDelete() {
    if (!currentPortfolioId) return;
    
    $.ajax({
        url: `{{ route('admin-portfolios.destroy', ':id') }}`.replace(':id', currentPortfolioId),
        method: 'POST',
        data: {
            '_token': '{{ csrf_token() }}',
            '_method': 'DELETE'
        },
        success: function(response) {
            console.log('Delete successful:', response);
            
            // Close modal
            $('#deletePortfolioModal').modal('hide');
            
            // Show success notification
            notif({
                msg: "تم حذف العمل بنجاح",
                type: "success"
            });
            
            // Remove the deleted row from table immediately
            const row = $(`tr:has([data-portfolio_id="${currentPortfolioId}"])`);
            row.fadeOut(500, function() {
                $(this).remove();
                
                // Check if table is empty and show message
                const remainingRows = $('tbody tr').length;
                if (remainingRows === 0) {
                    $('tbody').html(`
                        <tr>
                            <td colspan="8" class="text-center py-4">
                                <div class="alert alert-info">
                                    <i class="fas fa-info-circle"></i>
                                    لا توجد أعمال حالياً
                                </div>
                            </td>
                        </tr>
                    `);
                }
            });
            
            // Reset currentPortfolioId
            currentPortfolioId = null;
        },
        error: function(xhr) {
            console.log('Delete error:', xhr);
            // Show error notification
            notif({
                msg: "حدث خطأ أثناء الحذف",
                type: "error"
            });
        }
    });
}

// Handle modal trigger for delete
$('#deletePortfolioModal').on('show.bs.modal', function(e) {
    // This event is now handled by the onclick function
});

$(document).ready(function() {
    // Initialize tooltips and other components
    $('[data-toggle="tooltip"]').tooltip();
});
</script>
