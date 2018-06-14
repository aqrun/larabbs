<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class NotificationsController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index(){

        //标记为已读 未读数据清零
        Auth::user()->markAsRead();

        //获取登录用户所有通知
        $notifications = Auth::user()->notifications()->paginate(20);
        return view('notifications.index', compact('notifications'));
    }
}
