<?php
namespace App\Models\Traits;

trait ActiveUserHelper
{
    //用于存放临时用户数据
    protected $users = [];

    // 配置信息
    protected $topic_weight = 4; //话题权重
    protected $reply_weight = 1;
    protected $pass_days = 7;
    protected $user_number = 6;

    // 缓存相关配置
    protected $cache_key = 'larabbs_active_usersk'
}