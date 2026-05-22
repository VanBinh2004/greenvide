# Báo cáo thống kê tiến độ dự án GreenTech

**Dự án:** greenvibe (GreenTech)  
**Công nghệ:** Laravel 13 · PHP 8.3+ · Tailwind CSS v4 · Vite  
**Loại hình hiện tại:** Website giới thiệu + catalog sản phẩm tĩnh (chưa CMS, chưa database nội dung)  
**Cập nhật:** 23/05/2026

---

## 1. Tổng quan số liệu

| Hạng mục | Số lượng | Ghi chú |
|----------|----------|---------|
| Route web có UI | **4** | `/`, `/san-pham`, `/san-pham/{slug}`, `/login` |
| Controller nghiệp vụ | **1** (`HomeController`) | 3 action + 1 view tĩnh login |
| View Blade | **8** | Layout + partials + 4 trang nội dung |
| Model / migration tùy chỉnh | **0** | Chỉ có `User` mặc định Laravel |
| Sản phẩm mẫu (tĩnh) | **8** | Trong `app/Support/ProductCatalog.php` |
| Trang chủ — section | **9** (+ header/footer) | Hero → CTA |
| Chức năng hoàn chỉnh | **~12** | Xem mục 2 |
| Chức năng một phần | **~6** | Xem mục 3 |
| Chức năng chưa làm | **~15+** | Xem mục 4 |

**Tiến độ ước lượng**

- Giao diện & luồng xem: **~65–70%**
- Backend / quản trị / thương mại: **~25–30%**

---

## 2. Đã hoàn thành

### 2.1. Hạ tầng & công cụ

| # | Chức năng | File / ghi chú |
|---|-----------|----------------|
| 1 | Laravel 13 + Vite + Tailwind v4 | `composer.json`, `vite.config.js`, `resources/css/app.css` |
| 2 | Design system GreenTech | Màu brand/emerald/teal, font Plus Jakarta Sans, utility (`btn`, `card`, `heading-*`, …) |
| 3 | Build production assets | `npm run build` → `public/build/` |
| 4 | Layout Blade chuẩn | `resources/views/layouts/app.blade.php` — `@yield`, `@stack`, `@include` |
| 5 | Menu mobile (toggle) | `resources/js/app.js` |

### 2.2. Giao diện dùng chung

| # | Chức năng | Chi tiết |
|---|-----------|----------|
| 6 | Header | Logo GT/GREEN TECH, menu, hotline, nút đăng nhập, responsive |
| 7 | Footer | Thông tin công ty, liên kết, danh mục SP, liên hệ, copyright |
| 8 | Partial card sản phẩm | `resources/views/partials/product-card.blade.php` |

### 2.3. Trang & luồng người dùng

| # | Trang | Route | Name | Trạng thái |
|---|-------|-------|------|------------|
| 9 | Trang chủ | `GET /` | `home` | 9 section: Hero, thống kê, giới thiệu, SP nổi bật, lý do chọn, quy trình, tin tức, CTA |
| 10 | Danh sách sản phẩm | `GET /san-pham` | `products` | Grid 2–4 cột, lọc danh mục (sidebar + chip mobile) |
| 11 | Chi tiết sản phẩm | `GET /san-pham/{slug}` | `product.detail` | Gallery, mô tả, thông số, SP liên quan, 404 khi slug sai |
| 12 | Đăng nhập (giao diện) | `GET /login` | `login` | Trang placeholder, không lỗi 404 |

### 2.4. Dữ liệu & logic (tĩnh)

| # | Chức năng | Chi tiết |
|---|-----------|----------|
| 13 | Catalog sản phẩm | `app/Support/ProductCatalog.php` — 8 SP, 6 danh mục |
| 14 | Lọc theo category | Query `?category=dan-huong`, `tram-huong`, … |
| 15 | Sản phẩm liên quan | Cùng danh mục, tối đa 4 |
| 16 | Dọn dự án | Xóa `welcome.blade.php`, route `home` chuẩn |

### 2.5. UX / UI

- Responsive (mobile / tablet / desktop)
- Hover card, gradient emerald, ảnh Unsplash
- Breadcrumb (trang sản phẩm & chi tiết)
- Hotline `0908 544 200` (`tel:0908544200`)
- Anchor trên trang chủ: `#gioi-thieu`, `#san-pham`, `#tin-tuc`, `#lien-he`

### 2.6. Cấu trúc file chính

```
app/
├── Http/Controllers/HomeController.php
└── Support/ProductCatalog.php

resources/
├── css/app.css
├── js/app.js
└── views/
    ├── layouts/app.blade.php
    ├── partials/header.blade.php
    ├── partials/footer.blade.php
    ├── partials/product-card.blade.php
    ├── home/index.blade.php
    ├── home/products.blade.php
    ├── home/product-detail.blade.php
    └── auth/login.blade.php

routes/web.php
```

---

## 3. Đang làm / hoàn thiện một phần

| # | Chức năng | Đã có | Thiếu |
|---|-----------|--------|--------|
| 1 | Giỏ hàng | Nút "Thêm vào giỏ", alert demo JS | Session/DB, trang giỏ, thanh toán |
| 2 | Đăng nhập / tài khoản | UI `/login`, route `login` | Breeze/Fortify, form, guard, dashboard |
| 3 | Tin tức | 3 card trên trang chủ | Route `/tin-tuc`, danh sách, chi tiết bài, DB |
| 4 | Giới thiệu | Section trên trang chủ + `#gioi-thieu` | Trang `/gioi-thieu` riêng |
| 5 | Liên hệ | Footer + CTA + `#lien-he` | Form gửi email, bản đồ, trang liên hệ |
| 6 | Ảnh & media | URL Unsplash ngoài | `public/images/`, logo thật, favicon |

