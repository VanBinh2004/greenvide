@extends('layouts.app')

@section('title', $article['title'] . ' - GreenTech')

@section('meta_description', $article['excerpt'])

@php
    $fallbackCover = \App\Support\NewsCatalog::imageUrl('fallback', 1200, 600);
    $shareUrl = url()->current();
    $shareTitle = $article['title'];
@endphp

@section('content')

    <section class="section-padding-sm border-b border-brand-100 bg-white py-8">
        <div class="container-site">
            <nav class="text-sm text-surface-muted" aria-label="Breadcrumb">
                <a href="{{ route('home') }}" class="hover:text-brand-600">Trang chủ</a>
                <span class="mx-2">/</span>
                <a href="{{ route('news.index') }}" class="hover:text-brand-600">Tin tức</a>
                <span class="mx-2">/</span>
                <a href="{{ route('news.index', ['category' => $article['category']]) }}" class="hover:text-brand-600">{{ $categoryLabel }}</a>
                <span class="mx-2">/</span>
                <span class="font-medium text-brand-700 line-clamp-1">{{ $article['title'] }}</span>
            </nav>
        </div>
    </section>

    <article class="section-padding-sm py-10 md:py-14">
        <div class="container-site max-w-4xl">
            <span class="rounded-full bg-brand-50 px-3 py-1 text-xs font-bold uppercase tracking-wide text-brand-700">
                {{ $categoryLabel }}
            </span>
            <h1 class="heading-2 mt-4">{{ $article['title'] }}</h1>
            <div class="mt-6 flex flex-wrap items-center gap-4 text-sm text-surface-muted">
                <time datetime="{{ $article['published_at'] }}" class="flex items-center gap-2">
                    <i class="far fa-calendar text-brand-600" aria-hidden="true"></i>
                    {{ $article['date_formatted'] }}
                </time>
                <span class="flex items-center gap-2">
                    <i class="far fa-user text-brand-600" aria-hidden="true"></i>
                    {{ $article['author'] }}
                </span>
            </div>
        </div>

        <div class="container-site mt-8 max-w-5xl">
            <div class="overflow-hidden rounded-2xl border border-surface-200 bg-gray-100 shadow-sm">
                <img
                    src="{{ $article['cover'] }}"
                    alt="{{ $article['title'] }}"
                    class="aspect-[21/9] w-full object-cover sm:aspect-[2/1]"
                    loading="eager"
                    decoding="async"
                    data-fallback="{{ $fallbackCover }}"
                    onerror="if(!this.dataset.fallbackUsed){this.dataset.fallbackUsed='1';this.src=this.dataset.fallback;}"
                >
            </div>
        </div>

        <div class="container-site mt-10 grid gap-10 lg:grid-cols-[1fr_200px] lg:gap-12">
            <div
                class="article-content max-w-3xl space-y-4 text-base leading-relaxed text-gray-600
                    [&_h2]:mt-8 [&_h2]:text-xl [&_h2]:font-bold [&_h2]:text-gray-900
                    [&_p]:leading-relaxed
                    [&_ul]:list-disc [&_ul]:space-y-2 [&_ul]:pl-6
                    [&_ol]:list-decimal [&_ol]:space-y-2 [&_ol]:pl-6
                    [&_strong]:font-semibold [&_strong]:text-gray-800
                    [&_li]:text-gray-600"
            >
                {!! $article['content'] !!}
            </div>

            <aside class="lg:sticky lg:top-24 lg:self-start">
                <p class="text-sm font-bold uppercase tracking-wider text-gray-900">Chia sẻ</p>
                <div class="mt-4 flex flex-row gap-2 lg:flex-col">
                    <button
                        type="button"
                        class="share-btn flex flex-1 items-center justify-center gap-2 rounded-lg border border-[#1877f2]/30 bg-[#1877f2]/5 px-4 py-3 text-sm font-semibold text-[#1877f2] transition hover:bg-[#1877f2]/10 lg:flex-none"
                        data-share="facebook"
                        data-url="{{ $shareUrl }}"
                        data-title="{{ $shareTitle }}"
                    >
                        <i class="fab fa-facebook-f" aria-hidden="true"></i>
                        <span class="hidden sm:inline lg:inline">Facebook</span>
                    </button>
                    <button
                        type="button"
                        class="share-btn flex flex-1 items-center justify-center gap-2 rounded-lg border border-gray-200 bg-gray-50 px-4 py-3 text-sm font-semibold text-gray-700 transition hover:bg-gray-100 lg:flex-none"
                        data-share="copy"
                        data-url="{{ $shareUrl }}"
                    >
                        <i class="fas fa-link" aria-hidden="true"></i>
                        <span class="hidden sm:inline lg:inline">Sao chép link</span>
                    </button>
                    <button
                        type="button"
                        class="share-btn flex flex-1 items-center justify-center gap-2 rounded-lg border border-[#0068ff]/30 bg-[#0068ff]/5 px-4 py-3 text-sm font-semibold text-[#0068ff] transition hover:bg-[#0068ff]/10 lg:flex-none"
                        data-share="zalo"
                        data-url="{{ $shareUrl }}"
                        data-title="{{ $shareTitle }}"
                    >
                        <i class="fas fa-comment-dots" aria-hidden="true"></i>
                        <span class="hidden sm:inline lg:inline">Zalo</span>
                    </button>
                </div>
                <p class="mt-3 text-xs text-surface-muted">Demo — nút chia sẻ mô phỏng.</p>
            </aside>
        </div>
    </article>

    @if (count($relatedArticles) > 0)
        <section class="section-padding-sm border-t border-brand-100 bg-surface-50 py-14">
            <div class="container-site">
                <h2 class="heading-2 text-center">Bài Viết Liên Quan</h2>
                <p class="text-lead mx-auto mt-3 max-w-xl text-center">Cùng chủ đề {{ $categoryLabel }}</p>
                <div class="divider-brand mt-6"></div>
                <div class="mt-10 grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                    @foreach ($relatedArticles as $related)
                        @include('partials.news-card', ['article' => $related])
                    @endforeach
                </div>
            </div>
        </section>
    @endif

@endsection

@push('scripts')
<script>
    document.querySelectorAll('.share-btn').forEach((btn) => {
        btn.addEventListener('click', () => {
            const url = btn.dataset.url || window.location.href;
            const title = btn.dataset.title || document.title;
            const type = btn.dataset.share;

            if (type === 'copy') {
                navigator.clipboard?.writeText(url).then(() => {
                    if (window.GreenTechUI?.toast) {
                        GreenTechUI.toast('Đã sao chép link bài viết!', 'success');
                    } else {
                        alert('Đã sao chép link!');
                    }
                }).catch(() => alert(url));
                return;
            }

            if (type === 'facebook') {
                window.open('https://www.facebook.com/sharer/sharer.php?u=' + encodeURIComponent(url), '_blank', 'width=600,height=400');
                return;
            }

            if (type === 'zalo') {
                if (window.GreenTechUI?.toast) {
                    GreenTechUI.toast('Chia sẻ Zalo (demo): ' + title, 'info');
                } else {
                    alert('Chia sẻ Zalo (demo)\n' + title + '\n' + url);
                }
            }
        });
    });
</script>
@endpush
