@extends('layouts.app')

@section('title', $product['name'] . ' - GreenTech')

@section('meta_description', $product['short_desc'])

@php
    $fallbackImage = \App\Support\ProductCatalog::imageUrl('fallback', 0, 900, 675);
@endphp

@section('content')

    <section class="section-padding-sm border-b border-brand-100 bg-white py-8">
        <div class="container-site">
            <nav class="text-sm text-surface-muted" aria-label="Breadcrumb">
                <a href="{{ route('home') }}" class="hover:text-brand-600">Trang chủ</a>
                <span class="mx-2">/</span>
                <a href="{{ route('products') }}" class="hover:text-brand-600">Sản phẩm</a>
                <span class="mx-2">/</span>
                <a href="{{ route('products', ['category' => $product['category']]) }}" class="hover:text-brand-600">{{ $categoryLabel }}</a>
                <span class="mx-2">/</span>
                <span class="font-medium text-brand-700">{{ $product['name'] }}</span>
            </nav>
        </div>
    </section>

    <section class="section-padding-sm py-10 md:py-14">
        <div class="container-site">
            <div class="grid gap-10 lg:grid-cols-2 lg:items-start lg:gap-16">
                <div class="lg:sticky lg:top-24">
                    <div class="overflow-hidden rounded-2xl border border-surface-200 bg-gray-100 shadow-sm">
                        <img
                            id="product-main-image"
                            src="{{ $product['gallery'][0] }}"
                            alt="{{ $product['name'] }}"
                            class="aspect-square w-full object-cover"
                            loading="eager"
                            decoding="async"
                            data-fallback="{{ $fallbackImage }}"
                            onerror="if(!this.dataset.fallbackUsed){this.dataset.fallbackUsed='1';this.src=this.dataset.fallback;}"
                        >
                    </div>
                    @if (count($product['gallery']) > 1)
                        <div class="mt-4 grid grid-cols-4 gap-2 sm:gap-3">
                            @foreach ($product['gallery'] as $index => $image)
                                <button
                                    type="button"
                                    class="product-thumb overflow-hidden rounded-xl border-2 bg-gray-100 transition {{ $index === 0 ? 'border-brand-500 ring-2 ring-brand-200' : 'border-transparent hover:border-brand-300' }}"
                                    data-image="{{ $image }}"
                                    aria-label="Ảnh {{ $index + 1 }}"
                                    aria-pressed="{{ $index === 0 ? 'true' : 'false' }}"
                                >
                                    <img
                                        src="{{ $image }}"
                                        alt=""
                                        class="aspect-square w-full object-cover"
                                        loading="lazy"
                                        data-fallback="{{ $fallbackImage }}"
                                        onerror="if(!this.dataset.fallbackUsed){this.dataset.fallbackUsed='1';this.src=this.dataset.fallback;}"
                                    >
                                </button>
                            @endforeach
                        </div>
                    @endif
                </div>

                <div>
                    <div class="flex flex-wrap items-center gap-2">
                        <span class="rounded-full bg-brand-50 px-3 py-1 text-xs font-bold uppercase tracking-wide text-brand-700">
                            {{ $categoryLabel }}
                        </span>
                        @if (! empty($product['badge']))
                            <span class="{{ $product['badge_class'] }}">{{ $product['badge'] }}</span>
                        @endif
                    </div>
                    <h1 class="heading-2 mt-4">{{ $product['name'] }}</h1>
                    <p class="mt-6 text-3xl font-extrabold tracking-tight text-brand-600 md:text-4xl">{{ $product['price_formatted'] }}</p>
                    <p class="text-lead mt-6">{{ $product['short_desc'] }}</p>

                    <form action="{{ route('cart.add') }}" method="POST" class="mt-8">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product['slug'] }}">
                        <input type="hidden" name="quantity" value="1">
                        <button type="submit" class="btn btn-primary btn-lg w-full justify-center gap-3 py-4 text-base shadow-lg shadow-brand-600/20 transition hover:shadow-xl hover:shadow-brand-600/25 sm:text-lg">
                            <i class="fas fa-cart-plus text-lg" aria-hidden="true"></i>
                            Thêm vào giỏ hàng
                        </button>
                    </form>

                    <a href="tel:0908544200" class="btn btn-secondary btn-lg mt-3 w-full justify-center">
                        <i class="fas fa-phone" aria-hidden="true"></i>
                        Tư vấn: 0908 544 200
                    </a>

                    <ul class="mt-8 space-y-3 rounded-2xl border border-brand-100 bg-brand-50/50 p-5">
                        @foreach ([
                            ['icon' => 'fa-truck', 'text' => 'Giao hàng toàn quốc'],
                            ['icon' => 'fa-shield-halved', 'text' => 'Bảo hành 30 ngày'],
                            ['icon' => 'fa-user-graduate', 'text' => 'Hỗ trợ kỹ thuật miễn phí'],
                        ] as $perk)
                            <li class="flex items-center gap-3 text-sm font-medium text-gray-700">
                                <i class="fas {{ $perk['icon'] }} text-brand-600" aria-hidden="true"></i>
                                {{ $perk['text'] }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="mt-16 grid gap-10 lg:grid-cols-2 lg:gap-16">
                <div class="rounded-2xl border border-surface-200 bg-white p-6 md:p-8">
                    <h2 class="heading-3">Mô tả chi tiết</h2>
                    <p class="mt-4 leading-relaxed text-gray-600">{{ $product['description'] }}</p>
                </div>
                <div>
                    <h2 class="heading-3">Thông số kỹ thuật</h2>
                    <div class="mt-4 overflow-hidden rounded-2xl border border-surface-200 shadow-sm">
                        <table class="w-full text-left text-sm">
                            <tbody>
                                @foreach ($product['specs'] as $spec)
                                    <tr class="border-b border-surface-200 last:border-0">
                                        <th class="w-2/5 bg-surface-50 px-4 py-3.5 font-semibold text-gray-700">
                                            {{ $spec['label'] }}
                                        </th>
                                        <td class="px-4 py-3.5 text-gray-600">{{ $spec['value'] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @if (count($relatedProducts) > 0)
        <section class="section-padding-sm border-t border-brand-100 bg-surface-50 py-14">
            <div class="container-site">
                <h2 class="heading-2 text-center">Sản Phẩm Liên Quan</h2>
                <p class="text-lead mx-auto mt-3 max-w-xl text-center">Cùng danh mục {{ $categoryLabel }}</p>
                <div class="divider-brand mt-6"></div>
                <div class="mt-10 grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                    @foreach ($relatedProducts as $related)
                        @include('partials.product-card', ['product' => $related])
                    @endforeach
                </div>
            </div>
        </section>
    @endif

@endsection

@push('scripts')
<script>
    document.querySelectorAll('.product-thumb').forEach((btn) => {
        btn.addEventListener('click', () => {
            const main = document.getElementById('product-main-image');
            if (main) {
                main.src = btn.dataset.image;
                main.dataset.fallbackUsed = '';
            }
            document.querySelectorAll('.product-thumb').forEach((t) => {
                t.classList.remove('border-brand-500', 'ring-2', 'ring-brand-200');
                t.classList.add('border-transparent');
                t.setAttribute('aria-pressed', 'false');
            });
            btn.classList.add('border-brand-500', 'ring-2', 'ring-brand-200');
            btn.classList.remove('border-transparent');
            btn.setAttribute('aria-pressed', 'true');
        });
    });
</script>
@endpush
