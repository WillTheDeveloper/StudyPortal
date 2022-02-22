<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Notification extends Controller
{
    public function show() {
        return view('notifications', [
            'notify' => auth()->user()->unreadNotifications()
        ]);
    }
}
