<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topic;

class TopicsController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        $topics = Topic::all();
        return view('topics.index', compact('topics'));
    }

}
