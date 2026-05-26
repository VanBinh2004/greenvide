@props(['article'])

@php
    $fallbackImage = \App\Support\NewsCatalog::imageUrl('fallback', 800, 500);
@endphp

<article class="card-hover group flex flex-col overflow-hidden bg-white">
    <a href="{{ route('news.show', $article['slug']) }}" class="relative block overflow-hidden bg-gray-100">
        <img
            src="{{ $article['image'] }}"
            alt="{{ $article['title'] }}"
            class="aspect-[16/10] w-full object-cover transition duration-500 group-hover:scale-105"
            loading="lazy"
            decoding="async"
            data-fallback="{{ $fallbackImage }}"
            onerror="if(!this.dataset.fallbackUsed){this.dataset.fallbackUsed='1';this.src=this.dataset.fallback;}"
        >
        <span class="absolute left-3 top-3 rounded-full bg-white/95 px-2.5 py-1 text-xs font-bold text-brand-700 shadow-sm backdrop-blur-sm">
            {{ $article['category_label'] }}
        </span>
    </a>
    <div class="flex flex-1 flex-col p-5 sm:p-6">
        <time class="text-xs font-bold uppercase tracking-wide text-brand-600" datetime="{{ $article['published_at'] }}">
            {{ $article['date_formatted'] }}
        </time>
        <h3 class="mt-3 text-lg font-bold leading-snug text-gray-900 line-clamp-2">
            <a href="{{ route('news.show', $article['slug']) }}" class="transition hover:text-brand-600">
                {{ $article['title'] }}
            </a>
        </h3>
        <p class="mt-3 flex-1 text-sm leading-relaxed text-surface-muted line-clamp-3">
            {{ $article['excerpt'] }}
        </p>
        <a
            href="{{ route('news.show', $article['slug']) }}"
            class="mt-5 inline-flex items-center gap-2 text-sm font-bold text-brand-600 transition hover:gap-3"
        >
            Đọc thêm
            <i class="fas fa-arrow-right text-xs" aria-hidden="true"></i>
        </a>
    </div>
</article>
