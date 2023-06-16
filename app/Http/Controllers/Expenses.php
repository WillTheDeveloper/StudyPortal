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

        return view('expenses.overview', [
            'spendthismonth' => $spend = Purchase::query()
                ->whereMonth('purchased', '=', $thismonth)
                ->sum('cost'),
            'totalincome' => $income = Income::query()
                ->whereMonth('paid', '=', $thismonth)
                ->sum('amount'),
            'remaining' => $income - $spend,
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
        return view('expenses.addpurchase');
    }

    public function savepurchase()
    {

    }

    public function managecategories()
    {
        return view('expenses.categories');
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

    public function savecategory()
    {

    }
}
