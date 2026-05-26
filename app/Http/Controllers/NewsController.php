<?php

namespace App\Http\Controllers;

use App\Support\NewsCatalog;
use Illuminate\Http\Request;
use Illuminate\View\View;

class NewsController extends Controller
{
    /**
     * Danh sách tin tức (có lọc danh mục).
     */
    public function index(Request $request): View
    {
        $category = $request->query('category', 'all');
        $categories = NewsCatalog::categories();
        $categoryCounts = NewsCatalog::countByCategory();
        $articles = NewsCatalog::byCategory($category === 'all' ? null : $category);

        return view('home.news', [
            'articles' => $articles,
            'categories' => $categories,
            'categoryCounts' => $categoryCounts,
            'activeCategory' => $category,
        ]);
    }

    /**
     * Chi tiết một bài viết theo slug.
     */
    public function show(string $slug): View
    {
        $article = NewsCatalog::findBySlug($slug);

        if ($article === null) {
            abort(404);
        }

        return view('home.news-detail', [
            'article' => $article,
            'categoryLabel' => NewsCatalog::categoryLabel($article['category']),
            'relatedArticles' => NewsCatalog::related($article, 4),
        ]);
    }
}
