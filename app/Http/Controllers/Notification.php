<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Notification extends Controller
{
    public function show() {
        return view('dashboard.notifications', [
            'notify' => Auth::user()->unreadNotifications()->orderByDesc('notifications.created_at')->get(),
        ]);
    }

    public function viewNotification() {

    }

    public function markAsRead() {

    }

    public function markAllAsRead() {
        Auth::user()->unreadNotifications()->update(['read_at' => now()]);

        return view('dashboard.notifications');
    }
}
