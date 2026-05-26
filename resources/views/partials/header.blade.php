@php
    $navItems = [
        ['label' => 'Trang chủ', 'url' => route('home'), 'active' => request()->routeIs('home')],
        ['label' => 'Giới thiệu', 'url' => '#gioi-thieu', 'active' => false],
        ['label' => 'Sản phẩm', 'url' => route('products'), 'active' => request()->routeIs('products', 'product.detail')],
        ['label' => 'Tin tức', 'url' => '#tin-tuc', 'active' => false],
        ['label' => 'Liên hệ', 'url' => '#lien-he', 'active' => false],
    ];
@endphp

<header class="sticky top-0 z-50 border-b border-emerald-100/80 bg-white/95 backdrop-blur-md shadow-sm transition-shadow duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex h-[72px] items-center justify-between gap-4">

            {{-- Logo --}}
            <a href="{{ route('home') }}" class="group flex shrink-0 items-center gap-3">
                <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-gradient-to-br from-emerald-500 to-teal-600 text-sm font-extrabold text-white shadow-md shadow-emerald-500/25 transition group-hover:shadow-lg group-hover:shadow-emerald-500/30">
                    GT
                </div>
                <div class="leading-tight">
                    <span class="block text-lg font-extrabold tracking-tight text-emerald-800 sm:text-xl">
                        GREEN<span class="text-emerald-500">TECH</span>
                    </span>
                    <span class="hidden text-[11px] font-medium uppercase tracking-wider text-gray-500 sm:block">
                        Công nghệ toàn cầu xanh
                    </span>
                </div>
            </a>

            {{-- Desktop navigation --}}
            <nav class="hidden items-center gap-1 lg:flex" aria-label="Menu chính">
                @foreach ($navItems as $item)
                    <a
                        href="{{ $item['url'] }}"
                        @class([
                            'rounded-lg px-4 py-2 text-sm font-semibold transition',
                            'bg-emerald-50 text-emerald-700' => $item['active'],
                            'text-gray-600 hover:bg-gray-50 hover:text-emerald-600' => ! $item['active'],
                        ])
                    >
                        {{ $item['label'] }}
                    </a>
                @endforeach
            </nav>

