<?php

namespace App\Support;

class ProductCatalog
{
    /**
     * Ảnh ổn định qua Picsum (seed cố định theo slug).
     */
    public static function imageUrl(string $slug, int $variant = 0, int $width = 800, int $height = 600): string
    {
        $seed = rawurlencode("greentech-{$slug}-{$variant}");

        return "https://picsum.photos/seed/{$seed}/{$width}/{$height}";
    }

    /**
     * @return array<int, string>
     */
    public static function galleryUrls(string $slug, int $count = 4): array
    {
        $urls = [];
        for ($i = 0; $i < $count; $i++) {
            $urls[] = self::imageUrl($slug, $i, 900, 675);
        }

        return $urls;
    }

    public static function formatPrice(int $price): string
    {
        if ($price <= 0) {
            return 'Liên hệ';
        }

        return number_format($price, 0, ',', '.').'đ';
    }

    /**
     * @return array<string, array{slug: string, label: string}>
     */
    public static function categories(): array
    {
        return [
            'dan-huong' => ['slug' => 'dan-huong', 'label' => 'Đàn Hương'],
            'tram-huong' => ['slug' => 'tram-huong', 'label' => 'Trầm Hương'],
            'mang-luc-truc' => ['slug' => 'mang-luc-truc', 'label' => 'Măng Lục Trúc'],
            'sua-do' => ['slug' => 'sua-do', 'label' => 'Sưa Đỏ'],
            'keo-lai' => ['slug' => 'keo-lai', 'label' => 'Keo Lai'],
            'combo' => ['slug' => 'combo', 'label' => 'Combo & Gói'],
        ];
    }

