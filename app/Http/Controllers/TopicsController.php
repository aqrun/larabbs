<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topic;

class TopicsController extends Controller
{
    public function __construct()
    {
        config([self::MAIN_MENU => 1]);
    }

    public function index(Request $request, Topic $topic)
    {
        $order = $request->order;
        $topics = Topic::withOrder($order)
            ->with(['user', 'category'])
            ->paginate(20);
        return view('topics.index', compact('topics', 'order'));
    }

}
