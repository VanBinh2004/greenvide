@extends('layouts.app')

@section('title', 'Sản phẩm - GreenTech')

@section('meta_description', 'Danh sách giống cây công nghiệp: Đàn Hương, Trầm Hương, Măng Lục Trúc và nhiều loại khác từ GreenTech.')

@section('content')

    {{-- Page header --}}
    <section class="border-b border-brand-100 bg-gradient-to-br from-brand-50 to-accent-50/50 py-12 md:py-16">
        <div class="container-site">
            <nav class="mb-4 text-sm text-surface-muted" aria-label="Breadcrumb">
                <a href="{{ route('home') }}" class="hover:text-brand-600">Trang chủ</a>
                <span class="mx-2">/</span>
                <span class="font-medium text-brand-700">Sản phẩm</span>
            </nav>
            <h1 class="heading-2">Sản Phẩm</h1>
            <p class="text-lead mt-3 max-w-2xl">
                Giống cây công nghiệp chất lượng cao — chọn lọc theo danh mục phù hợp nhu cầu đầu tư của bạn.
            </p>
        </div>
    </section>

    <section class="section-padding-sm py-10 md:py-14">
        <div class="container-site">

            {{-- Mobile / tablet: filter chips --}}
            <div class="mb-8 lg:hidden">
                <p class="mb-3 text-sm font-semibold text-gray-700">Danh mục</p>
                <div class="flex gap-2 overflow-x-auto pb-2">
                    <a
                        href="{{ route('products') }}"
                        @class([
                            'shrink-0 rounded-full px-4 py-2 text-sm font-semibold transition',
                            'bg-brand-600 text-white' => $activeCategory === 'all',
                            'bg-white text-gray-600 ring-1 ring-gray-200 hover:ring-brand-300' => $activeCategory !== 'all',
                        ])
                    >
                        Tất cả
                    </a>
                    @foreach ($categories as $cat)
                        <a
                            href="{{ route('products', ['category' => $cat['slug']]) }}"
                            @class([
                                'shrink-0 rounded-full px-4 py-2 text-sm font-semibold transition',
                                'bg-brand-600 text-white' => $activeCategory === $cat['slug'],
                                'bg-white text-gray-600 ring-1 ring-gray-200 hover:ring-brand-300' => $activeCategory !== $cat['slug'],
                            ])
                        >
                            {{ $cat['label'] }}
                        </a>
                    @endforeach
                </div>
            </div>

            <div class="grid gap-10 lg:grid-cols-[260px_1fr] lg:gap-12">
                {{-- Sidebar filter (desktop) --}}
                <aside class="hidden lg:block">
                    <div class="sticky top-24 rounded-2xl border border-brand-100 bg-white p-6 shadow-sm">
                        <h2 class="text-sm font-bold uppercase tracking-wider text-gray-900">Danh mục</h2>
                        <ul class="mt-4 space-y-1">
                            <li>
                                <a
                                    href="{{ route('products') }}"
                                    @class([
                                        'flex items-center justify-between rounded-lg px-4 py-3 text-sm font-semibold transition',
                                        'bg-brand-50 text-brand-700' => $activeCategory === 'all',
                                        'text-gray-600 hover:bg-gray-50 hover:text-brand-600' => $activeCategory !== 'all',
                                    ])
                                >
                                    Tất cả sản phẩm
                                    <span class="text-xs font-medium text-surface-muted">{{ count(\App\Support\ProductCatalog::all()) }}</span>
                                </a>
                            </li>
                            @foreach ($categories as $cat)
                                @php
                                    $count = count(\App\Support\ProductCatalog::byCategory($cat['slug']));
                                @endphp
                                <li>
                                    <a
                                        href="{{ route('products', ['category' => $cat['slug']]) }}"
                                        @class([
                                            'flex items-center justify-between rounded-lg px-4 py-3 text-sm font-semibold transition',
                                            'bg-brand-50 text-brand-700' => $activeCategory === $cat['slug'],
                                            'text-gray-600 hover:bg-gray-50 hover:text-brand-600' => $activeCategory !== $cat['slug'],
                                        ])
                                    >
                                        {{ $cat['label'] }}
                                        <span class="text-xs font-medium text-surface-muted">{{ $count }}</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>

                        <div class="mt-8 rounded-xl bg-brand-50 p-4">
                            <p class="text-sm font-semibold text-brand-800">Cần tư vấn?</p>
                            <p class="mt-1 text-xs text-brand-700/80">Hotline hỗ trợ chọn giống phù hợp.</p>
                            <a href="tel:0908544200" class="btn btn-primary btn-sm mt-3 w-full justify-center">
                                0908 544 200
                            </a>
                        </div>
                    </div>
                </aside>

                {{-- Product grid --}}
                <div>
                    <div class="mb-6 flex flex-wrap items-center justify-between gap-3">
                        <p class="text-sm text-surface-muted">
                            Hiển thị <strong class="text-gray-800">{{ count($products) }}</strong> sản phẩm
                            @if ($activeCategory !== 'all' && isset($categories[$activeCategory]))
                                — <span class="text-brand-600">{{ $categories[$activeCategory]['label'] }}</span>
                            @endif
                        </p>
                    </div>

                    @if (count($products) > 0)
                        <div class="grid grid-cols-2 gap-4 sm:gap-6 xl:grid-cols-3 2xl:grid-cols-4">
                            @foreach ($products as $product)
                                @include('partials.product-card', ['product' => $product])
                            @endforeach
                        </div>
                    @else
                        <div class="rounded-2xl border border-dashed border-brand-200 bg-brand-50/50 py-16 text-center">
                            <i class="fas fa-seedling text-4xl text-brand-300" aria-hidden="true"></i>
                            <p class="mt-4 font-semibold text-gray-800">Chưa có sản phẩm trong danh mục này</p>
                            <a href="{{ route('products') }}" class="btn btn-primary mt-6">Xem tất cả</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

@endsection
