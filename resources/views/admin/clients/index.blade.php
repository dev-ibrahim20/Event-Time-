@extends('layouts.app')

@section('title', 'العملاء')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">العملاء</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">الرئيسية</a></li>
                        <li class="breadcrumb-item active">العملاء</li>
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
                            <h3 class="card-title">عملائنا</h3>
                            <div class="card-tools">
                                <a href="{{ route('admin-clients.create') }}" class="btn btn-primary btn-sm">
                                    <i class="fas fa-plus"></i> إضافة عميل جديد
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            @if($clients->count() > 0)
                                <div class="row">
                                    @foreach($clients as $client)
                                        <div class="col-md-3 col-sm-6 mb-4">
                                            <div class="card client-card">
                                                <div class="card-body text-center">
                                                    <div class="client-image-container mb-3">
                                                        @if($client->image)
                                                            <img src="{{ asset('storage/' . $client->image) }}" 
                                                                 alt="{{ $client->name }}" 
                                                                 class="client-image img-fluid"
                                                                 style="max-height: 120px; object-fit: contain;">
                                                        @else
                                                            <div class="client-placeholder">
                                                                <i class="fas fa-building fa-3x text-gray-300"></i>
                                                            </div>
                                                        @endif
                                                    </div>
                                                    
                                                    <h6 class="client-name">{{ $client->name }}</h6>
                                                    
                                                    @if($client->website_url)
                                                        <a href="{{ $client->website_url }}" target="_blank" class="btn btn-sm btn-outline-primary mt-2">
                                                            <i class="fas fa-external-link-alt"></i> الموقع
                                                        </a>
                                                    @endif
                                                    
                                                    <div class="client-actions mt-2">
                                                        <span class="badge {{ $client->is_active ? 'badge-success' : 'badge-secondary' }}">
                                                            {{ $client->is_active ? 'نشط' : 'غير نشط' }}
                                                        </span>
                                                        
                                                        <div class="btn-group mt-2">
                                                            <a href="{{ route('admin-clients.edit', $client) }}" class="btn btn-sm btn-info">
                                                                <i class="fas fa-edit"></i>
                                                            </a>
                                                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteClientModal{{ $client->id }}">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!-- Delete Confirmation Modal -->
                                        <div class="modal fade" id="deleteClientModal{{ $client->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-danger text-white">
                                                        <h5 class="modal-title">
                                                            <i class="fas fa-exclamation-triangle"></i> تأكيد الحذف
                                                        </h5>
                                                        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body text-center">
                                                        <div class="mb-3">
                                                            <i class="fas fa-building fa-3x text-danger"></i>
                                                        </div>
                                                        <h5 class="text-danger">هل أنت متأكد من حذف هذا العميل؟</h5>
                                                        <p class="text-muted mb-2">
                                                            <strong>{{ $client->name }}</strong>
                                                        </p>
                                                        <div class="alert alert-warning">
                                                            <i class="fas fa-info-circle"></i>
                                                            <strong>تنبيه:</strong> هذا الإجراء لا يمكن التراجع عنه. سيتم حذف جميع بيانات العميل بشكل نهائي.
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                            <i class="fas fa-times"></i> إلغاء
                                                        </button>
                                                        <form action="{{ route('admin-clients.destroy', $client) }}" method="POST" style="display: inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">
                                                                <i class="fas fa-trash"></i> تأكيد الحذف
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <div class="text-center text-muted">
                                    <i class="fas fa-building fa-3x mb-3"></i>
                                    <h4>لا يوجد عملاء</h4>
                                    <p>لم يتم إضافة أي عملاء بعد.</p>
                                    <a href="{{ route('admin-clients.create') }}" class="btn btn-primary">
                                        <i class="fas fa-plus"></i> إضافة عميل جديد
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<style>
.client-card {
    border: 1px solid #e9ecef;
    border-radius: 8px;
    transition: transform 0.2s, box-shadow 0.2s;
}

.client-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
}

.client-image-container {
    height: 120px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #f8f9fa;
    border-radius: 4px;
}

.client-image {
    max-width: 100%;
    max-height: 120px;
    object-fit: contain;
}

.client-placeholder {
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100%;
}

.client-name {
    font-size: 14px;
    font-weight: 600;
    margin-bottom: 8px;
    color: #333;
}

.client-actions {
    font-size: 12px;
}
</style>
@endsection
