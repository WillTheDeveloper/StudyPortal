<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function view()
    {
        return view('shop.view', [
            'items' => Product::query()
                ->where('active', true)
                ->paginate(20)
        ]);
    }

    public function product($slug)
    {
        $product = Product::query()->where('slug', $slug)->first();
        return view('shop.product', [
            'item' => $product,
            'reviews' => Review::query()->where('product_id', $product->id)->get()
        ]);
    }

    public function manage()
    {
        return view('shop.manage', [
            'items' => Product::query()->orderBy('name')->paginate(10)
        ]);
    }
}
