<?php

use App\Models\User;

return [

    'title' => '用户',
    'heading' => '用户管理',
    'single' => '用户',
    'model' => User::class,

    'columns' => [
        'id' => [
            'title' => 'ID'
        ],
        'name' => [
            'title' => '姓名',
        ],
        'email' => [
            'title' => '邮箱'
        ],
        'created_at',

        'operation' => [
            'title'  => '管理',
            'output' => function ($value, $model) {
                return $value;
            },
            'sortable' => false,
        ],
    ],

    'edit_fields' => [
        'name' => [
            'title' => '姓名',
            'type' => 'text'
        ],
        'email' => [
            'title' => '邮箱',
            'type' => 'text'
        ],
        'introduction' => [
            'title' => '简介',
            'type' => 'textarea'
        ]
    ],

    'filters' => [
        'title' => [
            'title' => '标题',
        ]
    ],

];