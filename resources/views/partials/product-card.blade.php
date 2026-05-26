@props(['product'])

@php
    $fallbackImage = \App\Support\ProductCatalog::imageUrl('fallback', 0, 800, 600);
    $categoryLabel = \App\Support\ProductCatalog::categoryLabel($product['category']);
@endphp

<article class="card-hover group flex flex-col overflow-hidden bg-white">
    <a href="{{ route('product.detail', $product['slug']) }}" class="relative block overflow-hidden bg-gray-100">
        <img
            src="{{ $product['image'] }}"
            alt="{{ $product['name'] }}"
            class="aspect-[4/3] w-full object-cover transition duration-500 group-hover:scale-105"
            loading="lazy"
            decoding="async"
            data-fallback="{{ $fallbackImage }}"
            onerror="if(!this.dataset.fallbackUsed){this.dataset.fallbackUsed='1';this.src=this.dataset.fallback;}"
        >
        <span class="absolute left-3 top-3 rounded-full bg-white/95 px-2.5 py-1 text-xs font-bold uppercase tracking-wide text-brand-700 shadow-sm backdrop-blur-sm">
            {{ $categoryLabel }}
        </span>
        @if (! empty($product['badge']))
            <span class="{{ $product['badge_class'] }} absolute right-3 top-3">{{ $product['badge'] }}</span>
        @endif
    </a>
    <div class="card-body flex flex-1 flex-col p-4 sm:p-5">
        <h3 class="text-base font-bold text-gray-900 sm:text-lg">
            <a href="{{ route('product.detail', $product['slug']) }}" class="transition hover:text-brand-600">
                {{ $product['name'] }}
            </a>
        </h3>
        <p class="mt-2 flex-1 text-sm leading-relaxed text-surface-muted line-clamp-2">
            {{ $product['short_desc'] }}
        </p>
        <p class="mt-4 text-xl font-extrabold text-brand-600">{{ $product['price_formatted'] }}</p>
        <div class="mt-4 flex flex-col gap-2 sm:flex-row">
            <a href="{{ route('product.detail', $product['slug']) }}" class="btn btn-secondary btn-sm flex-1 justify-center">
                Xem chi tiết
            </a>
            <form action="{{ route('cart.add') }}" method="POST" class="flex-1">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product['slug'] }}">
                <input type="hidden" name="quantity" value="1">
                <button type="submit" class="btn btn-primary btn-sm w-full justify-center">
                    <i class="fas fa-cart-plus text-xs" aria-hidden="true"></i>
                    Thêm vào giỏ
                </button>
            </form>
        </div>
    </div>
</article>
