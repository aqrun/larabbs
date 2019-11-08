<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topic;
use App\Models\Category;

class CategoriesController extends Controller
{

    public function __construct()
    {
        config([self::MAIN_MENU => 2]);
    }

    public function show(Category $category, Request $request)
    {
        $categoryIdToMenu = [1 => 2, 2 => 3, 3=>4, 4=>5];
        config([self::MAIN_MENU => $categoryIdToMenu[$category->id]]);

        $order = $request->order;
        $topics = Topic::withOrder($order)
            ->where('category_id', $category->id)
            ->with('user', 'category')
            ->paginate(20);
        return view('topics.index', compact('topics', 'category', 'order'));
    }

}