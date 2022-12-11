<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;

class Shop extends Controller
{
    public function view()
    {
        return view('shop', [
            'items' => Product::query()
                ->where('active', true)
                ->paginate(20)
        ]);
    }

    public function product($slug)
    {
        return view('product', [
            'item' => Product::query()->firstWhere('slug', $slug),
            'reviews' => Review::query()->where('product_id', Product::query()->where('slug', $slug)->first()->id)->get()
        ]);
    }

    public function manage()
    {
        return view('shopmanagement', [
            'items' => Product::query()->orderBy('name')->paginate(10)
        ]);
    }
}
