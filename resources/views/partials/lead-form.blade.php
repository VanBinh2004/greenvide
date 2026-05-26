<section id="lien-he" class="gt-reveal section-padding w-full bg-white">
    <div class="container-site">
        <div class="mx-auto max-w-3xl text-center">
            <p class="eyebrow">Liên hệ tư vấn</p>
            <h2 class="heading-section mt-3">Đăng Ký Nhận Tư Vấn Miễn Phí</h2>
            <p class="text-lead mt-5">
                Để lại thông tin — chuyên gia GreenTech sẽ gọi lại trong vòng 24 giờ làm việc.
            </p>
            <div class="divider-brand mt-8"></div>
        </div>

        <div class="mx-auto mt-12 max-w-2xl">
            <form
                id="lead-form"
                action="{{ route('lead.submit') }}"
                method="POST"
                class="card space-y-5 p-6 sm:p-8 md:p-10"
            >
                @csrf

                @if ($errors->any())
                    <div class="rounded-lg border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700" role="alert">
                        <ul class="list-inside list-disc space-y-1">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="grid gap-5 sm:grid-cols-2">
                    <div class="sm:col-span-2 sm:grid sm:grid-cols-2 sm:gap-5">
                        <div>
                            <label for="lead_name" class="label-field">Họ và tên <span class="text-red-500">*</span></label>
                            <input
                                type="text"
                                id="lead_name"
                                name="name"
                                value="{{ old('name') }}"
                                required
                                autocomplete="name"
                                class="input-field"
                                placeholder="Nguyễn Văn A"
                            >
                        </div>
                        <div>
                            <label for="lead_phone" class="label-field">Số điện thoại <span class="text-red-500">*</span></label>
                            <input
                                type="tel"
                                id="lead_phone"
                                name="phone"
                                value="{{ old('phone') }}"
                                required
                                autocomplete="tel"
                                class="input-field"
                                placeholder="0908 544 200"
                            >
                        </div>
                    </div>

                    <div class="sm:col-span-2">
                        <label for="lead_email" class="label-field">Email</label>
                        <input
                            type="email"
                            id="lead_email"
                            name="email"
                            value="{{ old('email') }}"
                            autocomplete="email"
                            class="input-field"
                            placeholder="email@example.com"
                        >
                    </div>

                    <div class="sm:col-span-2">
                        <label for="lead_crop" class="label-field">Loại cây quan tâm <span class="text-red-500">*</span></label>
                        <select id="lead_crop" name="crop_interest" required class="input-field">
                            <option value="" disabled @selected(! old('crop_interest'))>Chọn loại cây</option>
                            <option value="dan-huong" @selected(old('crop_interest') === 'dan-huong')>Đàn Hương</option>
                            <option value="tram-huong" @selected(old('crop_interest') === 'tram-huong')>Trầm Hương</option>
                            <option value="mang-luc-truc" @selected(old('crop_interest') === 'mang-luc-truc')>Măng Lục Trúc</option>
                            <option value="sua-do" @selected(old('crop_interest') === 'sua-do')>Sưa Đỏ</option>
                            <option value="keo-lai" @selected(old('crop_interest') === 'keo-lai')>Keo Lai</option>
                            <option value="khac" @selected(old('crop_interest') === 'khac')>Khác / Tư vấn chung</option>
                        </select>
                    </div>

                    <div class="sm:col-span-2">
                        <label for="lead_note" class="label-field">Ghi chú thêm</label>
                        <textarea
                            id="lead_note"
                            name="note"
                            rows="3"
                            class="input-field resize-none"
                            placeholder="Quy mô diện tích, khu vực trồng..."
                        >{{ old('note') }}</textarea>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary btn-lg w-full justify-center">
                    <i class="fas fa-paper-plane" aria-hidden="true"></i>
                    Gửi yêu cầu tư vấn
                </button>

                <p class="text-center text-xs text-surface-muted">
                    Hoặc gọi trực tiếp:
                    <a href="tel:0908544200" class="font-semibold text-brand-600 hover:text-brand-700">0908 544 200</a>
                </p>
            </form>
        </div>
    </div>
</section>
