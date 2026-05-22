@extends('layouts.app')

@section('title', 'GreenTech - Giống Cây Công Nghiệp Cao Cấp')

@section('meta_description', 'GreenTech chuyên cung cấp giống cây Đàn Hương, Trầm Hương, Măng Lục Trúc và giải pháp nông nghiệp bền vững.')

@php
    $stats = [
        ['icon' => 'fa-award', 'value' => '20+', 'label' => 'Năm kinh nghiệm'],
        ['icon' => 'fa-users', 'value' => '500+', 'label' => 'Khách hàng'],
        ['icon' => 'fa-seedling', 'value' => '50+', 'label' => 'Loài cây giống'],
        ['icon' => 'fa-folder-tree', 'value' => '1000+', 'label' => 'Dự án triển khai'],
    ];

    $features = [
        ['icon' => 'fa-certificate', 'title' => 'Chất lượng giống', 'desc' => 'Nguồn gen rõ ràng, kiểm định nghiêm ngặt trước khi xuất vườn.'],
        ['icon' => 'fa-user-graduate', 'title' => 'Hỗ trợ kỹ thuật', 'desc' => 'Kỹ sư đồng hành từ khảo sát đất, trồng đến chăm sóc và thu hoạch.'],
        ['icon' => 'fa-truck-fast', 'title' => 'Giao hàng toàn quốc', 'desc' => 'Đóng gói chuyên dụng, vận chuyển an toàn, đúng tiến độ cam kết.'],
        ['icon' => 'fa-shield-halved', 'title' => 'Cam kết bảo hành', 'desc' => 'Chính sách đổi trả minh bạch, bảo vệ quyền lợi nhà đầu tư.'],
        ['icon' => 'fa-hand-holding-dollar', 'title' => 'Giá trị đầu tư', 'desc' => 'Giải pháp tối ưu chi phí — sinh lời bền vững theo thời gian.'],
    ];

    $processSteps = [
        ['step' => '01', 'icon' => 'fa-comments', 'title' => 'Tư vấn & Khảo sát', 'desc' => 'Phân tích đất đai, khí hậu và nhu cầu để đề xuất giống cây phù hợp.'],
        ['step' => '02', 'icon' => 'fa-file-signature', 'title' => 'Ký hợp đồng', 'desc' => 'Thống nhất quy mô, loại giống, tiến độ giao hàng và hỗ trợ kỹ thuật.'],
        ['step' => '03', 'icon' => 'fa-truck', 'title' => 'Giao giống', 'desc' => 'Cung ứng cây giống đạt chuẩn kèm hướng dẫn trồng chi tiết.'],
        ['step' => '04', 'icon' => 'fa-chart-line', 'title' => 'Đồng hành phát triển', 'desc' => 'Theo dõi sinh trưởng, tối ưu canh tác đến khi ổn định năng suất.'],
    ];

    $newsPosts = [
        ['title' => 'Kỹ thuật trồng Đàn Hương cho người mới bắt đầu', 'date' => '15/05/2026', 'category' => 'Kỹ thuật', 'excerpt' => 'Hướng dẫn chọn giống, chuẩn bị đất và chăm sóc 6 tháng đầu hiệu quả.', 'image' => 'https://images.unsplash.com/photo-1625246333195-78d9c38ad449?w=700&q=85'],
        ['title' => 'Trầm Hương — Cơ hội đầu tư sinh lời dài hạn', 'date' => '08/05/2026', 'category' => 'Đầu tư', 'excerpt' => 'Phân tích thị trường, chi phí và lộ trình khai thác tối ưu.', 'image' => 'https://images.unsplash.com/photo-1500382017468-9049fed747ef?w=700&q=85'],
        ['title' => 'Măng Lục Trúc và xu hướng nông nghiệp xanh 2026', 'date' => '01/05/2026', 'category' => 'Xu hướng', 'excerpt' => 'Vì sao Măng tre được các hộ trồng rừng tin chọn.', 'image' => 'https://images.unsplash.com/photo-1574323347407-f5b472f6c281?w=700&q=85'],
    ];
@endphp

