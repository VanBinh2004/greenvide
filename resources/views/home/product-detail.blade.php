@extends('layouts.app')

@section('title', $product['name'] . ' - GreenTech')

@section('meta_description', $product['short_desc'])

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
            <div class="grid gap-10 lg:grid-cols-2 lg:gap-16">
                {{-- Gallery --}}
                <div>
                    <div class="overflow-hidden rounded-2xl border border-surface-200 bg-gray-50">
                        <img
                            id="product-main-image"
                            src="{{ $product['gallery'][0] }}"
                            alt="{{ $product['name'] }}"
                            class="aspect-square w-full object-cover"
                            loading="eager"
                        >
                    </div>
                    @if (count($product['gallery']) > 1)
                        <div class="mt-4 grid grid-cols-4 gap-3">
                            @foreach ($product['gallery'] as $index => $image)
                                <button
                                    type="button"
                                    class="product-thumb overflow-hidden rounded-xl border-2 transition {{ $index === 0 ? 'border-brand-500 ring-2 ring-brand-200' : 'border-transparent hover:border-brand-200' }}"
                                    data-image="{{ $image }}"
                                    aria-label="Ảnh {{ $index + 1 }}"
                                >
                                    <img src="{{ $image }}" alt="" class="aspect-square w-full object-cover" loading="lazy">
                                </button>
                            @endforeach
                        </div>
                    @endif
                </div>

                {{-- Product info --}}
                <div>
                    @if (! empty($product['badge']))
                        <span class="{{ $product['badge_class'] }}">{{ $product['badge'] }}</span>
                    @endif
                    <p class="eyebrow mt-4">{{ $categoryLabel }}</p>
                    <h1 class="heading-2 mt-2">{{ $product['name'] }}</h1>
                    <p class="mt-6 text-3xl font-extrabold text-brand-600">{{ $product['price_formatted'] }}</p>
                    <p class="text-lead mt-6">{{ $product['short_desc'] }}</p>

                    <div class="mt-8 flex flex-col gap-3 sm:flex-row">
                        <button
                            type="button"
                            class="btn btn-primary btn-lg flex-1 justify-center"
                            data-add-to-cart
                            data-product-name="{{ $product['name'] }}"
                        >
                            <i class="fas fa-cart-plus" aria-hidden="true"></i>
                            Thêm vào giỏ hàng
                        </button>
                        <a href="tel:0908544200" class="btn btn-secondary btn-lg flex-1 justify-center">
                            <i class="fas fa-phone" aria-hidden="true"></i>
                            Tư vấn ngay
                        </a>
                    </div>

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

            {{-- Description & specs --}}
            <div class="mt-16 grid gap-10 lg:grid-cols-2 lg:gap-16">
                <div>
                    <h2 class="heading-3">Mô tả chi tiết</h2>
                    <p class="mt-4 leading-relaxed text-gray-600">{{ $product['description'] }}</p>
                </div>
                <div>
                    <h2 class="heading-3">Thông số kỹ thuật</h2>
                    <div class="mt-4 overflow-hidden rounded-2xl border border-surface-200">
                        <table class="w-full text-left text-sm">
                            <tbody>
                                @foreach ($product['specs'] as $spec)
                                    <tr class="border-b border-surface-200 last:border-0">
                                        <th class="w-2/5 bg-surface-50 px-4 py-3 font-semibold text-gray-700">
                                            {{ $spec['label'] }}
                                        </th>
                                        <td class="px-4 py-3 text-gray-600">{{ $spec['value'] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Related products --}}
    @if (count($relatedProducts) > 0)
        <section class="section-padding-sm border-t border-brand-100 bg-surface-50 py-14">
            <div class="container-site">
                <h2 class="heading-2 text-center">Sản Phẩm Liên Quan</h2>
                <p class="text-lead mx-auto mt-3 max-w-xl text-center">Cùng danh mục {{ $categoryLabel }}</p>
                <div class="divider-brand mt-6"></div>
                <div class="mt-10 grid grid-cols-2 gap-4 sm:gap-6 lg:grid-cols-4">
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
            if (main) main.src = btn.dataset.image;
            document.querySelectorAll('.product-thumb').forEach((t) => {
                t.classList.remove('border-brand-500', 'ring-2', 'ring-brand-200');
                t.classList.add('border-transparent');
            });
            btn.classList.add('border-brand-500', 'ring-2', 'ring-brand-200');
            btn.classList.remove('border-transparent');
        });
    });
</script>
@endpush