    /**
     * @return list<array<string, mixed>>
     */
    public static function all(): array
    {
        $items = [
            self::makeProduct(
                slug: 'dan-huong-dh-24',
                name: 'Đàn Hương DH-24',
                category: 'dan-huong',
                price: 9_152_000,
                short: 'Giống lai chọn lọc, sinh trưởng nhanh, gỗ thơm chất lượng cao.',
                description: 'Đàn Hương DH-24 là dòng giống chủ lực của GreenTech, lai tạo cho thân thẳng, tán cân đối và khả năng chống chịu sâu bệnh tốt. Phù hợp đầu tư quy mô từ 1 ha trở lên với hỗ trợ kỹ thuật trọn gói.',
                badge: 'Bán chạy',
                badgeClass: 'badge-brand',
                publishedAt: '2026-03-10',
                specs: [
                    ['label' => 'Chiều cao cây giống', 'value' => '40 – 60 cm'],
                    ['label' => 'Tuổi cây', 'value' => '6 – 8 tháng'],
                    ['label' => 'Mật độ trồng', 'value' => '2.000 – 2.500 cây/ha'],
                    ['label' => 'Thời gian khai thác', 'value' => '8 – 10 năm'],
                    ['label' => 'Bảo hành', 'value' => '30 ngày sau giao'],
                ],
            ),
            self::makeProduct(
                slug: 'dan-huong-dh-18',
                name: 'Đàn Hương DH-18',
                category: 'dan-huong',
                price: 7_850_000,
                short: 'Giống tiết kiệm chi phí, sinh trưởng ổn định, dễ chăm sóc.',
                description: 'DH-18 cân bằng giữa chi phí đầu tư và năng suất, thích hợp hộ gia đình mở rộng diện tích hoặc trồng thử nghiệm trước khi nhân rộng.',
                badge: null,
                badgeClass: 'badge-brand',
                publishedAt: '2026-02-20',
            ),
            self::makeProduct(
                slug: 'dan-huong-dh-30',
                name: 'Đàn Hương DH-30 Premium',
                category: 'dan-huong',
                price: 10_500_000,
                short: 'Dòng cao cấp, gen chọn lọc, tỷ lệ sống cao.',
                description: 'DH-30 Premium dành cho nhà đầu tư yêu cầu chất lượng tối đa. Cây đồng đều, kiểm định từng lô trước khi xuất vườn.',
                badge: 'Premium',
                badgeClass: 'badge-accent',
                publishedAt: '2026-04-01',
            ),
            self::makeProduct(
                slug: 'tram-huong-th-12',
                name: 'Trầm Hương TH-12',
                category: 'tram-huong',
                price: 12_500_000,
                short: 'Giống Trầm ổn định, tiềm năng kết trầm cao vùng ẩm.',
                description: 'TH-12 được nhân giống từ nguồn gen quý, phù hợp vùng Tây Nguyên và miền Bắc ẩm. GreenTech hỗ trợ ghép chồng và theo dõi giai đoạn tạo trầm.',
                badge: 'Mới',
                badgeClass: 'badge-accent',
                publishedAt: '2026-03-28',
            ),
            self::makeProduct(
                slug: 'tram-huong-th-08',
                name: 'Trầm Hương TH-08',
                category: 'tram-huong',
                price: 9_800_000,
                short: 'Dễ trồng, quy trình chăm sóc đơn giản cho người mới.',
                description: 'TH-08 là lựa chọn phổ biến cho hộ trồng mới, tỷ lệ sống cao khi tuân thủ hướng dẫn kỹ thuật của đội ngũ GreenTech.',
                badge: null,
                badgeClass: 'badge-accent',
                publishedAt: '2026-01-15',
            ),
            self::makeProduct(
                slug: 'mang-luc-truc-ml-8',
                name: 'Măng Lục Trúc ML-8',
                category: 'mang-luc-truc',
                price: 3_800_000,
                short: 'Măng tre sinh khối lớn, chu kỳ thu hoạch ngắn.',
                description: 'ML-8 cho năng suất măng cao, thân tre to, ít đổ ngã. Thích hợp mô hình kinh tế vườn rừng kết hợp chăn nuôi.',
                badge: 'Hot',
                badgeClass: 'badge-brand',
                publishedAt: '2026-03-05',
            ),
            self::makeProduct(
                slug: 'mang-luc-truc-ml-12',
                name: 'Măng Lục Trúc ML-12',
                category: 'mang-luc-truc',
                price: 4_200_000,
                short: 'Giống măng lai mới, thu hoạch sớm hơn 15%.',
                description: 'ML-12 là dòng lai cho thời gian thu hoạch măng nhanh hơn ML-8, phù hợp vùng đất tơi xốp có tưới tiêu chủ động.',
                badge: 'Mới',
                badgeClass: 'badge-brand',
                publishedAt: '2026-04-08',
            ),
            self::makeProduct(
                slug: 'sua-do-sd-15',
                name: 'Sưa Đỏ SD-15',
                category: 'sua-do',
                price: 8_200_000,
                short: 'Gỗ quý, giá trị kinh tế tăng theo thời gian.',
                description: 'SD-15 có tốc độ lớn nhanh, gỗ đẹp, phù hợp đầu tư dài hạn. GreenTech tư vấn mật độ và quy trình tỉa cành tối ưu.',
                badge: 'Premium',
                badgeClass: 'badge-accent',
                publishedAt: '2026-02-10',
            ),
            self::makeProduct(
                slug: 'keo-lai-kl-20',
                name: 'Keo Lai KL-20',
                category: 'keo-lai',
                price: 2_150_000,
                short: 'Keo lai bóng rừng nhanh, chi phí đầu tư thấp.',
                description: 'KL-20 sinh trưởng mạnh, phục hồi đất tốt, thích hợp trồng nguyên liệu giấy hoặc bán carbon rừng.',
                badge: 'Tiết kiệm',
                badgeClass: 'badge-brand',
                publishedAt: '2026-01-28',
            ),
            self::makeProduct(
                slug: 'combo-dau-tu-xanh',
                name: 'Combo Đầu Tư Xanh',
                category: 'combo',
                price: 0,
                short: 'Gói giống + khảo sát đất + tư vấn kỹ thuật 12 tháng.',
                description: 'Combo trọn gói cho nhà đầu tư mới: giống đa dạng, khảo sát đất, lập phương án trồng và hỗ trợ kỹ thuật 12 tháng. Giá theo quy mô dự án.',
                badge: 'Ưu đãi',
                badgeClass: 'badge-accent',
                publishedAt: '2026-03-15',
                specs: [
                    ['label' => 'Thành phần', 'value' => 'Tùy chỉnh theo quy mô'],
                    ['label' => 'Tư vấn', 'value' => 'Miễn phí lần đầu'],
                    ['label' => 'Hỗ trợ kỹ thuật', 'value' => '12 tháng'],
                    ['label' => 'Giao hàng', 'value' => 'Toàn quốc'],
                ],
            ),
        ];

        return array_map(fn (array $p) => self::enrichProduct($p), $items);
    }