{{-- Hotline + Cart + Login (desktop) --}}
                <div class="hidden items-center gap-3 md:flex">
                    <a
                        href="tel:0908544200"
                        class="flex items-center gap-2 rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-2.5 text-sm font-bold text-emerald-800 transition hover:border-emerald-300 hover:bg-emerald-100"
                    >
                        <span class="flex h-8 w-8 items-center justify-center rounded-lg bg-emerald-600 text-white">
                            <i class="fas fa-phone text-xs" aria-hidden="true"></i>
                        </span>
                        <span class="hidden lg:inline">Hotline</span>
                        <span>0908 544 200</span>
                    </a>

                    {{-- Cart Icon --}}
                    <a
                        href="{{ route('cart.index') }}"
                        class="relative flex items-center justify-center h-10 w-10 rounded-lg border border-gray-200 text-gray-600 transition hover:border-emerald-300 hover:bg-emerald-50 hover:text-emerald-600"
                        title="Giỏ hàng"
                    >
                        <i class="fas fa-shopping-cart text-lg"></i>
                        <span class="absolute -top-1 -right-1 flex h-5 w-5 items-center justify-center rounded-full bg-red-500 text-xs font-bold text-white">0</span>
                    </a>

                @guest
                    <a
                        href="{{ route('login') }}"
                        class="rounded-xl bg-emerald-600 px-5 py-2.5 text-sm font-semibold text-white shadow-sm shadow-emerald-600/20 transition hover:bg-emerald-700 hover:shadow-md"
                    >
                        Đăng nhập
                    </a>
                @endguest

                @auth
                    <div class="relative group">
                        <a href="{{ route('profile.dashboard') }}" class="flex items-center gap-3 rounded-full transition focus:outline-none hover:opacity-80">
                            <div class="h-10 w-10 flex items-center justify-center rounded-full bg-emerald-600 text-white font-semibold shadow-sm cursor-pointer">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</div>
                        </a>

                        <div class="pointer-events-none absolute right-0 mt-2 hidden w-max translate-y-2 rounded-md bg-white px-3 py-2 text-sm text-gray-700 shadow-md group-hover:block group-focus:block">
                            <div class="font-semibold">{{ Auth::user()->name }}</div>
                            <div class="text-xs text-surface-muted">{{ Auth::user()->email }}</div>
                        </div>

                        <div class="absolute right-0 mt-14 hidden w-44 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 group-hover:block">
                            <div class="py-1 divide-y divide-gray-100">
                                <a href="{{ route('profile.dashboard') }}" class="block px-4 py-2 text-left text-sm text-gray-700 hover:bg-gray-50 font-medium">
                                    <i class="fas fa-user-circle mr-2"></i>Trang cá nhân
                                </a>
                                <a href="{{ route('profile.settings') }}" class="block px-4 py-2 text-left text-sm text-gray-700 hover:bg-gray-50 font-medium">
                                    <i class="fas fa-cog mr-2"></i>Cài đặt
                                </a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="block w-full px-4 py-2 text-left text-sm text-red-600 hover:bg-red-50 font-medium">
                                        <i class="fas fa-sign-out-alt mr-2"></i>Đăng xuất
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endauth
            </div>

            {{-- Mobile menu toggle --}}
            <button
                type="button"
                id="mobile-menu-toggle"
                class="inline-flex h-10 w-10 items-center justify-center rounded-lg border border-gray-200 text-gray-600 transition hover:border-emerald-200 hover:bg-emerald-50 hover:text-emerald-700 lg:hidden"
                aria-expanded="false"
                aria-controls="mobile-menu"
                aria-label="Mở menu"
            >
                <i class="fas fa-bars text-lg" id="mobile-menu-icon-open" aria-hidden="true"></i>
                <i class="fas fa-times hidden text-lg" id="mobile-menu-icon-close" aria-hidden="true"></i>
            </button>
        </div>
    </div>

    {{-- Mobile navigation panel --}}
    <div id="mobile-menu" class="hidden border-t border-emerald-100 bg-white lg:hidden">
        <nav class="max-w-7xl mx-auto space-y-1 px-4 py-4 sm:px-6" aria-label="Menu di động">
            @foreach ($navItems as $item)
                <a
                    href="{{ $item['url'] }}"
                    @class([
                        'block rounded-lg px-4 py-3 text-sm font-semibold transition',
                        'bg-emerald-50 text-emerald-700' => $item['active'],
                        'text-gray-600 hover:bg-gray-50 hover:text-emerald-600' => ! $item['active'],
                    ])
                >
                    {{ $item['label'] }}
                </a>
            @endforeach
        </nav>
            <div class="border-t border-gray-100 px-4 py-4 sm:px-6 space-y-3">
                <a
                    href="tel:0908544200"
                    class="flex w-full items-center justify-center gap-2 rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm font-bold text-emerald-800"
                >
                    <i class="fas fa-phone" aria-hidden="true"></i>
                    Hotline: 0908 544 200
                </a>

                <a
                    href="{{ route('cart.index') }}"
                    class="flex w-full items-center justify-center gap-2 rounded-xl border border-gray-200 bg-gray-50 px-4 py-3 text-sm font-bold text-gray-600 hover:border-emerald-200 hover:bg-emerald-50 hover:text-emerald-600"
                >
                    <i class="fas fa-shopping-cart"></i>
                    Giỏ hàng
                </a>

                @guest
                    <a
                        href="{{ route('login') }}"
                        class="flex w-full items-center justify-center rounded-xl bg-emerald-600 px-4 py-3 text-sm font-semibold text-white hover:bg-emerald-700"
                    >
                        Đăng nhập
                    </a>
                @endguest

                @auth
                    <div class="flex w-full items-center justify-between gap-2">
                        <div class="flex items-center gap-3">
                            <div class="h-10 w-10 flex items-center justify-center rounded-full bg-emerald-600 text-white font-semibold">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</div>
                            <div>
                                <div class="font-semibold">{{ Auth::user()->name }}</div>
                                <div class="text-xs text-surface-muted">{{ Auth::user()->email }}</div>
                            </div>
                        </div>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="rounded-xl bg-white px-4 py-2 text-sm font-semibold text-emerald-600 border border-emerald-200">Đăng xuất</button>
                        </form>
                    </div>
                @endauth
            </div>
    </div>
</header>
