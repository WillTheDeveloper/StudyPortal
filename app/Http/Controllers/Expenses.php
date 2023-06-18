<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Category;
use App\Models\Income;
use App\Models\Purchase;
use Carbon\Carbon;
use Illuminate\Http\Request;

class Expenses extends Controller
{
    public function overview()
    {
        $thismonth = Carbon::today()->month;
        $lastmonth = Carbon::today()->subRealMonth()->month;

        return view('expenses.overview', [
            'spendthismonth' => $spend = Purchase::query()
                ->whereMonth('purchased', '=', $thismonth)
                ->sum('cost'),
            'spendlastmonth' => $last = Purchase::query()
                ->whereMonth('purchased', '=', $lastmonth)
                ->sum('cost'),
            'totalincome' => $income = Income::query()
                ->whereMonth('paid', '=', $thismonth)
                ->sum('amount'),
            'remaining' => $income - $spend,
            'diffinspend' => $spend > 0 & $last > 0 ? round($spend / $last * 100, 2) : 0,
            'categories' => Category::query()
                ->where('user_id', auth()->id())
                ->orderByDesc('title')
                ->whereRelation('Purchase', 'cost', '>', 0)
                ->get()
        ]);
    }

    public function addincome()
    {
        return view('expenses.addincome', [
            'cards' => Card::query()
                ->where('user_id', auth()->id())
                ->where('active', true)
                ->get()
        ]);
    }

    public function saveincome(Request $request)
    {
        Income::query()->create([
            'amount' => $request->input('amount'),
            'paid' => $request->input('paid'),
            'card_id' => $request->input('card'),
            'user_id' => auth()->id()
        ])->save();

        return redirect(route('expense.overview'));
    }

    public function addpurchase()
    {
        return view('expenses.addpurchase', [
            'cards' => Card::query()->where('user_id', auth()->id())->where('active', true)->get(),
            'categories' => Category::query()->where('user_id', auth()->id())->orderByDesc('title')->get(),
            'today' => Carbon::today()->toDateString()
        ]);
    }

    public function savepurchase(Request $request)
    {
        Purchase::query()->create(
            [
                'product' => $request->input('product'),
                'description' => $request->input('description'),
                'cost' => $request->input('price'),
                'category_id' => $request->input('category'),
                'card_id' => $request->input('card'),
                'user_id' => auth()->id(),
                'purchased' => $request->date('purchased')
            ]
        )->save();

        return redirect(route('expense.overview'));
    }

    public function managecategories()
    {
        return view('expenses.categories', [
            'categories' => Category::query()->where('user_id', auth()->id())->orderByDesc('title')->paginate(10),
        ]);
    }

    public function category($id)
    {
        return view('expenses.category', [
            'category' => Category::query()->find($id)
        ]);
    }

    public function addcategory()
    {
        return view('expenses.addcategory');
    }

    public function deletecategory($id)
    {
        Category::query()->find($id)->delete();
        Purchase::query()->where('category_id', $id)->delete();

        return redirect(route('expenses.categories'));
    }

    public function savecategory()
    {

    }
}
