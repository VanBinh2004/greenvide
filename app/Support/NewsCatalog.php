<?php

namespace App\Support;

class NewsCatalog
{
    public static function imageUrl(string $slug, int $width = 800, int $height = 500): string
    {
        $seed = rawurlencode("greentech-news-{$slug}");

        return "https://picsum.photos/seed/{$seed}/{$width}/{$height}";
    }

    public static function formatDate(string $isoDate): string
    {
        $ts = strtotime($isoDate);

        return $ts ? date('d/m/Y', $ts) : $isoDate;
    }

    /**
     * @return array<string, array{slug: string, label: string}>
     */
    public static function categories(): array
    {
        return [
            'ky-thuat-trong' => ['slug' => 'ky-thuat-trong', 'label' => 'Kỹ thuật trồng'],
            'thi-truong' => ['slug' => 'thi-truong', 'label' => 'Thị trường'],
            'tin-cong-ty' => ['slug' => 'tin-cong-ty', 'label' => 'Tin công ty'],
            'kien-thuc' => ['slug' => 'kien-thuc', 'label' => 'Kiến thức'],
        ];
    }

    /**
     * @return list<array<string, mixed>>
     */
    public static function all(): array
    {
        $items = [
            [
                'slug' => 'ky-thuat-trong-dan-huong-cho-nguoi-moi',
                'title' => 'Kỹ thuật trồng Đàn Hương cho người mới bắt đầu',
                'category' => 'ky-thuat-trong',
                'author' => 'Đội ngũ kỹ thuật GreenTech',
                'published_at' => '2026-05-15',
                'excerpt' => 'Hướng dẫn chọn giống, chuẩn bị đất và chăm sóc 6 tháng đầu hiệu quả cho hộ trồng mới.',
                'content' => <<<'HTML'
<p>Đàn Hương là cây trồng dài ngày, đòi hỏi quy hoạch đất và chọn giống đúng ngay từ đầu. Với hơn 10 năm triển khai tại Tây Nguyên và miền Trung, GreenTech tổng hợp quy trình cơ bản giúp nhà đầu tư giảm rủi ro giai đoạn ổn định.</p>
<h2>1. Chọn giống và thời điểm trồng</h2>
<p>Ưu tiên cây giống có nguồn gốc rõ ràng, chiều cao 40–60 cm, thân thẳng, lá xanh đậm. Thời điểm trồng tốt nhất là đầu mùa mưa (tháng 5–7) hoặc cuối mùa khô có tưới chủ động.</p>
<h2>2. Chuẩn bị đất</h2>
<ul>
<li>Làm sạch cỏ dại, thông thoáng hệ thống thoát nước.</li>
<li>Bón lót hữu cơ 2–3 tấn/ha kết hợp lân – kali theo chỉ số đất.</li>
<li>Mật độ khuyến nghị: 2.000–2.500 cây/ha tùy thổ nhưỡng.</li>
</ul>
<h2>3. Chăm sóc 6 tháng đầu</h2>
<p>Tưới ổn định 2–3 lần/tuần trong mùa khô; tỉa cành tạo thân khi cây đạt 1,2–1,5 m. Theo dõi sâu ăn lá và bệnh thối rễ — phun phòng sớm khi phát hiện dấu hiệu.</p>
<p><strong>Lưu ý:</strong> GreenTech hỗ trợ khảo sát đất và lập phương án trồng miễn phí cho đơn hàng từ 500 cây trở lên.</p>
HTML,
            ],
            [
                'slug' => 'tram-huong-co-hoi-dau-tu-2026',
                'title' => 'Trầm Hương — Cơ hội đầu tư sinh lời dài hạn năm 2026',
                'category' => 'thi-truong',
                'author' => 'Phòng phân tích GreenTech',
                'published_at' => '2026-05-08',
                'excerpt' => 'Phân tích thị trường, chi phí đầu tư và lộ trình khai thác Trầm Hương tối ưu cho nhà vườn.',
                'content' => <<<'HTML'
<p>Nhu cầu trầm hương thiên nhiên và trầm kết tích tiếp tục tăng tại thị trường nội địa và xuất khẩu. Mô hình trồng Trầm kết hợp canh tác bền vững đang được nhiều hộ lựa chọn thay cho khai thác rừng tự nhiên.</p>
<h2>Xu hướng thị trường 2026</h2>
<p>Giá nguyên liệu trầm chất lượng cao duy trì ổn định, trong khi nguồn cung từ rừng tự nhiên ngày càng hạn chế. Các dự án trồng Trầm có chứng nhận nguồn gốc được ưu tiên trong chuỗi cung ứng.</p>
<h2>Cấu trúc chi phí tham khảo</h2>
<ul>
<li>Giống và vật tư: 35–45% tổng chi phí đầu tư ban đầu.</li>
<li>Chăm sóc 3 năm đầu: 25–30%.</li>
<li>Chi phí tạo trầm (ghép chồng, kích thích): phân bổ từ năm thứ 5.</li>
</ul>
<p>GreenTech cung cấp giống TH-12, TH-08 kèm quy trình ghép chồng và theo dõi giai đoạn tạo trầm — giúp nhà đầu tư chủ động lộ trình thu hồi vốn dài hạn.</p>
HTML,
            ],
            [
                'slug' => 'mang-luc-truc-xu-huong-nong-nghiep-xanh-2026',
                'title' => 'Măng Lục Trúc và xu hướng nông nghiệp xanh 2026',
                'category' => 'kien-thuc',
                'author' => 'GreenTech Media',
                'published_at' => '2026-05-01',
                'excerpt' => 'Vì sao Măng tre được các hộ trồng rừng tin chọn trong mô hình kinh tế vườn rừng.',
                'content' => <<<'HTML'
<p>Măng Lục Trúc không chỉ mang lại thu nhập ngắn hạn từ thu hoạch măng mà còn góp phần giữ đất, tăng sinh khối tre và hấp thụ carbon — phù hợp định hướng nông nghiệp xanh của Việt Nam.</p>
<h2>Ưu điểm mô hình vườn rừng + tre</h2>
<p>Chu kỳ thu hoạch măng ngắn (18–24 tháng sau trồng), chi phí đầu tư thấp hơn cây gỗ quý. Kết hợp chăn nuôi hoặc trồng dược liệu bán tán tạo dòng tiền đa dạng.</p>
<h2>Giống ML-8 và ML-12</h2>
<p>GreenTech khuyến nghị ML-8 cho hộ quy mô vừa, ML-12 cho vùng có hệ thống tưới tốt — thời gian thu hoạch sớm hơn 15% so với giống thông thường.</p>
HTML,
            ],
            [
                'slug' => 'greentech-mo-rong-vuon-uom-2026',
                'title' => 'GreenTech mở rộng vườn ươm — Nâng công suất 2 triệu cây/năm',
                'category' => 'tin-cong-ty',
                'author' => 'Ban truyền thông GreenTech',
                'published_at' => '2026-04-22',
                'excerpt' => 'Dự án mở rộng vườn ươm tại Lâm Đồng, đáp ứng nhu cầu giống cây công nghiệp toàn quốc.',
                'content' => <<<'HTML'
<p>Tháng 4/2026, GreenTech chính thức khánh thành giai đoạn 2 của vườn ươm tại Lâm Đồng, nâng tổng công suất lên <strong>2 triệu cây giống/năm</strong>, tập trung Đàn Hương, Trầm Hương và Măng Lục Trúc.</p>
<h2>Cam kết chất lượng</h2>
<ul>
<li>Kiểm định từng lô trước khi xuất vườn.</li>
<li>Truy xuất nguồn gốc theo mã lô.</li>
<li>Giao hàng toàn quốc, bảo hành 30 ngày.</li>
</ul>
<p>Khách hàng đặt trước mùa vụ được ưu đãi 5% và hỗ trợ khảo sát đất miễn phí.</p>
HTML,
            ],
            [
                'slug' => 'chuan-bi-dat-trong-rung-hieu-qua',
                'title' => '5 bước chuẩn bị đất trồng rừng hiệu quả trước mùa vụ',
                'category' => 'ky-thuat-trong',
                'author' => 'Kỹ sư Nguyễn Văn Hùng — GreenTech',
                'published_at' => '2026-04-10',
                'excerpt' => 'Checklist khảo sát, xử lý đất và bón lót giúp cây giống phát triển đồng đều.',
                'content' => <<<'HTML'
<p>Đất là yếu tố quyết định 40% thành công của dự án trồng rừng. Dưới đây là 5 bước GreenTech áp dụng trong mọi dự án tư vấn.</p>
<ol>
<li><strong>Khảo sát thổ nhưỡng:</strong> pH, độ tơi xốp, mực nước ngầm.</li>
<li><strong>Quy hoạch thoát nước:</strong> rãnh thoát, đường lên dốc khi cần.</li>
<li><strong>Xử lý cỏ dại:</strong> làm sạch trước trồng ít nhất 2–4 tuần.</li>
<li><strong>Bón lót:</strong> hữu cơ + NPK theo khuyến cáo phân tích đất.</li>
<li><strong>Đánh dấu hố trồng:</strong> khoảng cách chuẩn theo loại cây.</li>
</ol>
<p>Liên hệ hotline <strong>0908 544 200</strong> để đặt lịch khảo sát miễn phí.</p>
HTML,
            ],
            [
                'slug' => 'thi-truong-go-quy-viet-nam-2026',
                'title' => 'Thị trường gỗ quý Việt Nam 2026: Đàn Hương, Sưa Đỏ và triển vọng xuất khẩu',
                'category' => 'thi-truong',
                'author' => 'Phòng phân tích GreenTech',
                'published_at' => '2026-03-28',
                'excerpt' => 'Cập nhật giá gỗ nội địa, chính sách và cơ hội cho nhà trồng rừng gỗ quý.',
                'content' => <<<'HTML'
<p>Năm 2026, thị trường gỗ quý trong nước tiếp tục thiên về nguồn trồng rừng có chứng nhận. Đàn Hương và Sưa Đỏ là hai nhóm cây được quan tâm đầu tư mạnh tại Tây Nguyên và miền Bắc trung du.</p>
<h2>Điểm nổi bật</h2>
<ul>
<li>Nhu cầu gỗ thơm, gỗ mỹ nghệ ổn định từ Trung Quốc và ASEAN.</li>
<li>Chính sách khuyến khích trồng rừng gỗ lớn, hỗ trợ carbon tăng dần.</li>
<li>Giá gỗ Đàn Hương khai thác tăng 8–12% so với 2024 (theo khảo sát nội bộ GreenTech).</li>
</ul>
<p>Nhà đầu tư nên chọn giống có nguồn gốc rõ ràng và lập sổ theo dõi sinh trưởng để tối ưu giá trị khai thác.</p>
HTML,
            ],
        ];

        usort($items, fn ($a, $b) => strcmp($b['published_at'], $a['published_at']));

        return array_map(fn (array $item) => self::enrichArticle($item), $items);
    }

