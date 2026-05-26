@props(['product'])

<article class="card-hover group flex flex-col overflow-hidden bg-white">
    <a href="{{ route('product.detail', $product['slug']) }}" class="relative block overflow-hidden">
        <img
            src="{{ $product['image'] }}"
            alt="{{ $product['name'] }}"
            class="card-image transition duration-500 group-hover:scale-105"
            loading="lazy"
        >
        @if (! empty($product['badge']))
            <span class="{{ $product['badge_class'] }} absolute left-3 top-3">{{ $product['badge'] }}</span>
        @endif
    </a>
    <div class="card-body flex flex-1 flex-col">
        <p class="text-xs font-semibold uppercase tracking-wide text-brand-600">
            {{ \App\Support\ProductCatalog::categoryLabel($product['category']) }}
        </p>
        <h3 class="mt-1 text-lg font-bold text-gray-900">
            <a href="{{ route('product.detail', $product['slug']) }}" class="hover:text-brand-600">
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
