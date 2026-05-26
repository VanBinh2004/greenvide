@extends('layouts.app')

@section('title', 'Giỏ hàng - GreenTech')

@section('content')
    <section class="section-padding">
        <div class="container-site">
            <div class="mb-8">
                <h1 class="text-3xl font-bold text-gray-900">Giỏ hàng của bạn</h1>
                <p class="mt-2 text-gray-600">Quản lý sản phẩm trong giỏ hàng và tiếp tục mua sắm</p>
            </div>

            @if (session('success'))
                <div class="mb-6 rounded-lg border border-green-200 bg-green-50 p-4 text-sm text-green-800">
                    <i class="fas fa-check-circle mr-2"></i>{{ session('success') }}
                </div>
            @endif

            @if (count($cartItems) > 0)
                <div class="grid gap-8 lg:grid-cols-[2.2fr_1fr]">
                    <div class="space-y-6">
                        <div class="rounded-[1.5rem] border border-gray-200 bg-white p-5 shadow-sm">
                            <div class="flex flex-col gap-2 sm:flex-row sm:items-center sm:justify-between">
                                <div>
                                    <p class="text-sm text-gray-500">Bạn đang có {{ count($cartItems) }} sản phẩm trong giỏ hàng</p>
                                    <h2 class="mt-1 text-2xl font-bold text-gray-900">Giỏ hàng</h2>
                                </div>
                                <div class="rounded-full bg-emerald-50 px-4 py-2 text-sm font-semibold text-emerald-700">
                                    Tạm tính {{ number_format($subtotal, 0, '.', '.') }}đ
                                </div>
                            </div>

                            <div class="mt-6 space-y-4">
                                @foreach ($cartItems as $item)
                                    @php
                                        $product = $item['product'];
                                        $unitPrice = $product['price'] > 0 ? number_format($product['price'], 0, '.', '.') . 'đ' : $product['price_formatted'];
                                        $lineTotal = $product['price'] > 0 ? number_format($item['total'], 0, '.', '.') . 'đ' : $product['price_formatted'];
                                    @endphp
                                    <div class="rounded-3xl border border-gray-200 bg-white p-4 shadow-sm transition hover:border-emerald-200">
                                        <div class="grid gap-4 text-sm sm:grid-cols-[minmax(0,1fr)_140px] sm:items-center">
                                            <div class="min-w-0">
                                                <div class="flex items-center gap-4">
                                                    <div class="flex-shrink-0 rounded-md border border-gray-100 bg-gray-50" style="width:80px;height:80px;max-width:80px;max-height:80px;overflow:hidden;display:block;">
                                                        <img
                                                            src="{{ $product['image'] ?? asset('images/products/default-product.svg') }}"
                                                            alt="{{ $product['name'] }}"
                                                            style="width:80px;height:80px;object-fit:cover;display:block;max-width:none;"
                                                            loading="lazy"
                                                        />
                                                    </div>

                                                    <div class="min-w-0">
                                                        <div class="flex items-center justify-between gap-4">
                                                            <div class="min-w-0">
                                                                <h3 class="truncate text-base font-semibold text-gray-900">{{ $product['name'] }}</h3>
                                                                <p class="mt-1 text-sm text-gray-500 line-clamp-2">{{ $product['short_desc'] }}</p>
                                                            </div>
                                                            <span class="inline-flex items-center gap-2 rounded-full bg-emerald-50 px-3 py-1 text-xs font-semibold text-emerald-700">
                                                                <i class="fas fa-check-circle"></i> Còn hàng
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="mt-3 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                                                    <div>
                                                        <p class="text-sm text-gray-500">Đơn giá</p>
                                                        <p class="text-base font-semibold text-gray-900">{{ $unitPrice }}</p>
                                                    </div>

                                                    <div class="flex items-center gap-3">
                                                        <form action="{{ route('cart.update', $item['id']) }}" method="POST" class="flex w-full min-w-[240px] max-w-[300px] items-center justify-between gap-2 rounded-2xl border border-gray-200 bg-gray-50 px-3 py-2 text-sm shadow-sm sm:w-auto sm:min-w-[260px]">
                                                            @csrf
                                                            @method('PUT')
                                                            <button type="button" class="flex h-9 w-9 items-center justify-center rounded-full text-gray-600 transition hover:bg-gray-100" onclick="decreaseQuantity(this)">
                                                                <i class="fas fa-minus text-xs"></i>
                                                            </button>
                                                            <input
                                                                type="number"
                                                                name="quantity"
                                                                value="{{ $item['quantity'] }}"
                                                                min="1"
                                                                class="w-14 border-0 bg-transparent text-center font-semibold focus:outline-none focus:ring-0"
                                                            >
                                                            <button type="button" class="flex h-9 w-9 items-center justify-center rounded-full text-gray-600 transition hover:bg-gray-100" onclick="increaseQuantity(this)">
                                                                <i class="fas fa-plus text-xs"></i>
                                                            </button>
                                                            <button type="submit" class="ml-1 shrink-0 rounded-full bg-emerald-600 px-4 py-2 text-xs font-semibold text-white transition hover:bg-emerald-700">
                                                                Cập nhật
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="flex flex-col items-end justify-between gap-2 text-right">
                                                <div>
                                                    <p class="text-sm text-gray-500">Thành tiền</p>
                                                    <p class="text-lg font-bold text-gray-900">{{ $lineTotal }}</p>
                                                </div>
                                                <form action="{{ route('cart.remove', $item['id']) }}" method="POST" class="inline-flex">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="rounded-full border border-red-100 bg-red-50 px-4 py-2 text-sm font-semibold text-red-600 hover:bg-red-100">
                                                        <i class="fas fa-trash mr-1"></i> Xóa
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="grid gap-6 lg:grid-cols-[1.1fr_0.9fr]">
                            <div class="rounded-[1.5rem] border border-gray-200 bg-white p-5 shadow-sm">
                                <h3 class="text-lg font-semibold text-gray-900">Thông tin đặt hàng</h3>
                                <div class="mt-5 space-y-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Họ và tên</label>
                                        <input type="text" value="{{ Auth::check() ? Auth::user()->name : '' }}" class="mt-2 w-full rounded-2xl border border-gray-200 bg-gray-50 px-3 py-2 text-sm focus:border-emerald-500 focus:outline-none focus:ring-2 focus:ring-emerald-100" placeholder="Nguyễn Văn A" />
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Số điện thoại</label>
                                        <input type="text" value="" class="mt-2 w-full rounded-2xl border border-gray-200 bg-gray-50 px-3 py-2 text-sm focus:border-emerald-500 focus:outline-none focus:ring-2 focus:ring-emerald-100" placeholder="0908 544 200" />
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Địa chỉ</label>
                                        <input type="text" value="" class="mt-2 w-full rounded-2xl border border-gray-200 bg-gray-50 px-3 py-2 text-sm focus:border-emerald-500 focus:outline-none focus:ring-2 focus:ring-emerald-100" placeholder="Số nhà, tên đường, quận/huyện" />
                                    </div>
                                </div>
                            </div>

                            <div class="rounded-[1.5rem] border border-gray-200 bg-white p-5 shadow-sm">
                                <h3 class="text-lg font-semibold text-gray-900">Phương thức thanh toán</h3>
                                <div class="mt-5 space-y-4">
                                    <label class="flex cursor-pointer items-center gap-3 rounded-2xl border border-gray-200 bg-gray-50 px-3 py-2 text-sm transition hover:border-emerald-300">
                                        <input type="radio" name="payment_method" class="h-4 w-4 text-emerald-600 focus:ring-emerald-500" checked />
                                        <span>Chuyển khoản</span>
                                    </label>
                                    <label class="flex cursor-pointer items-center gap-3 rounded-2xl border border-gray-200 bg-gray-50 px-3 py-2 text-sm transition hover:border-emerald-300">
                                        <input type="radio" name="payment_method" class="h-4 w-4 text-emerald-600 focus:ring-emerald-500" />
                                        <span>Thanh toán khi nhận hàng</span>
                                    </label>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Ghi chú đơn hàng</label>
                                        <textarea rows="3" class="mt-2 w-full rounded-2xl border border-gray-200 bg-gray-50 px-3 py-2 text-sm focus:border-emerald-500 focus:outline-none focus:ring-2 focus:ring-emerald-100" placeholder="Ví dụ: giao giờ hành chính"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-6">
                        <div class="sticky top-24 rounded-[1.5rem] border border-gray-200 bg-white p-6 shadow-sm">
                            <h3 class="text-lg font-semibold text-gray-900">Đơn hàng</h3>
                            <div class="mt-5 space-y-3 text-sm text-gray-600">
                                <div class="flex items-center justify-between">
                                    <span>Tạm tính</span>
                                    <span>{{ number_format($subtotal, 0, '.', '.') }}đ</span>
                                </div>
                                <div class="flex items-center justify-between">
                                    <span>Phí vận chuyển</span>
                                    <span>0đ</span>
                                </div>
                                <div class="flex items-center justify-between">
                                    <span>Giảm giá</span>
                                    <span class="text-emerald-600">-0đ</span>
                                </div>
                            </div>
                            <div class="mt-5 flex items-center justify-between border-t border-gray-200 pt-4">
                                <span class="text-base font-semibold text-gray-900">Tổng tiền</span>
                                <span class="text-2xl font-bold text-emerald-600">{{ number_format($subtotal, 0, '.', '.') }}đ</span>
                            </div>
                            <button class="mt-5 w-full rounded-3xl bg-emerald-600 px-5 py-3 text-sm font-semibold text-white transition hover:bg-emerald-700">
                                Đặt hàng
                            </button>
                            <p class="mt-4 text-xs text-gray-500">Giao hàng miễn phí cho đơn hàng trên 10 triệu.</p>
                        </div>
                        <div class="rounded-[1.5rem] border border-gray-200 bg-emerald-50 p-5 shadow-sm">
                            <h4 class="text-base font-semibold text-emerald-900">Thông tin nhanh</h4>
                            <ul class="mt-4 space-y-3 text-sm text-gray-600">
                                <li class="flex items-start gap-3">
                                    <span class="mt-1 inline-flex h-6 w-6 items-center justify-center rounded-full bg-white text-emerald-600">
                                        <i class="fas fa-truck"></i>
                                    </span>
                                    Giao hàng nhanh trong 2-3 ngày làm việc.
                                </li>
                                <li class="flex items-start gap-3">
                                    <span class="mt-1 inline-flex h-6 w-6 items-center justify-center rounded-full bg-white text-emerald-600">
                                        <i class="fas fa-shield-alt"></i>
                                    </span>
                                    Bảo hành 30 ngày từ GreenTech.
                                </li>
                                <li class="flex items-start gap-3">
                                    <span class="mt-1 inline-flex h-6 w-6 items-center justify-center rounded-full bg-white text-emerald-600">
                                        <i class="fas fa-headset"></i>
                                    </span>
                                    Hỗ trợ tư vấn 24/7 khi cần.
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            @else
                <!-- Empty Cart -->
                <div class="rounded-lg border border-gray-200 bg-white shadow-sm px-12 py-20">
                    <div class="flex flex-col items-center justify-center gap-6">
                        <div class="flex h-24 w-24 items-center justify-center rounded-full bg-gray-100">
                            <i class="fas fa-shopping-cart text-4xl text-gray-400"></i>
                        </div>
                        <div class="text-center">
                            <h2 class="text-2xl font-bold text-gray-900">Giỏ hàng trống</h2>
                            <p class="mt-2 text-gray-600">Bạn chưa thêm sản phẩm nào vào giỏ hàng</p>
                        </div>
                        <a href="{{ route('products') }}" class="rounded-lg bg-emerald-600 px-8 py-3 text-center font-semibold text-white transition hover:bg-emerald-700 inline-flex items-center gap-3">
                            <i class="fas fa-shopping-bag"></i><span>Bắt đầu mua sắm</span>
                        </a>
                    </div>
                </div>
            @endif
        </div>
    </section>

    <script>
        function increaseQuantity(btn) {
            const input = btn.parentElement.querySelector('input[name="quantity"]');
            input.value = parseInt(input.value) + 1;
        }

        function decreaseQuantity(btn) {
            const input = btn.parentElement.querySelector('input[name="quantity"]');
            if (parseInt(input.value) > 1) {
                input.value = parseInt(input.value) - 1;
            }
        }
    </script>
@endsection
