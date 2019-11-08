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

    public function index()
    {
        $topics = Topic::with(['user', 'category'])->paginate(30);
        return view('topics.index', compact('topics'));
    }

}
