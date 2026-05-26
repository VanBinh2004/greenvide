<?php

namespace App\Http\Controllers;

use App\Support\ProductCatalog;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Hiển thị trang chủ GreenTech.
     */
    public function index(): View
    {
        return view('home.index', [
            'featuredProducts' => array_slice(ProductCatalog::all(), 0, 6),
        ]);
    }

    /**
     * Danh sách sản phẩm (có lọc danh mục).
     */
    public function products(Request $request): View
    {
        $category = $request->query('category', 'all');
        $sort = $request->query('sort', 'newest');
        $sortOptions = ProductCatalog::sortOptions();

        if (! array_key_exists($sort, $sortOptions)) {
            $sort = 'newest';
        }

        $categories = ProductCatalog::categories();
        $categoryCounts = ProductCatalog::countByCategory();
        $products = ProductCatalog::byCategory($category === 'all' ? null : $category);
        $products = ProductCatalog::sort($products, $sort);

        return view('home.products', [
            'products' => $products,
            'categories' => $categories,
            'categoryCounts' => $categoryCounts,
            'activeCategory' => $category,
            'activeSort' => $sort,
            'sortOptions' => $sortOptions,
        ]);
    }

    /**
     * Chi tiết một sản phẩm theo slug.
     */
    public function productDetail(string $slug): View
    {
        $product = ProductCatalog::findBySlug($slug);

        if ($product === null) {
            abort(404);
        }

        return view('home.product-detail', [
            'product' => $product,
            'categoryLabel' => ProductCatalog::categoryLabel($product['category']),
            'relatedProducts' => ProductCatalog::related($product, 6),
        ]);
    }

    /**
     * Form liên hệ / lead (demo — lưu session).
     */
    public function submitLead(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:20'],
            'email' => ['nullable', 'email', 'max:255'],
            'crop_interest' => ['required', 'string', 'max:50'],
            'note' => ['nullable', 'string', 'max:1000'],
        ], [
            'name.required' => 'Vui lòng nhập họ tên.',
            'phone.required' => 'Vui lòng nhập số điện thoại.',
            'crop_interest.required' => 'Vui lòng chọn loại cây quan tâm.',
        ]);

        session()->push('leads', array_merge($validated, ['submitted_at' => now()->toDateTimeString()]));

        return redirect()
            ->to(route('home').'#lien-he')
            ->with('success', 'Cảm ơn bạn! Chúng tôi sẽ liên hệ sớm nhất.');
    }
}