    /**
     * @param  array<string, mixed>  $overrides
     * @return array<string, mixed>
     */
    private static function makeProduct(
        string $slug,
        string $name,
        string $category,
        int $price,
        string $short,
        string $description,
        ?string $badge,
        string $badgeClass,
        string $publishedAt,
        ?array $specs = null,
    ): array {
        return [
            'slug' => $slug,
            'name' => $name,
            'category' => $category,
            'price' => $price,
            'short_desc' => $short,
            'description' => $description,
            'badge' => $badge,
            'badge_class' => $badgeClass,
            'published_at' => $publishedAt,
            'specs' => $specs ?? [
                ['label' => 'Chiều cao cây giống', 'value' => '35 – 55 cm'],
                ['label' => 'Mật độ trồng', 'value' => 'Theo loại cây'],
                ['label' => 'Bảo hành', 'value' => '30 ngày sau giao'],
            ],
        ];
    }

    /**
     * @param  array<string, mixed>  $product
     * @return array<string, mixed>
     */
    private static function enrichProduct(array $product): array
    {
        $slug = $product['slug'];
        $product['image'] = self::imageUrl($slug, 0, 800, 600);
        $product['gallery'] = self::galleryUrls($slug, 4);
        $product['price_formatted'] = self::formatPrice($product['price']);

        return $product;
    }

    public static function findBySlug(string $slug): ?array
    {
        foreach (self::all() as $product) {
            if ($product['slug'] === $slug) {
                return $product;
            }
        }

        return null;
    }

    /**
     * @return list<array<string, mixed>>
     */
    public static function byCategory(?string $category): array
    {
        if ($category === null || $category === '' || $category === 'all') {
            return self::all();
        }

        return array_values(array_filter(
            self::all(),
            fn (array $product) => $product['category'] === $category
        ));
    }

    /**
     * @param  list<array<string, mixed>>  $products
     * @return list<array<string, mixed>>
     */
    public static function sort(array $products, string $sortBy): array
    {
        $sorted = $products;

        usort($sorted, function (array $a, array $b) use ($sortBy) {
            return match ($sortBy) {
                'price_asc' => self::comparePrice($a['price'], $b['price']),
                'price_desc' => self::comparePrice($b['price'], $a['price']),
                default => strcmp($b['published_at'] ?? '', $a['published_at'] ?? ''),
            };
        });

        return $sorted;
    }

    private static function comparePrice(int $a, int $b): int
    {
        if ($a === 0 && $b === 0) {
            return 0;
        }
        if ($a === 0) {
            return 1;
        }
        if ($b === 0) {
            return -1;
        }

        return $a <=> $b;
    }

    public static function sortOptions(): array
    {
        return [
            'newest' => 'Mới nhất',
            'price_asc' => 'Giá: Thấp đến cao',
            'price_desc' => 'Giá: Cao đến thấp',
        ];
    }

    /**
     * @return list<array<string, mixed>>
     */
    public static function related(array $product, int $limit = 6): array
    {
        $filtered = array_values(array_filter(
            self::all(),
            fn (array $item) => $item['category'] === $product['category'] && $item['slug'] !== $product['slug']
        ));

        if (count($filtered) < $limit) {
            $others = array_values(array_filter(
                self::all(),
                fn (array $item) => $item['slug'] !== $product['slug'] && $item['category'] !== $product['category']
            ));
            $filtered = array_merge($filtered, array_slice($others, 0, $limit - count($filtered)));
        }

        return array_slice($filtered, 0, $limit);
    }

    public static function categoryLabel(string $category): string
    {
        return self::categories()[$category]['label'] ?? 'Khác';
    }

    public static function countByCategory(): array
    {
        $counts = ['all' => count(self::all())];
        foreach (self::categories() as $slug => $_) {
            $counts[$slug] = count(self::byCategory($slug));
        }

        return $counts;
    }
}
