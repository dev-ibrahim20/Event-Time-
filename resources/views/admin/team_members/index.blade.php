@extends('layouts.app')

@section('title', 'أعضاء الفريق')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">أعضاء الفريق</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">الرئيسية</a></li>
                        <li class="breadcrumb-item active">أعضاء الفريق</li>
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
                            <h3 class="card-title">قائمة أعضاء الفريق</h3>
                            <div class="card-tools">
                                <a href="{{ route('admin-team-members.create') }}" class="btn btn-primary btn-sm">
                                    <i class="fas fa-plus"></i> إضافة عضو جديد
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            @if($teamMembers->count() > 0)
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>الصورة</th>
                                                <th>الاسم</th>
                                                <th>المنصب</th>
                                                <th>وسائل التواصل</th>
                                                <th>الحالة</th>
                                                <th>العمليات</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($teamMembers as $member)
                                                <tr>
                                                    <td>
                                                        @if($member->image)
                                                            <img src="{{ asset('storage/' . $member->image) }}" alt="{{ $member->name }}" 
                                                                 class="img-circle" style="width: 50px; height: 50px; object-fit: cover;">
                                                        @else
                                                            <div class="img-circle bg-gray-200 d-flex align-items-center justify-content-center" 
                                                                 style="width: 50px; height: 50px;">
                                                                <i class="fas fa-user text-gray-400"></i>
                                                            </div>
                                                        @endif
                                                    </td>
                                                    <td>{{ $member->name }}</td>
                                                    <td>{{ $member->position }}</td>
                                                    <td>
                                                        <div class="d-flex gap-1">
                                                            @if($member->twitter_link)
                                                                <a href="{{ $member->twitter_link }}" target="_blank" class="text-info">
                                                                    <i class="fab fa-twitter"></i>
                                                                </a>
                                                            @endif
                                                            @if($member->facebook_link)
                                                                <a href="{{ $member->facebook_link }}" target="_blank" class="text-primary">
                                                                    <i class="fab fa-facebook"></i>
                                                                </a>
                                                            @endif
                                                            @if($member->linkedin_link)
                                                                <a href="{{ $member->linkedin_link }}" target="_blank" class="text-info">
                                                                    <i class="fab fa-linkedin"></i>
                                                                </a>
                                                            @endif
                                                            @if($member->instagram_link)
                                                                <a href="{{ $member->instagram_link }}" target="_blank" class="text-danger">
                                                                    <i class="fab fa-instagram"></i>
                                                                </a>
                                                            @endif
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <span class="badge {{ $member->status ? 'badge-success' : 'badge-secondary' }}">
                                                            {{ $member->status ? 'نشط' : 'غير نشط' }}
                                                        </span>
                                                        @if($member->featured)
                                                            <span class="badge badge-warning">مميز</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <a href="{{ route('admin-team-members.edit', $member) }}" class="btn btn-sm btn-info">
                                                                <i class="fas fa-edit"></i> تعديل
                                                            </a>
                                                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteMemberModal{{ $member->id }}">
                                                                <i class="fas fa-trash"></i> حذف
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>
                                                
                                                <!-- Delete Confirmation Modal -->
                                                <div class="modal fade" id="deleteMemberModal{{ $member->id }}" tabindex="-1" role="dialog" aria-hidden="true">
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
                                                                    <i class="fas fa-user-times fa-3x text-danger"></i>
                                                                </div>
                                                                <h5 class="text-danger">هل أنت متأكد من حذف هذا العضو؟</h5>
                                                                <p class="text-muted mb-2">
                                                                    <strong>{{ $member->name }}</strong>
                                                                </p>
                                                                <p class="text-muted">
                                                                    {{ $member->position }}
                                                                </p>
                                                                <div class="alert alert-warning">
                                                                    <i class="fas fa-info-circle"></i>
                                                                    <strong>تنبيه:</strong> هذا الإجراء لا يمكن التراجع عنه. سيتم حذف جميع بيانات العضو بشكل نهائي.
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                                    <i class="fas fa-times"></i> إلغاء
                                                                </button>
                                                                <form action="{{ route('admin-team-members.destroy', $member) }}" method="POST" style="display: inline;">
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
                                        </tbody>
                                    </table>
                                </div>
                            @else
                                <div class="text-center text-muted">
                                    <i class="fas fa-users fa-3x mb-3"></i>
                                    <h4>لا يوجد أعضاء فريق</h4>
                                    <p>لم يتم إضافة أي أعضاء فريق بعد.</p>
                                    <a href="{{ route('admin-team-members.create') }}" class="btn btn-primary">
                                        <i class="fas fa-plus"></i> إضافة عضو جديد
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
@endsection
