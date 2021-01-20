<?php

namespace App\Http\Controllers;


class NotificationsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function __invoke()
    {
        $notifications = auth()->user()->unreadNotifications;

        $notifications->markAsRead();

        return view('components.user-notifications', [
            'notifications' => $notifications
        ]);
    }
}