@section('content')

    {{-- 2. Hero Section --}}
    <section class="relative flex min-h-[min(100vh,900px)] items-center overflow-hidden">
        <img
            src="https://images.unsplash.com/photo-1441974231531-c6227db76b6e?w=1920&q=90"
            alt="Rừng xanh thiên nhiên"
            class="absolute inset-0 h-full w-full object-cover"
            loading="eager"
        >
        <div class="absolute inset-0 bg-gradient-to-r from-brand-950/95 via-brand-900/85 to-brand-800/50"></div>
        <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'none\' fill-rule=\'evenodd\'%3E%3Cg fill=\'%23ffffff\' fill-opacity=\'0.03\'%3E%3Cpath d=\'M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')] opacity-60"></div>

        <div class="container-site relative z-10 py-28 lg:py-36">
            <div class="grid items-center gap-14 lg:grid-cols-12 lg:gap-10">
                <div class="lg:col-span-7">
                    <div class="inline-flex items-center gap-2 rounded-full border border-white/20 bg-white/10 px-5 py-2 text-sm font-semibold text-white backdrop-blur-md">
                        <span class="flex h-2 w-2 rounded-full bg-emerald-400 animate-pulse"></span>
                        Công nghệ toàn cầu xanh
                    </div>

                    <h1 class="mt-8 text-4xl font-extrabold leading-[1.08] tracking-tight text-white sm:text-5xl lg:text-[3.25rem]">
                        Giống Cây Công Nghiệp
                        <span class="mt-2 block text-emerald-300">Cao Cấp</span>
                    </h1>

                    <p class="mt-6 max-w-xl text-lg leading-relaxed text-emerald-50/90 lg:text-xl">
                        Đàn Hương · Trầm Hương · Măng Lục Trúc — Đồng hành cùng nhà đầu tư trên hành trình trồng rừng bền vững và sinh lời dài hạn.
                    </p>

                    <div class="mt-10 flex flex-col gap-4 sm:flex-row sm:flex-wrap">
                        <a href="{{ route('products') }}" class="btn btn-primary btn-lg justify-center shadow-xl shadow-brand-900/30 hover:scale-[1.02]">
                            <i class="fas fa-leaf" aria-hidden="true"></i>
                            Khám phá sản phẩm
                        </a>
                        <a href="tel:0908544200" class="btn btn-lg justify-center border-2 border-white/90 bg-white text-brand-700 shadow-lg hover:bg-brand-50 hover:scale-[1.02]">
                            <i class="fas fa-phone-volume" aria-hidden="true"></i>
                            Hotline: 0908 544 200
                        </a>
                    </div>
                </div>

                <div class="hidden lg:col-span-5 lg:block">
                    <div class="relative">
                        <div class="overflow-hidden rounded-3xl border border-white/15 shadow-2xl">
                            <img
                                src="https://images.unsplash.com/photo-1416879595882-3373a0480b5b?w=800&q=90"
                                alt="Vườn ươm GreenTech"
                                class="aspect-[5/4] w-full object-cover"
                            >
                        </div>
                        <div class="absolute -bottom-5 -left-5 flex items-center gap-4 rounded-2xl bg-white px-6 py-4 shadow-xl">
                            <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-brand-600 text-white">
                                <i class="fas fa-check text-lg" aria-hidden="true"></i>
                            </div>
                            <div>
                                <p class="text-2xl font-extrabold text-brand-700">100%</p>
                                <p class="text-sm font-medium text-gray-600">Cam kết chất lượng</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <a href="#thong-ke" class="absolute bottom-6 left-1/2 z-10 flex -translate-x-1/2 flex-col items-center gap-1 text-white/60 transition hover:text-white" aria-label="Cuộn xuống">
            <i class="fas fa-chevron-down animate-bounce" aria-hidden="true"></i>
        </a>
    </section>

    {{-- 3. Thống kê (nổi trên nền trắng) --}}
    <section id="thong-ke" class="relative z-20 -mt-16 pb-4 md:-mt-20">
        <div class="container-site">
            <div class="rounded-3xl border border-brand-100 bg-white p-8 shadow-xl shadow-brand-900/5 md:p-10">
                <div class="grid grid-cols-2 gap-8 md:grid-cols-4 md:gap-6">
                    @foreach ($stats as $stat)
                        <div class="group border-brand-100 text-center md:border-r md:last:border-r-0 md:px-4">
                            <div class="mx-auto mb-4 flex h-14 w-14 items-center justify-center rounded-2xl bg-gradient-to-br from-brand-500 to-accent-600 text-white shadow-md transition duration-300 group-hover:scale-110 group-hover:shadow-lg">
                                <i class="fas {{ $stat['icon'] }} text-lg" aria-hidden="true"></i>
                            </div>
                            <p class="text-3xl font-extrabold text-brand-700 lg:text-4xl">{{ $stat['value'] }}</p>
                            <p class="mt-1 text-sm font-semibold text-surface-muted">{{ $stat['label'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    {{-- 4. Giới thiệu công ty --}}
    <section id="gioi-thieu" class="section-padding section-bg-light pt-20 md:pt-24">
        <div class="container-site">
            <div class="grid items-center gap-12 lg:grid-cols-2 lg:gap-20">
                <div class="relative">
                    <div class="overflow-hidden rounded-3xl shadow-2xl ring-1 ring-brand-100">
                        <img
                            src="https://images.unsplash.com/photo-1464226184884-fa280b87d399?w=900&q=90"
                            alt="GreenTech — Nông nghiệp xanh"
                            class="aspect-[4/3] w-full object-cover transition duration-700 hover:scale-105"
                            loading="lazy"
                        >
                    </div>
                    <img
                        src="https://images.unsplash.com/photo-1500595046743-cd271d694d30?w=400&q=85"
                        alt="Vườn cây"
                        class="absolute -bottom-6 -left-4 hidden w-44 rounded-2xl border-4 border-white shadow-xl transition hover:scale-105 sm:block lg:w-52"
                        loading="lazy"
                    >
                    <div class="absolute -right-3 top-8 rounded-2xl bg-brand-600 px-8 py-6 text-center text-white shadow-2xl md:-right-6">
                        <p class="text-4xl font-extrabold leading-none">100%</p>
                        <p class="mt-2 text-sm font-bold uppercase tracking-wide text-brand-100">Cam kết chất lượng</p>
                        <p class="mt-1 text-xs text-brand-200">Kiểm định trước giao hàng</p>
                    </div>
                </div>

                <div>
                    <p class="eyebrow">Về chúng tôi</p>
                    <h2 class="heading-2 mt-4">GreenTech — Đối tác tin cậy trong lĩnh vực giống cây công nghiệp</h2>
                    <p class="text-lead mt-6">
                        Với hơn 20 năm kinh nghiệm, GreenTech tập trung nghiên cứu, nhân giống và phân phối các loại cây giá trị cao, góp phần phát triển kinh tế sinh thái bền vững tại Việt Nam.
                    </p>
                    <p class="mt-4 leading-relaxed text-gray-600">
                        Chúng tôi sở hữu hệ thống vườn ươm hiện đại, quy trình kiểm soát chất lượng chặt chẽ và đội ngũ kỹ sư giàu kinh nghiệm — sẵn sàng đồng hành từ tư vấn, cung cấp giống đến hỗ trợ kỹ thuật sau trồng.
                    </p>

                    <div class="mt-8 grid gap-4 sm:grid-cols-2">
                        @foreach ([
                            ['icon' => 'fa-microscope', 'text' => 'Nghiên cứu & nhân giống'],
                            ['icon' => 'fa-tree', 'text' => 'Vườn ươm quy mô lớn'],
                            ['icon' => 'fa-headset', 'text' => 'Tư vấn 24/7'],
                            ['icon' => 'fa-globe', 'text' => 'Phục vụ toàn quốc'],
                        ] as $item)
                            <div class="flex items-center gap-3 rounded-xl border border-brand-100 bg-white p-4 shadow-sm transition hover:border-brand-300 hover:shadow-md">
                                <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-brand-50 text-brand-600">
                                    <i class="fas {{ $item['icon'] }}" aria-hidden="true"></i>
                                </span>
                                <span class="text-sm font-semibold text-gray-800">{{ $item['text'] }}</span>
                            </div>
                        @endforeach
                    </div>

                    <div class="mt-10 flex flex-wrap gap-4">
                        <a href="{{ route('products') }}" class="btn btn-primary">Xem sản phẩm</a>
                        <a href="#lien-he" class="btn btn-secondary">Liên hệ hợp tác</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- 5. Sản phẩm nổi bật --}}
    <section id="san-pham" class="section-padding relative overflow-hidden bg-white">
        <div class="pointer-events-none absolute -right-32 top-20 h-96 w-96 rounded-full bg-brand-100/60 blur-3xl"></div>
        <div class="pointer-events-none absolute -left-32 bottom-20 h-80 w-80 rounded-full bg-accent-100/50 blur-3xl"></div>

        <div class="container-site relative">
            <div class="mx-auto max-w-3xl text-center">
                <p class="eyebrow">Danh mục</p>
                <h2 class="heading-section mt-3">Sản Phẩm Nổi Bật</h2>
                <p class="text-lead mt-5">
                    Đàn Hương · Trầm Hương · Măng Lục Trúc · Sưa Đỏ · Keo Lai — đa dạng lựa chọn cho mọi mô hình đầu tư.
                </p>
                <div class="divider-brand mt-8"></div>
            </div>

            <div class="mt-14 grid gap-6 sm:grid-cols-2 xl:grid-cols-3">
                @foreach ($featuredProducts as $product)
                    @include('partials.product-card', ['product' => $product])
                @endforeach
            </div>

            <div class="mt-14 text-center">
                <a href="{{ route('products') }}" class="btn btn-primary btn-lg">
                    Xem tất cả sản phẩm
                    <i class="fas fa-arrow-right text-sm" aria-hidden="true"></i>
                </a>
            </div>
        </div>
    </section>

    {{-- 6. Lý do chọn GreenTech --}}
    <section class="section-padding bg-gradient-to-b from-brand-50 to-white">
        <div class="container-site">
            <div class="mx-auto max-w-3xl text-center">
                <p class="eyebrow">Tại sao chọn chúng tôi</p>
                <h2 class="heading-section mt-3">Lý Do Chọn GreenTech</h2>
                <p class="text-lead mt-5">Nền tảng vững chắc — từ chất lượng giống đến dịch vụ hậu mãi chuyên nghiệp.</p>
                <div class="divider-brand mt-8"></div>
            </div>

            <div class="mt-14 grid gap-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5">
                @foreach ($features as $feature)
                    <div class="group rounded-2xl border border-white bg-white p-6 text-center shadow-sm transition duration-300 hover:-translate-y-2 hover:border-brand-200 hover:shadow-xl">
                        <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-2xl bg-brand-50 text-brand-600 transition duration-300 group-hover:bg-gradient-to-br group-hover:from-brand-500 group-hover:to-accent-600 group-hover:text-white group-hover:shadow-lg">
                            <i class="fas {{ $feature['icon'] }} text-2xl" aria-hidden="true"></i>
                        </div>
                        <h3 class="mt-5 text-base font-bold text-gray-900">{{ $feature['title'] }}</h3>
                        <p class="mt-2 text-sm leading-relaxed text-surface-muted">{{ $feature['desc'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- 7. Quy trình hợp tác --}}
    <section id="quy-trinh" class="section-padding section-bg-white">
        <div class="container-site">
            <div class="mx-auto max-w-3xl text-center">
                <p class="eyebrow">Hợp tác</p>
                <h2 class="heading-section mt-3">Quy Trình Hợp Tác</h2>
                <p class="text-lead mt-5">Bốn bước đơn giản — bắt đầu dự án trồng cây của bạn cùng GreenTech.</p>
                <div class="divider-brand mt-8"></div>
            </div>

            <div class="mt-16 hidden lg:grid lg:grid-cols-4 lg:gap-4">
                @foreach ($processSteps as $step)
                    <div class="group relative rounded-2xl border border-brand-100 bg-surface-50 p-6 text-center transition hover:border-brand-300 hover:bg-white hover:shadow-lg">
                        @if (! $loop->last)
                            <div class="absolute -right-2 top-14 z-10 hidden text-brand-300 xl:block">
                                <i class="fas fa-arrow-right-long text-2xl" aria-hidden="true"></i>
                            </div>
                        @endif
                        <span class="inline-flex h-10 w-10 items-center justify-center rounded-full bg-brand-600 text-sm font-bold text-white">{{ $step['step'] }}</span>
                        <div class="mx-auto mt-4 flex h-14 w-14 items-center justify-center rounded-xl bg-white text-brand-600 shadow-sm ring-1 ring-brand-100 transition group-hover:bg-brand-600 group-hover:text-white">
                            <i class="fas {{ $step['icon'] }} text-xl" aria-hidden="true"></i>
                        </div>
                        <h3 class="mt-5 font-bold text-gray-900">{{ $step['title'] }}</h3>
                        <p class="mt-2 text-sm leading-relaxed text-surface-muted">{{ $step['desc'] }}</p>
                    </div>
                @endforeach
            </div>

            <div class="mt-12 space-y-6 lg:hidden">
                @foreach ($processSteps as $step)
                    <div class="flex gap-5 rounded-2xl border border-brand-100 bg-white p-5 shadow-sm">
                        <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-brand-600 font-bold text-white">
                            {{ $step['step'] }}
                        </div>
                        <div>
                            <div class="flex items-center gap-2">
                                <i class="fas {{ $step['icon'] }} text-brand-600" aria-hidden="true"></i>
                                <h3 class="font-bold text-gray-900">{{ $step['title'] }}</h3>
                            </div>
                            <p class="mt-2 text-sm text-surface-muted">{{ $step['desc'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- 8. Tin tức mới --}}
    <section id="tin-tuc" class="section-padding section-bg-light">
        <div class="container-site">
            <div class="flex flex-col gap-6 md:flex-row md:items-end md:justify-between">
                <div class="max-w-xl">
                    <p class="eyebrow">Bản tin</p>
                    <h2 class="heading-2 mt-3">Tin Tức & Kiến Thức Mới</h2>
                    <p class="text-lead mt-4">Cập nhật kỹ thuật canh tác, xu hướng thị trường và kinh nghiệm thực tế.</p>
                </div>
                <a href="#" class="btn btn-secondary shrink-0 self-start">
                    Xem tất cả
                    <i class="fas fa-arrow-right text-xs" aria-hidden="true"></i>
                </a>
            </div>

            <div class="mt-12 grid gap-8 md:grid-cols-3">
                @foreach ($newsPosts as $post)
                    <article class="group card-hover flex flex-col overflow-hidden bg-white">
                        <a href="#" class="relative block overflow-hidden">
                            <img
                                src="{{ $post['image'] }}"
                                alt="{{ $post['title'] }}"
                                class="h-56 w-full object-cover transition duration-500 group-hover:scale-110"
                                loading="lazy"
                            >
                            <span class="badge-accent absolute left-4 top-4">{{ $post['category'] }}</span>
                        </a>
                        <div class="card-body flex flex-1 flex-col">
                            <time class="text-xs font-bold uppercase tracking-wide text-brand-600">{{ $post['date'] }}</time>
                            <h3 class="mt-3 text-lg font-bold leading-snug text-gray-900 transition group-hover:text-brand-700 line-clamp-2">
                                <a href="#">{{ $post['title'] }}</a>
                            </h3>
                            <p class="mt-3 flex-1 text-sm leading-relaxed text-surface-muted line-clamp-3">{{ $post['excerpt'] }}</p>
                            <a href="#" class="mt-5 inline-flex items-center gap-2 text-sm font-bold text-brand-600 transition hover:gap-3">
                                Đọc thêm <i class="fas fa-arrow-right text-xs" aria-hidden="true"></i>
                            </a>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    {{-- 9. CTA cuối trang --}}
    <section class="relative overflow-hidden">
        <img
            src="https://images.unsplash.com/photo-1500382017468-9049fed747ef?w=1920&q=85"
            alt=""
            class="absolute inset-0 h-full w-full object-cover"
            loading="lazy"
            aria-hidden="true"
        >
        <div class="absolute inset-0 bg-brand-950/92"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-brand-950 via-brand-900/80 to-transparent"></div>

        <div class="container-site relative z-10 py-20 text-center md:py-28">
            <div class="mx-auto max-w-3xl">
                <p class="text-sm font-bold uppercase tracking-[0.2em] text-emerald-300">Liên hệ ngay</p>
                <h2 class="mt-4 text-3xl font-extrabold leading-tight text-white sm:text-4xl lg:text-5xl">
                    Bắt đầu dự án trồng cây của bạn hôm nay
                </h2>
                <p class="mx-auto mt-6 max-w-2xl text-lg text-emerald-100/90">
                    Đăng ký tư vấn miễn phí — chuyên gia GreenTech sẽ liên hệ trong vòng 24 giờ.
                </p>

                <div class="mt-10 flex flex-col items-center justify-center gap-4 sm:flex-row">
                    <a href="tel:0908544200" class="btn btn-primary btn-lg w-full justify-center sm:w-auto hover:scale-[1.02]">
                        <i class="fas fa-phone" aria-hidden="true"></i>
                        Hotline: 0908 544 200
                    </a>
                    <a href="#lien-he" class="btn btn-outline btn-lg w-full justify-center sm:w-auto hover:scale-[1.02]">
                        Gửi yêu cầu tư vấn
                    </a>
                </div>

                <div class="mx-auto mt-12 grid max-w-2xl gap-4 sm:grid-cols-3">
                    @foreach ([
                        ['icon' => 'fa-clock', 'text' => 'Phản hồi 24h'],
                        ['icon' => 'fa-comments', 'text' => 'Tư vấn miễn phí'],
                        ['icon' => 'fa-map-location-dot', 'text' => 'Toàn quốc'],
                    ] as $item)
                        <div class="rounded-xl border border-white/15 bg-white/5 px-4 py-3 backdrop-blur-sm">
                            <i class="fas {{ $item['icon'] }} text-emerald-400" aria-hidden="true"></i>
                            <p class="mt-2 text-sm font-semibold text-white">{{ $item['text'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    {{-- 10. Footer: @include trong layouts/app --}}

@endsection
