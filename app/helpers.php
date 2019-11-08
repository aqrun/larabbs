<?php

function route_class()
{
    return str_replace('.', '-', Route::currentRouteName());
}

function main_menu()
{
    return [
        1=>['id' => 1, 'name' => '话题', 'href' => '/topics'],
        2=>['id' => 2, 'name' => '分享', 'href' => '/categories/1'],
        3=>['id' => 3, 'name' => '教程', 'href' => '/categories/2'],
        4=>['id' => 4, 'name' => '问答', 'href' => '/categories/3'],
        5=>['id' => 5, 'name' => '公告', 'href' => '/categories/4'],
    ];
}