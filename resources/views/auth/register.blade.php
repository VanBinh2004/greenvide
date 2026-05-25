@extends('layouts.app')

@section('title', 'Đăng ký - GreenTech')

@section('content')
    <section class="section-padding">
        <div class="container-site">
            <div class="mx-auto grid max-w-5xl gap-10 lg:grid-cols-[1.4fr_1fr]">
                <div class="rounded-[2rem] border border-surface-200 bg-white p-8 shadow-card">
                    <div class="flex items-center gap-4">
                        <div class="flex h-14 w-14 items-center justify-center rounded-3xl bg-brand-100 text-brand-700">
                            <i class="fas fa-user-plus text-2xl" aria-hidden="true"></i>
                        </div>
                        <div>
                            <p class="eyebrow">Tạo tài khoản</p>
                            <h1 class="heading-2 mt-2">Đăng ký GreenTech</h1>
                        </div>
                    </div>

                    <p class="text-lead mt-6 max-w-2xl text-surface-muted">
                        Tạo tài khoản để truy cập quản lý đơn hàng, hỗ trợ khách hàng và nhận thông báo ưu đãi nhanh chóng.
                    </p>

                    @if ($errors->any())
                        <div class="mt-6 rounded-3xl border border-red-200 bg-red-50 p-4 text-sm text-red-800">
                            <p class="font-medium">Có lỗi xảy ra</p>
                            <p class="mt-2">{{ $errors->first() }}</p>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('register.submit') }}" class="mt-8 space-y-6" novalidate>
                        @csrf

                        <div>
                            <label for="name" class="mb-2 block text-sm font-semibold text-surface-dark">Họ và tên</label>
                            <input
                                id="name"
                                name="name"
                                type="text"
                                value="{{ old('name') }}"
                                required
                                autofocus
                                class="w-full rounded-3xl border border-surface-200 bg-surface-50 px-4 py-3 text-surface-dark placeholder:text-surface-muted focus:border-brand-500 focus:outline-none focus:ring-2 focus:ring-brand-100"
                                placeholder="Nguyễn Văn A"
                            />
                        </div>

                        <div>
                            <label for="email" class="mb-2 block text-sm font-semibold text-surface-dark">Email</label>
                            <input
                                id="email"
                                name="email"
                                type="email"
                                value="{{ old('email') }}"
                                required
                                autocomplete="username"
                                class="w-full rounded-3xl border border-surface-200 bg-surface-50 px-4 py-3 text-surface-dark placeholder:text-surface-muted focus:border-brand-500 focus:outline-none focus:ring-2 focus:ring-brand-100"
                                placeholder="email@domain.com"
                            />
                        </div>

                        <div>
                            <label for="password" class="mb-2 block text-sm font-semibold text-surface-dark">Mật khẩu</label>
                            <input
                                id="password"
                                name="password"
                                type="password"
                                required
                                autocomplete="new-password"
                                class="w-full rounded-3xl border border-surface-200 bg-surface-50 px-4 py-3 text-surface-dark placeholder:text-surface-muted focus:border-brand-500 focus:outline-none focus:ring-2 focus:ring-brand-100"
                                placeholder="Tối thiểu 8 ký tự"
                            />
                        </div>

                        <div>
                            <label for="password_confirmation" class="mb-2 block text-sm font-semibold text-surface-dark">Xác nhận mật khẩu</label>
                            <input
                                id="password_confirmation"
                                name="password_confirmation"
                                type="password"
                                required
                                autocomplete="new-password"
                                class="w-full rounded-3xl border border-surface-200 bg-surface-50 px-4 py-3 text-surface-dark placeholder:text-surface-muted focus:border-brand-500 focus:outline-none focus:ring-2 focus:ring-brand-100"
                                placeholder="Nhập lại mật khẩu"
                            />
                        </div>

                        <button type="submit" class="inline-flex w-full items-center justify-center rounded-full bg-brand-600 px-5 py-3.5 text-base font-semibold text-white shadow-button transition hover:bg-brand-700 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:ring-offset-2">
                            Đăng ký
                        </button>

                        <div class="mt-4 flex flex-col gap-3 sm:flex-row">
                            <a href="{{ route('login') }}" class="inline-flex w-full items-center justify-center rounded-full border border-brand-600 bg-white px-5 py-3.5 text-base font-semibold text-brand-600 transition hover:bg-brand-50 sm:flex-1">
                                Quay lại đăng nhập
                            </a>
                            <a href="mailto:support@greenvide.local" class="inline-flex w-full items-center justify-center rounded-full bg-surface-100 px-5 py-3.5 text-base font-semibold text-surface-dark transition hover:bg-surface-200 sm:flex-1">
                                Hỗ trợ nếu cần
                            </a>
                        </div>
                    </form>
                </div>

                <aside class="rounded-[2rem] bg-brand-50 p-8 shadow-card">
                    <div class="space-y-6 text-surface-dark">
                        <div>
                            <p class="eyebrow">Lợi ích khi đăng ký</p>
                            <h2 class="heading-3 mt-2">Tiện ích dành riêng cho bạn</h2>
                        </div>

                        <div class="space-y-4">
                            <div class="rounded-3xl border border-brand-100 bg-white p-4 shadow-sm">
                                <p class="font-semibold">Truy cập nhanh</p>
                                <p class="text-sm text-surface-muted mt-1">Quản lý thông tin và đơn hàng dễ dàng mọi lúc.</p>
                            </div>
                            <div class="rounded-3xl border border-brand-100 bg-white p-4 shadow-sm">
                                <p class="font-semibold">Theo dõi ưu đãi</p>
                                <p class="text-sm text-surface-muted mt-1">Nhận thông tin khuyến mãi và cập nhật sản phẩm mới.</p>
                            </div>
                            <div class="rounded-3xl border border-brand-100 bg-white p-4 shadow-sm">
                                <p class="font-semibold">Hỗ trợ khách hàng</p>
                                <p class="text-sm text-surface-muted mt-1">Dễ dàng liên hệ và nhận trợ giúp nhanh chóng.</p>
                            </div>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </section>
@endsection
