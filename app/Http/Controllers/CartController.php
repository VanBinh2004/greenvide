<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Support\ProductCatalog;

class CartController extends Controller
{
    /**
     * Display cart page
     */
    public function index()
    {
        $cart = session()->get('cart', []);
        $cartItems = [];
        $subtotal = 0;

        foreach ($cart as $productId => $item) {
            $product = ProductCatalog::findBySlug($productId);
            $quantity = $item['quantity'] ?? 1;

            if ($product) {
                $total = $product['price'] * $quantity;
                $subtotal += $total;
            } else {
                $total = 0;
            }

            $cartItems[] = [
                'id' => $productId,
                'quantity' => $quantity,
                'product' => $product ?? [
                    'slug' => $productId,
                    'name' => 'Sản phẩm #' . $productId,
                    'price' => 0,
                    'price_formatted' => 'Liên hệ',
                    'short_desc' => '',
                    'image' => 'https://via.placeholder.com/150?text=SP',
                ],
                'total' => $total,
            ];
        }

        return view('cart.index', compact('cartItems', 'subtotal'));
    }

    /**
     * Add item to cart
     */
    public function add(Request $request)
    {
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity', 1);

        $cart = session()->get('cart', []);

        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] += $quantity;
        } else {
            $cart[$productId] = [
                'id' => $productId,
                'quantity' => $quantity,
            ];
        }

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Đã thêm vào giỏ hàng thành công.');
    }

    /**
     * Update cart item quantity
     */
    public function update(Request $request, $productId)
    {
        $quantity = $request->input('quantity', 1);

        $cart = session()->get('cart', []);

        if (isset($cart[$productId])) {
            if ($quantity <= 0) {
                unset($cart[$productId]);
            } else {
                $cart[$productId]['quantity'] = $quantity;
            }
        }

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Giỏ hàng đã được cập nhật');
    }

    /**
     * Remove item from cart
     */
    public function remove($productId)
    {
        $cart = session()->get('cart', []);

        unset($cart[$productId]);

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Sản phẩm đã được xóa khỏi giỏ hàng');
    }

    /**
     * Clear entire cart
     */
    public function clear()
    {
        session()->forget('cart');

        return redirect()->back()->with('success', 'Giỏ hàng đã được xóa');
    }
}
