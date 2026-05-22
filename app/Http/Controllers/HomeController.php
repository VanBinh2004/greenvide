<?php

namespace App\Http\Controllers;

use App\Support\ProductCatalog;
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
        $categories = ProductCatalog::categories();
        $products = ProductCatalog::byCategory($category === 'all' ? null : $category);

        return view('home.products', [
            'products' => $products,
            'categories' => $categories,
            'activeCategory' => $category,
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
            'relatedProducts' => ProductCatalog::related($product),
        ]);
    }
}
