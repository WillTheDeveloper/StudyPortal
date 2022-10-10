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
                ->get()
        ]);
    }

    public function product($slug)
    {
        return view('product', [
            'item' => Product::query()->firstWhere('slug', $slug)
        ]);
    }
}