**Lưu ý:** Menu "Giới thiệu", "Tin tức", "Liên hệ" trên header dùng **anchor** — chỉ hoạt động tốt khi đang ở trang chủ. Từ `/san-pham` cần link dạng `{{ route('home') }}#tin-tuc` hoặc trang riêng.

---

## 4. Chưa làm

### 4.1. Trang & module nội dung

| # | Chức năng | Gợi ý triển khai |
|---|-----------|------------------|
| 1 | Trang Giới thiệu (`/gioi-thieu`) | Controller + Blade |
| 2 | Trang Tin tức (list + detail) | Model `Post`, migration, admin |
| 3 | Trang Liên hệ + form | `ContactController`, validation, mail |
| 4 | Tìm kiếm sản phẩm | Query + UI trên `/san-pham` |
| 5 | Sắp xếp / phân trang SP | Eloquent + `paginate()` |
| 6 | Trang lỗi 404 / 500 tùy chỉnh | `resources/views/errors/` |

### 4.2. Backend & database

| # | Chức năng |
|---|-----------|
| 7 | Model `Product`, `Category` + migration + seeder |
| 8 | Model `Post` (tin tức) |
| 9 | Upload ảnh sản phẩm (storage) |
| 10 | Panel quản trị (Filament / admin custom) |
| 11 | Đa ngôn ngữ (nếu cần) |

### 4.3. Thương mại & tương tác

| # | Chức năng |
|---|-----------|
| 12 | Giỏ hàng thật (session/database) |
| 13 | Đặt hàng / báo giá |
| 14 | Tích hợp Zalo / Facebook Messenger |
| 15 | Newsletter / đăng ký tư vấn |

### 4.4. Kỹ thuật & vận hành

| # | Chức năng |
|---|-----------|
| 16 | Test Feature (route, catalog, 404) |
| 17 | SEO: sitemap, Open Graph, schema |
| 18 | Cache config/view production |
| 19 | CI/CD, deploy script |
| 20 | Chính sách bảo mật / điều khoản (hiện `href="#"`) |

---

## 5. Ma trận route

| Route | Name | Xử lý | Trạng thái |
|-------|------|--------|------------|
| `/` | `home` | `HomeController@index` | Hoàn thành |
| `/san-pham` | `products` | `HomeController@products` | Hoàn thành |
| `/san-pham/{slug}` | `product.detail` | `HomeController@productDetail` | Hoàn thành |
| `/login` | `login` | View `auth.login` | Placeholder |
| `/gioi-thieu` | — | — | Chưa có |
| `/tin-tuc` | — | — | Chưa có |
| `/lien-he` | — | — | Chưa có |
| `/gio-hang` | — | — | Chưa có |

---

## 6. Checklist kế hoạch ban đầu

| Todo | Nội dung | Trạng thái |
|------|----------|------------|
| 1 | Layout + header + footer | Xong |
| 2 | Theme `app.css` | Xong |
| 3 | HomeController + trang chủ | Xong |
| 4 | 8 section trang chủ | Xong |
| 5 | Mobile menu JS | Xong |
| 6 | Dọn route, xóa welcome, build, fix login | Xong |
| — | Trang sản phẩm + chi tiết | Xong (bổ sung) |
| — | Giỏ hàng thật | Chưa |
| — | Auth thật | Chưa |
| — | CMS / database | Chưa |

---

## 7. Danh mục sản phẩm (tĩnh)

| Slug danh mục | Tên hiển thị |
|---------------|--------------|
| `dan-huong` | Đàn Hương |
| `tram-huong` | Trầm Hương |
| `mang-luc-truc` | Măng Lục Trúc |
| `sua-do` | Sưa Đỏ |
| `keo-lai` | Keo Lai |
| `combo` | Combo & Gói |

**Sản phẩm mẫu:** `dan-huong-dh-24`, `tram-huong-th-12`, `mang-luc-truc-ml-8`, `sua-do-sd-15`, `keo-lai-kl-20`, `combo-dau-tu-xanh`, `dan-huong-dh-18`, `tram-huong-th-08`

---

## 8. Kết luận & đề xuất ưu tiên

### Điểm mạnh

- Giao diện GreenTech thống nhất (emerald/teal, responsive)
- Trang chủ đầy đủ section theo phong cách corporate
- Luồng xem sản phẩm + lọc danh mục hoạt động với catalog tĩnh
- Phù hợp demo, landing, giới thiệu công ty

### Hạn chế

- Chưa có database nội dung
- Chưa admin/CMS
- Chưa form liên hệ, tin tức/giới thiệu riêng
- Giỏ hàng và đăng nhập chỉ ở mức demo/UI

### Ưu tiên đề xuất (bước tiếp theo)

1. Trang **Liên hệ** + form gửi mail  
2. Trang **Giới thiệu** + cập nhật menu header  
3. Migration **products** / **categories**, chuyển `ProductCatalog` sang DB  
4. Trang **Tin tức** (danh sách + chi tiết)  
5. **Giỏ hàng** session hoặc luồng đặt hàng qua hotline/Zalo  

---

*Báo cáo được tạo tự động từ trạng thái codebase dự án greenvibe.*
