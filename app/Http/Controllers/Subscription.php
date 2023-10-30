<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Subscription extends Controller
{
    public function billingPortal(Request $request) {
        if(!$request->user()->hasStripeId())
        {
            $request->user()->createAsStripeCustomer([
                'email' => $request->user()->email,
                'name' => $request->user()->name
            ]);
        }
        if($request->user()->subscribed('default'))
        {
            return $request->user()->redirectToBillingPortal(route('dashboard'));
        }
        return redirect(route('pricing'));
    }
}
