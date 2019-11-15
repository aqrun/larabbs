<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topic;
use App\Models\Category;
use App\Models\User;
use App\Models\Link;

class CategoriesController extends Controller
{

    public function __construct()
    {
        config([self::MAIN_MENU => 2]);
    }

    public function show(Category $category, Request $request, User $user, Link $link)
    {
        $categoryIdToMenu = [1 => 2, 2 => 3, 3=>4, 4=>5];
        config([self::MAIN_MENU => $categoryIdToMenu[$category->id]]);

        $order = $request->order;
        $topics = Topic::withOrder($order)
            ->where('category_id', $category->id)
            ->with('user', 'category')
            ->paginate(20);

        $active_users = $user->getActiveUsers();
        $links = $link->getAllCached();

        return view('topics.index', compact('topics', 'category', 'order', 'active_users', 'links'));
    }

}
