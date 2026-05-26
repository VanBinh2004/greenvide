@extends('layouts.app')

@section('title', 'Tin tức - GreenTech')

@section('meta_description', 'Tin tức, kiến thức kỹ thuật trồng và cập nhật thị trường cây công nghiệp từ GreenTech.')

@php
    $queryWithCategory = fn (?string $cat) => array_filter([
        'category' => $cat && $cat !== 'all' ? $cat : null,
    ]);
@endphp

@section('content')

    <section class="border-b border-brand-100 bg-gradient-to-br from-brand-50 to-accent-50/50 py-12 md:py-16">
        <div class="container-site">
            <nav class="mb-4 text-sm text-surface-muted" aria-label="Breadcrumb">
                <a href="{{ route('home') }}" class="hover:text-brand-600">Trang chủ</a>
                <span class="mx-2">/</span>
                <span class="font-medium text-brand-700">Tin tức</span>
            </nav>
            <h1 class="heading-2">Tin Tức & Kiến Thức</h1>
            <p class="text-lead mt-3 max-w-2xl">
                Cập nhật kỹ thuật canh tác, xu hướng thị trường và hoạt động từ GreenTech.
            </p>
        </div>
    </section>

    <section class="section-padding-sm py-10 md:py-14">
        <div class="container-site">

            <div class="mb-8 lg:hidden">
                <p class="mb-3 text-sm font-semibold text-gray-700">Danh mục</p>
                <div class="flex gap-2 overflow-x-auto pb-2">
                    <a
                        href="{{ route('news.index', $queryWithCategory(null)) }}"
                        @class([
                            'shrink-0 rounded-full px-4 py-2 text-sm font-semibold transition',
                            'bg-brand-600 text-white shadow-md' => $activeCategory === 'all',
                            'bg-white text-gray-600 ring-1 ring-gray-200 hover:ring-brand-300' => $activeCategory !== 'all',
                        ])
                    >
                        Tất cả
                    </a>
                    @foreach ($categories as $cat)
                        <a
                            href="{{ route('news.index', $queryWithCategory($cat['slug'])) }}"
                            @class([
                                'shrink-0 rounded-full px-4 py-2 text-sm font-semibold transition',
                                'bg-brand-600 text-white shadow-md' => $activeCategory === $cat['slug'],
                                'bg-white text-gray-600 ring-1 ring-gray-200 hover:ring-brand-300' => $activeCategory !== $cat['slug'],
                            ])
                        >
                            {{ $cat['label'] }}
                        </a>
                    @endforeach
                </div>
            </div>

            <div class="grid gap-10 lg:grid-cols-[260px_1fr] lg:gap-12">
                <aside class="hidden lg:block">
                    <div class="sticky top-24 rounded-2xl border border-brand-100 bg-white p-6 shadow-sm">
                        <h2 class="text-sm font-bold uppercase tracking-wider text-gray-900">Danh mục tin</h2>
                        <ul class="mt-4 space-y-1">
                            <li>
                                <a
                                    href="{{ route('news.index', $queryWithCategory(null)) }}"
                                    @class([
                                        'flex items-center justify-between rounded-lg px-4 py-3 text-sm font-semibold transition',
                                        'bg-brand-50 text-brand-700' => $activeCategory === 'all',
                                        'text-gray-600 hover:bg-gray-50 hover:text-brand-600' => $activeCategory !== 'all',
                                    ])
                                >
                                    Tất cả bài viết
                                    <span class="rounded-full bg-brand-100 px-2 py-0.5 text-xs font-medium text-brand-700">
                                        {{ $categoryCounts['all'] ?? 0 }}
                                    </span>
                                </a>
                            </li>
                            @foreach ($categories as $cat)
                                <li>
                                    <a
                                        href="{{ route('news.index', $queryWithCategory($cat['slug'])) }}"
                                        @class([
                                            'flex items-center justify-between rounded-lg px-4 py-3 text-sm font-semibold transition',
                                            'bg-brand-50 text-brand-700' => $activeCategory === $cat['slug'],
                                            'text-gray-600 hover:bg-gray-50 hover:text-brand-600' => $activeCategory !== $cat['slug'],
                                        ])
                                    >
                                        {{ $cat['label'] }}
                                        <span class="rounded-full bg-gray-100 px-2 py-0.5 text-xs font-medium text-surface-muted">
                                            {{ $categoryCounts[$cat['slug']] ?? 0 }}
                                        </span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>

                        <div class="mt-8 rounded-xl bg-brand-50 p-4">
                            <p class="text-sm font-semibold text-brand-800">Đăng ký tư vấn</p>
                            <p class="mt-1 text-xs text-brand-700/80">Nhận hướng dẫn kỹ thuật từ chuyên gia GreenTech.</p>
                            <a href="{{ route('home') }}#lien-he" class="btn btn-primary btn-sm mt-3 w-full justify-center">
                                Liên hệ ngay
                            </a>
                        </div>
                    </div>
                </aside>

                <div>
                    <p class="mb-6 text-sm text-surface-muted">
                        Hiển thị <strong class="text-gray-800">{{ count($articles) }}</strong> bài viết
                        @if ($activeCategory !== 'all' && isset($categories[$activeCategory]))
                            — <span class="text-brand-600">{{ $categories[$activeCategory]['label'] }}</span>
                        @endif
                    </p>

                    @if (count($articles) > 0)
                        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                            @foreach ($articles as $article)
                                @include('partials.news-card', ['article' => $article])
                            @endforeach
                        </div>
                    @else
                        <div class="rounded-2xl border border-dashed border-brand-200 bg-brand-50/50 py-16 text-center">
                            <i class="fas fa-newspaper text-4xl text-brand-300" aria-hidden="true"></i>
                            <p class="mt-4 font-semibold text-gray-800">Chưa có bài viết trong danh mục này</p>
                            <a href="{{ route('news.index') }}" class="btn btn-primary mt-6">Xem tất cả</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

@endsection
