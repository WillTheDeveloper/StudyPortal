<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Notification extends Controller
{
    public function show() {
        return view('notifications', [
            'notify' => auth()->user()->notifications()->get(),
        ]);
    }

    public function viewNotification() {

    }

    public function markAsRead() {

    }

    public function markAllAsRead() {
        auth()->user()->notifications()->update(['read_at' => now()]);

        return view('notifications');
    }
}
