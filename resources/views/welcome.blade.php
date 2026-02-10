@extends('layouts.master')

@section('title', app()->getLocale() == 'ar' ? 'وقت الحدث - تجهيز المؤتمرات والمعارض والخيام الأوروبية' : 'Event Time - Conference, Exhibition & European Tent Setup')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8">
        <div>
            <div class="mx-auto h-12 w-12 flex items-center justify-center rounded-full bg-red-600">
                <i class="fas fa-home text-white text-xl"></i>
            </div>
            <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                {{ app()->getLocale() == 'ar' ? 'وقت الحدث' : 'Event Time' }}
            </h2>
            <p class="mt-2 text-center text-sm text-gray-600">
                {{ app()->getLocale() == 'ar' ? 'شركة رائدة في تجهيز المؤتمرات والمعارض والخيام الأوروبية' : 'Leading company in conference, exhibition, and European tent setup' }}
            </p>
        </div>
        
        <div class="text-center">
            <a href="{{ url('/login') }}" class="text-red-600 hover:text-red-500 text-sm">
                <i class="fas fa-sign-in-alt ml-1"></i>
                {{ app()->getLocale() == 'ar' ? 'تسجيل الدخول' : 'Login' }}
            </a>
        </div>
    </div>
</div>
@endsection
