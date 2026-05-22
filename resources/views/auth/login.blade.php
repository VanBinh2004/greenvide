@extends('layouts.app')

@section('title', 'Đăng nhập - GreenTech')

@section('content')
    <section class="section-padding section-bg-light">
        <div class="container-site">
            <div class="mx-auto max-w-md text-center">
                <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-2xl bg-brand-100 text-brand-600">
                    <i class="fas fa-user-lock text-2xl" aria-hidden="true"></i>
                </div>
                <h1 class="heading-2 mt-6">Đăng nhập</h1>
                <p class="text-lead mt-4">
                    Tính năng đăng nhập đang được phát triển. Vui lòng liên hệ hotline để được hỗ trợ.
                </p>
                <div class="mt-8 flex flex-col gap-3 sm:flex-row sm:justify-center">
                    <a href="{{ route('home') }}" class="btn btn-secondary">Về trang chủ</a>
                    <a href="tel:0908544200" class="btn btn-primary">
                        <i class="fas fa-phone" aria-hidden="true"></i>
                        0908 544 200
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