    /**
     * @param  array<string, mixed>  $article
     * @return array<string, mixed>
     */
    private static function enrichArticle(array $article): array
    {
        $slug = $article['slug'];
        $article['image'] = self::imageUrl($slug, 800, 500);
        $article['cover'] = self::imageUrl($slug, 1200, 600);
        $article['date_formatted'] = self::formatDate($article['published_at']);
        $article['category_label'] = self::categoryLabel($article['category']);

        return $article;
    }

    /**
     * @return list<array<string, mixed>>
     */
    public static function latest(int $limit = 3): array
    {
        return array_slice(self::all(), 0, $limit);
    }

    public static function findBySlug(string $slug): ?array
    {
        foreach (self::all() as $article) {
            if ($article['slug'] === $slug) {
                return $article;
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
            fn (array $article) => $article['category'] === $category
        ));
    }

    /**
     * @return list<array<string, mixed>>
     */
    public static function related(array $article, int $limit = 4): array
    {
        $filtered = array_values(array_filter(
            self::all(),
            fn (array $item) => $item['category'] === $article['category'] && $item['slug'] !== $article['slug']
        ));

        if (count($filtered) < $limit) {
            $others = array_values(array_filter(
                self::all(),
                fn (array $item) => $item['slug'] !== $article['slug'] && $item['category'] !== $article['category']
            ));
            $filtered = array_merge($filtered, array_slice($others, 0, $limit - count($filtered)));
        }

        return array_slice($filtered, 0, $limit);
    }

    public static function categoryLabel(string $category): string
    {
        return self::categories()[$category]['label'] ?? 'Tin tức';
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
