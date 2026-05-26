@php
    $navItems = [
        ['label' => 'Trang chủ', 'url' => route('home'), 'active' => request()->routeIs('home')],
        ['label' => 'Giới thiệu', 'url' => route('home').'#gioi-thieu', 'active' => false],
        ['label' => 'Sản phẩm', 'url' => route('products'), 'active' => request()->routeIs('products', 'product.detail')],
        ['label' => 'Tin tức', 'url' => route('news.index'), 'active' => request()->routeIs('news.index', 'news.show')],
        ['label' => 'Liên hệ', 'url' => route('home').'#lien-he', 'active' => false],
    ];
    $cartCount = collect(session('cart', []))->sum(fn ($item) => (int) ($item['quantity'] ?? 1));
@endphp

<header class="site-header w-full border-b border-[#e2e8f0] bg-white/95 backdrop-blur-md">
    <div class="container-site">
        <div class="flex h-[72px] w-full items-center justify-between gap-3 lg:gap-6">

            <a href="{{ route('home') }}" class="group flex shrink-0 items-center gap-3">
                <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-[#10b981] text-sm font-bold text-white transition group-hover:bg-[#059669] sm:h-11 sm:w-11">
                    GT
                </div>
                <div class="leading-tight">
                    <span class="block text-base font-bold tracking-tight text-[#1f2937] sm:text-lg">
                        GREEN<span class="text-[#10b981]">TECH</span>
                    </span>
                    <span class="hidden text-[10px] font-medium uppercase tracking-wider text-[#64748b] sm:block">
                        Công nghệ toàn cầu xanh
                    </span>
                </div>
            </a>

            <nav class="hidden flex-1 items-center justify-center gap-1 lg:flex" aria-label="Menu chính">
                @foreach ($navItems as $item)
                    <a
                        href="{{ $item['url'] }}"
                        @class([
                            'rounded-md px-3 py-2 text-sm font-medium transition',
                            'bg-[#ecfdf5] text-[#059669]' => $item['active'],
                            'text-[#64748b] hover:bg-[#f8fafc] hover:text-[#059669]' => ! $item['active'],
                        ])
                    >
                        {{ $item['label'] }}
                    </a>
                @endforeach
            </nav>

            <div class="hidden shrink-0 items-center gap-2 md:flex lg:gap-3">
                <a
                    href="tel:0908544200"
                    class="hidden items-center gap-2 rounded-lg border border-[#d1fae5] bg-[#ecfdf5] px-3 py-2 text-sm font-semibold text-[#047857] transition hover:border-[#a7f3d0] lg:flex"
                >
                    <i class="fas fa-phone text-xs" aria-hidden="true"></i>
                    <span class="hidden xl:inline">0908 544 200</span>
                </a>

                <a
                    href="{{ route('cart.index') }}"
                    class="relative flex h-10 w-10 items-center justify-center rounded-lg border border-[#e2e8f0] text-[#64748b] transition hover:border-[#a7f3d0] hover:bg-[#ecfdf5] hover:text-[#059669]"
                    title="Giỏ hàng"
                >
                    <i class="fas fa-shopping-cart" aria-hidden="true"></i>
                    @if ($cartCount > 0)
                        <span class="absolute -right-1 -top-1 flex h-5 min-w-5 items-center justify-center rounded-full bg-[#10b981] px-1 text-[10px] font-bold text-white">
                            {{ $cartCount > 9 ? '9+' : $cartCount }}
                        </span>
                    @endif
                </a>

                @guest
                    <a href="{{ route('login') }}" class="btn btn-primary btn-sm !px-4">Đăng nhập</a>
                @endguest

                @auth
                    <div class="relative group">
                        <button type="button" class="flex h-10 w-10 items-center justify-center rounded-full bg-[#059669] text-sm font-semibold text-white" aria-label="Tài khoản">
                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                        </button>
                        <div class="invisible absolute right-0 z-50 mt-2 w-48 origin-top-right rounded-lg border border-[#e2e8f0] bg-white py-1 opacity-0 shadow-lg transition group-hover:visible group-hover:opacity-100 group-focus-within:visible group-focus-within:opacity-100">
                            <div class="border-b border-[#f1f5f9] px-4 py-2">
                                <p class="text-sm font-semibold text-[#1f2937]">{{ Auth::user()->name }}</p>
                                <p class="truncate text-xs text-[#64748b]">{{ Auth::user()->email }}</p>
                            </div>
                            <a href="{{ route('profile.dashboard') }}" class="block px-4 py-2 text-sm text-[#1f2937] hover:bg-[#f8fafc]">Trang cá nhân</a>
                            <a href="{{ route('profile.settings') }}" class="block px-4 py-2 text-sm text-[#1f2937] hover:bg-[#f8fafc]">Cài đặt</a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="block w-full px-4 py-2 text-left text-sm text-red-600 hover:bg-red-50">Đăng xuất</button>
                            </form>
                        </div>
                    </div>
                @endauth
            </div>

            <button
                type="button"
                id="mobile-menu-toggle"
                class="inline-flex h-10 w-10 shrink-0 items-center justify-center rounded-lg border border-[#e2e8f0] text-[#64748b] transition hover:bg-[#f8fafc] lg:hidden"
                aria-expanded="false"
                aria-controls="mobile-menu"
                aria-label="Mở menu"
            >
                <i class="fas fa-bars text-lg" id="mobile-menu-icon-open" aria-hidden="true"></i>
                <i class="fas fa-times hidden text-lg" id="mobile-menu-icon-close" aria-hidden="true"></i>
            </button>
        </div>
    </div>

    <div id="mobile-menu" class="hidden w-full border-t border-[#e2e8f0] bg-white lg:hidden">
        <nav class="container-site space-y-1 py-4" aria-label="Menu di động">
            @foreach ($navItems as $item)
                <a
                    href="{{ $item['url'] }}"
                    @class([
                        'block rounded-lg px-4 py-3 text-sm font-medium',
                        'bg-[#ecfdf5] text-[#059669]' => $item['active'],
                        'text-[#64748b] hover:bg-[#f8fafc]' => ! $item['active'],
                    ])
                >
                    {{ $item['label'] }}
                </a>
            @endforeach
        </nav>
        <div class="container-site space-y-3 border-t border-[#f1f5f9] py-4">
            <a href="tel:0908544200" class="btn btn-secondary w-full justify-center">Hotline: 0908 544 200</a>
            <a href="{{ route('cart.index') }}" class="btn btn-secondary w-full justify-center">
                <i class="fas fa-shopping-cart" aria-hidden="true"></i> Giỏ hàng @if($cartCount)({{ $cartCount }})@endif
            </a>
            @guest
                <a href="{{ route('login') }}" class="btn btn-primary w-full justify-center">Đăng nhập</a>
            @endguest
        </div>
    </div>
</header>
