<?php

namespace App\Support;

class ProductCatalog
{
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
        return [
            [
                'slug' => 'dan-huong-dh-24',
                'name' => 'Đàn Hương DH-24',
                'category' => 'dan-huong',
                'price' => 9152000,
                'price_formatted' => '9.152.000đ',
                'short_desc' => 'Giống lai chọn lọc, sinh trưởng nhanh, gỗ chất lượng cao.',
                'description' => 'Đàn Hương DH-24 là giống cây lai được GreenTech chọn lọc kỹ lưỡng, thích nghi tốt với khí hậu Việt Nam. Cây có tốc độ sinh trưởng ổn định, thân thẳng, ít sâu bệnh. Phù hợp trồng quy mô hộ gia đình đến doanh nghiệp lâm nghiệp.',
                'badge' => 'Bán chạy',
                'badge_class' => 'badge-brand',
                'image' => 'https://images.unsplash.com/photo-1542601906990-bf4e1a49a769?w=800&q=85',
                'gallery' => [
                    'https://images.unsplash.com/photo-1542601906990-bf4e1a49a769?w=800&q=85',
                    'https://images.unsplash.com/photo-1441974231531-c6227db76b6e?w=800&q=85',
                    'https://images.unsplash.com/photo-1416879595882-3373a0480b5b?w=800&q=85',
                ],
                'specs' => [
                    ['label' => 'Chiều cao cây giống', 'value' => '40 – 60 cm'],
                    ['label' => 'Tuổi cây', 'value' => '6 – 8 tháng'],
                    ['label' => 'Mật độ trồng', 'value' => '2.000 – 2.500 cây/ha'],
                    ['label' => 'Thời gian khai thác', 'value' => '8 – 10 năm'],
                    ['label' => 'Bảo hành', 'value' => '30 ngày sau giao'],
                ],
            ],
            [
                'slug' => 'tram-huong-th-12',
                'name' => 'Trầm Hương TH-12',
                'category' => 'tram-huong',
                'price' => 12500000,
                'price_formatted' => '12.500.000đ',
                'short_desc' => 'Giống Trầm Hương ổn định, phù hợp vùng khí hậu ẩm.',
                'description' => 'Trầm Hương TH-12 được nhân giống từ nguồn gen chọn lọc, có tiềm năng tạo kết trầm cao khi điều kiện phù hợp. GreenTech hỗ trợ kỹ thuật ghép chồng và chăm sóc giai đoạn đầu.',
                'badge' => 'Mới',
                'badge_class' => 'badge-accent',
                'image' => 'https://images.unsplash.com/photo-1518531933037-91b2f5f229cc?w=800&q=85',
                'gallery' => [
                    'https://images.unsplash.com/photo-1518531933037-91b2f5f229cc?w=800&q=85',
                    'https://images.unsplash.com/photo-1500382017468-9049fed747ef?w=800&q=85',
                    'https://images.unsplash.com/photo-1470058869952-2a77edb83ef8?w=800&q=85',
                ],
                'specs' => [
                    ['label' => 'Chiều cao cây giống', 'value' => '35 – 50 cm'],
                    ['label' => 'Độ ẩm phù hợp', 'value' => '70 – 85%'],
                    ['label' => 'Mật độ trồng', 'value' => '1.500 – 2.000 cây/ha'],
                    ['label' => 'Thời gian khai thác', 'value' => '10 – 15 năm'],
                    ['label' => 'Bảo hành', 'value' => '30 ngày sau giao'],
                ],
            ],
            [
                'slug' => 'mang-luc-truc-ml-8',
                'name' => 'Măng Lục Trúc ML-8',
                'category' => 'mang-luc-truc',
                'price' => 3800000,
                'price_formatted' => '3.800.000đ',
                'short_desc' => 'Măng tre sinh khối lớn, chu kỳ thu hoạch ngắn.',
                'description' => 'Măng Lục Trúc ML-8 là giống tre lai cho năng suất măng cao, thân to, ít đổ ngã. Thích hợp trồng làm lương thực rừng hoặc kết hợp chăn nuôi, phát triển kinh tế tuần hoàn.',
                'badge' => 'Hot',
                'badge_class' => 'badge-brand',
                'image' => 'https://images.unsplash.com/photo-1501004318641-b39e6fcca770?w=800&q=85',
                'gallery' => [
                    'https://images.unsplash.com/photo-1501004318641-b39e6fcca770?w=800&q=85',
                    'https://images.unsplash.com/photo-1574323347407-f5b472f6c281?w=800&q=85',
                    'https://images.unsplash.com/photo-1464226184884-fa280b87d399?w=800&q=85',
                ],
                'specs' => [
                    ['label' => 'Chiều cao cây giống', 'value' => '50 – 80 cm'],
                    ['label' => 'Chu kỳ thu hoạch', 'value' => '3 – 4 năm'],
                    ['label' => 'Mật độ trồng', 'value' => '800 – 1.000 cây/ha'],
                    ['label' => 'Năng suất măng', 'value' => '15 – 20 tấn/ha/năm'],
                    ['label' => 'Bảo hành', 'value' => '30 ngày sau giao'],
                ],
            ],
            [
                'slug' => 'sua-do-sd-15',
                'name' => 'Sưa Đỏ SD-15',
                'category' => 'sua-do',
                'price' => 8200000,
                'price_formatted' => '8.200.000đ',
                'short_desc' => 'Cây gỗ quý, giá trị kinh tế cao theo thời gian.',
                'description' => 'Sưa Đỏ SD-15 có tốc độ lớn nhanh, gỗ đẹp, giá trị thương phẩm tăng theo thời gian. Phù hợp nhà đầu tư dài hạn với quỹ đất rộng.',
                'badge' => 'Premium',
                'badge_class' => 'badge-accent',
                'image' => 'https://images.unsplash.com/photo-1470058869952-2a77edb83ef8?w=800&q=85',
                'gallery' => [
                    'https://images.unsplash.com/photo-1470058869952-2a77edb83ef8?w=800&q=85',
                    'https://images.unsplash.com/photo-1441974231531-c6227db76b6e?w=800&q=85',
                    'https://images.unsplash.com/photo-1597848212624-a19eb35e2651?w=800&q=85',
                ],
                'specs' => [
                    ['label' => 'Chiều cao cây giống', 'value' => '45 – 65 cm'],
                    ['label' => 'Mật độ trồng', 'value' => '1.100 – 1.300 cây/ha'],
                    ['label' => 'Thời gian khai thác', 'value' => '12 – 15 năm'],
                    ['label' => 'Độ che phủ tán', 'value' => 'Trung bình'],
                    ['label' => 'Bảo hành', 'value' => '30 ngày sau giao'],
                ],
            ],
            [
                'slug' => 'keo-lai-kl-20',
                'name' => 'Keo Lai KL-20',
                'category' => 'keo-lai',
                'price' => 2150000,
                'price_formatted' => '2.150.000đ',
                'short_desc' => 'Keo lai cho bóng rừng nhanh, thích nghi tốt nhiều vùng.',
                'description' => 'Keo Lai KL-20 sinh trưởng nhanh, phục hồi đất tốt, phù hợp trồng bóng rừng hoặc nguyên liệu giấy. Chi phí đầu tư thấp, thu hồi vốn sớm.',
                'badge' => 'Tiết kiệm',
                'badge_class' => 'badge-brand',
                'image' => 'https://images.unsplash.com/photo-1597848212624-a19eb35e2651?w=800&q=85',
                'gallery' => [
                    'https://images.unsplash.com/photo-1597848212624-a19eb35e2651?w=800&q=85',
                    'https://images.unsplash.com/photo-1542601906990-bf4e1a49a769?w=800&q=85',
                    'https://images.unsplash.com/photo-1500595046743-cd271d694d30?w=800&q=85',
                ],
                'specs' => [
                    ['label' => 'Chiều cao cây giống', 'value' => '30 – 45 cm'],
                    ['label' => 'Mật độ trồng', 'value' => '1.600 – 2.000 cây/ha'],
                    ['label' => 'Chu kỳ khai thác', 'value' => '5 – 7 năm'],
                    ['label' => 'Khả năng chịu hạn', 'value' => 'Tốt'],
                    ['label' => 'Bảo hành', 'value' => '30 ngày sau giao'],
                ],
            ],
            [
                'slug' => 'combo-dau-tu-xanh',
                'name' => 'Combo Đầu Tư Xanh',
                'category' => 'combo',
                'price' => 0,
                'price_formatted' => 'Liên hệ',
                'short_desc' => 'Gói giống + tư vấn kỹ thuật + hỗ trợ sau bán.',
                'description' => 'Combo Đầu Tư Xanh gồm giống cây đa dạng, khảo sát đất, lập phương án trồng và hỗ trợ kỹ thuật 12 tháng. Giải pháp trọn gói cho nhà đầu tư mới.',
                'badge' => 'Ưu đãi',
                'badge_class' => 'badge-accent',
                'image' => 'https://images.unsplash.com/photo-1464226184884-fa280b87d399?w=800&q=85',
                'gallery' => [
                    'https://images.unsplash.com/photo-1464226184884-fa280b87d399?w=800&q=85',
                    'https://images.unsplash.com/photo-1416879595882-3373a0480b5b?w=800&q=85',
                    'https://images.unsplash.com/photo-1625246333195-78d9c38ad449?w=800&q=85',
                ],
                'specs' => [
                    ['label' => 'Thành phần', 'value' => 'Tùy chỉnh theo quy mô'],
                    ['label' => 'Tư vấn', 'value' => 'Miễn phí lần đầu'],
                    ['label' => 'Hỗ trợ kỹ thuật', 'value' => '12 tháng'],
                    ['label' => 'Giao hàng', 'value' => 'Toàn quốc'],
                    ['label' => 'Ưu đãi', 'value' => 'Theo hợp đồng'],
                ],
            ],
            [
                'slug' => 'dan-huong-dh-18',
                'name' => 'Đàn Hương DH-18',
                'category' => 'dan-huong',
                'price' => 7850000,
                'price_formatted' => '7.850.000đ',
                'short_desc' => 'Giống Đàn Hương tiết kiệm chi phí, sinh trưởng khỏe.',
                'description' => 'Đàn Hương DH-18 là lựa chọn cân bằng giữa chi phí và chất lượng, phù hợp trồng thử nghiệm hoặc mở rộng quy mô vừa.',
                'badge' => null,
                'badge_class' => 'badge-brand',
                'image' => 'https://images.unsplash.com/photo-1441974231531-c6227db76b6e?w=800&q=85',
                'gallery' => [
                    'https://images.unsplash.com/photo-1441974231531-c6227db76b6e?w=800&q=85',
                    'https://images.unsplash.com/photo-1542601906990-bf4e1a49a769?w=800&q=85',
                ],
                'specs' => [
                    ['label' => 'Chiều cao cây giống', 'value' => '35 – 55 cm'],
                    ['label' => 'Mật độ trồng', 'value' => '2.000 cây/ha'],
                    ['label' => 'Thời gian khai thác', 'value' => '8 – 10 năm'],
                    ['label' => 'Bảo hành', 'value' => '30 ngày'],
                ],
            ],
            [
                'slug' => 'tram-huong-th-08',
                'name' => 'Trầm Hương TH-08',
                'category' => 'tram-huong',
                'price' => 9800000,
                'price_formatted' => '9.800.000đ',
                'short_desc' => 'Giống Trầm Hương phổ thông, dễ trồng.',
                'description' => 'Trầm Hương TH-08 dành cho hộ trồng mới bắt đầu, quy trình chăm sóc đơn giản, tỷ lệ sống cao khi tuân thủ hướng dẫn kỹ thuật.',
                'badge' => null,
                'badge_class' => 'badge-accent',
                'image' => 'https://images.unsplash.com/photo-1500382017468-9049fed747ef?w=800&q=85',
                'gallery' => [
                    'https://images.unsplash.com/photo-1500382017468-9049fed747ef?w=800&q=85',
                    'https://images.unsplash.com/photo-1518531933037-91b2f5f229cc?w=800&q=85',
                ],
                'specs' => [
                    ['label' => 'Chiều cao cây giống', 'value' => '30 – 45 cm'],
                    ['label' => 'Mật độ trồng', 'value' => '1.800 cây/ha'],
                    ['label' => 'Bảo hành', 'value' => '30 ngày'],
                ],
            ],
        ];
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
        $products = self::all();

        if ($category === null || $category === '' || $category === 'all') {
            return $products;
        }

        return array_values(array_filter(
            $products,
            fn (array $product) => $product['category'] === $category
        ));
    }

    /**
     * @return list<array<string, mixed>>
     */
    /**
     * @return list<array<string, mixed>>
     */
    public static function related(array $product, int $limit = 4): array
    {
        $filtered = array_values(array_filter(
            self::all(),
            fn (array $item) => $item['category'] === $product['category'] && $item['slug'] !== $product['slug']
        ));

        return array_slice($filtered, 0, $limit);
    }

    public static function categoryLabel(string $category): string
    {
        return self::categories()[$category]['label'] ?? 'Khác';
    }
}
