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

            {{-- Hotline + Login (desktop) --}}
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
                <a
                    href="{{ route('login') }}"
                    class="rounded-xl bg-emerald-600 px-5 py-2.5 text-sm font-semibold text-white shadow-sm shadow-emerald-600/20 transition hover:bg-emerald-700 hover:shadow-md"
                >
                    Đăng nhập
                </a>
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
                href="{{ route('login') }}"
                class="flex w-full items-center justify-center rounded-xl bg-emerald-600 px-4 py-3 text-sm font-semibold text-white hover:bg-emerald-700"
            >
                Đăng nhập
            </a>
        </div>
    </div>
</header>
