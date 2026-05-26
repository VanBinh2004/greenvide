<!DOCTYPE html>
<html lang="vi" class="h-full scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="@yield('meta_description', 'GreenTech - Chuyên cung cấp giống cây công nghiệp Đàn Hương, Trầm Hương, Măng Lục Trúc và giải pháp nông nghiệp bền vững.')">
    <meta name="theme-color" content="#10b981">
    <title>@yield('title', 'GreenTech - Công Nghệ Toàn Cầu Xanh')</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,400;14..32,500;14..32,600;14..32,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>
<body
    class="flex min-h-full flex-col bg-[#f8fafc] font-sans text-[#1f2937] antialiased"
    @if(session('success')) data-flash-success="{{ session('success') }}" @endif
    @if(session('error')) data-flash-error="{{ session('error') }}" @endif
    @if(session('info')) data-flash-info="{{ session('info') }}" @endif
>

    {{-- Skeleton loading (ẩn sau khi trang sẵn sàng) --}}
    <div id="gt-skeleton" class="gt-skeleton" aria-hidden="true" aria-busy="true">
        <div class="gt-skeleton__bar"></div>
        <div class="gt-skeleton__hero"></div>
        <div class="gt-skeleton__content">
            <div class="gt-skeleton__line gt-skeleton__line--lg"></div>
            <div class="gt-skeleton__line"></div>
            <div class="gt-skeleton__line gt-skeleton__line--short"></div>
            <div class="gt-skeleton__grid">
                <div class="gt-skeleton__card"></div>
                <div class="gt-skeleton__card"></div>
                <div class="gt-skeleton__card"></div>
            </div>
        </div>
    </div>

    <div id="page-root" class="page-root flex min-h-full flex-1 flex-col">
        @include('partials.header')

        <main class="w-full min-w-0 flex-1" id="main-content" role="main">
            @yield('content')
        </main>

        @include('partials.footer')
    </div>

    @include('partials.ui')

    @stack('scripts')
</body>
</html>
