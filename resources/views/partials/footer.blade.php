<footer class="bg-gradient-to-b from-emerald-950 to-[#022c22] text-emerald-50" id="lien-he">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Main footer grid --}}
        <div class="grid gap-10 py-14 sm:grid-cols-2 lg:grid-cols-4 lg:gap-8 lg:py-16">

            {{-- Company info --}}
            <div class="sm:col-span-2 lg:col-span-1">
                <a href="{{ route('home') }}" class="inline-flex items-center gap-3">
                    <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-emerald-500 text-sm font-extrabold text-white">
                        GT
                    </div>
                    <span class="text-xl font-extrabold text-white">
                        GREEN<span class="text-emerald-400">TECH</span>
                    </span>
                </a>
                <p class="mt-4 max-w-sm text-sm leading-relaxed text-emerald-100/80">
                    Công ty chuyên cung cấp giống cây công nghiệp chất lượng cao: Đàn Hương, Trầm Hương, Măng Lục Trúc và các giải pháp nông nghiệp bền vững.
                </p>
                <div class="mt-5 flex gap-3">
                    <a href="#" class="flex h-9 w-9 items-center justify-center rounded-lg bg-emerald-800/60 text-emerald-100 transition hover:bg-emerald-600 hover:text-white" aria-label="Facebook">
                        <i class="fab fa-facebook-f text-sm" aria-hidden="true"></i>
                    </a>
                    <a href="#" class="flex h-9 w-9 items-center justify-center rounded-lg bg-emerald-800/60 text-emerald-100 transition hover:bg-emerald-600 hover:text-white" aria-label="YouTube">
                        <i class="fab fa-youtube text-sm" aria-hidden="true"></i>
                    </a>
                    <a href="#" class="flex h-9 w-9 items-center justify-center rounded-lg bg-emerald-800/60 text-emerald-100 transition hover:bg-emerald-600 hover:text-white" aria-label="Zalo">
                        <i class="fas fa-comment-dots text-sm" aria-hidden="true"></i>
                    </a>
                </div>
            </div>

            {{-- Quick links --}}
            <div>
                <h3 class="text-sm font-bold uppercase tracking-wider text-white">Liên kết</h3>
                <ul class="mt-4 space-y-2.5">
                    <li><a href="{{ route('home') }}" class="text-sm text-emerald-100/80 transition hover:text-white">Trang chủ</a></li>
                    <li><a href="#gioi-thieu" class="text-sm text-emerald-100/80 transition hover:text-white">Giới thiệu</a></li>
                    <li><a href="#san-pham" class="text-sm text-emerald-100/80 transition hover:text-white">Sản phẩm</a></li>
                    <li><a href="#tin-tuc" class="text-sm text-emerald-100/80 transition hover:text-white">Tin tức</a></li>
                    <li><a href="#lien-he" class="text-sm text-emerald-100/80 transition hover:text-white">Liên hệ</a></li>
                </ul>
            </div>

            {{-- Products --}}
            <div>
                <h3 class="text-sm font-bold uppercase tracking-wider text-white">Sản phẩm</h3>
                <ul class="mt-4 space-y-2.5">
                    <li><a href="{{ route('products', ['category' => 'dan-huong']) }}" class="text-sm text-emerald-100/80 transition hover:text-white">Giống Đàn Hương</a></li>
                    <li><a href="{{ route('products', ['category' => 'tram-huong']) }}" class="text-sm text-emerald-100/80 transition hover:text-white">Giống Trầm Hương</a></li>
                    <li><a href="{{ route('products', ['category' => 'mang-luc-truc']) }}" class="text-sm text-emerald-100/80 transition hover:text-white">Măng Lục Trúc</a></li>
                    <li><a href="{{ route('products') }}" class="text-sm text-emerald-100/80 transition hover:text-white">Tất cả sản phẩm</a></li>
                </ul>
            </div>

            {{-- Contact --}}
            <div>
                <h3 class="text-sm font-bold uppercase tracking-wider text-white">Liên hệ</h3>
                <ul class="mt-4 space-y-3">
                    <li class="flex gap-3 text-sm text-emerald-100/80">
                        <i class="fas fa-location-dot mt-0.5 shrink-0 text-emerald-400" aria-hidden="true"></i>
                        <span>Việt Nam</span>
                    </li>
                    <li>
                        <a href="tel:0908544200" class="flex gap-3 text-sm font-semibold text-white transition hover:text-emerald-300">
                            <i class="fas fa-phone mt-0.5 shrink-0 text-emerald-400" aria-hidden="true"></i>
                            <span>0908 544 200</span>
                        </a>
                    </li>
                    <li>
                        <a href="mailto:info@greentech.vn" class="flex gap-3 text-sm text-emerald-100/80 transition hover:text-white">
                            <i class="fas fa-envelope mt-0.5 shrink-0 text-emerald-400" aria-hidden="true"></i>
                            <span>info@greentech.vn</span>
                        </a>
                    </li>
                    <li class="flex gap-3 text-sm text-emerald-100/80">
                        <i class="fas fa-clock mt-0.5 shrink-0 text-emerald-400" aria-hidden="true"></i>
                        <span>Thứ 2 – Thứ 7: 7:00 – 17:30</span>
                    </li>
                </ul>
            </div>
        </div>

        {{-- Bottom bar --}}
        <div class="border-t border-emerald-800/60 py-6">
            <div class="flex flex-col items-center justify-between gap-3 text-center text-xs text-emerald-200/70 sm:flex-row sm:text-left">
                <p>&copy; {{ date('Y') }} <span class="font-semibold text-emerald-100">GreenTech</span> — Công Nghệ Toàn Cầu Xanh. Bảo lưu mọi quyền.</p>
                <div class="flex gap-4">
                    <a href="#" class="transition hover:text-white">Chính sách bảo mật</a>
                    <a href="#" class="transition hover:text-white">Điều khoản sử dụng</a>
                </div>
            </div>
        </div>
    </div>
</footer>
