<?php
namespace App\Models\Traits;

use Redis;
use Carbon\Carbon;

trait LastActivedAtHelper {
    // 缓存相当
    protected $hash_prefix = 'larabbs_last_actived_at_';
    protected $field_prefix = 'user_';

    public function recordLastActivedAt(){
        // 获取今天的时间
        $date = Carbon::now()->toDateString();

        // Redis hash命名如： larabbs_last_actived_at_2017-10-21
        $hash = $this->hash_prefix . $date;

        // 字段名如 user_1
        $field = $this->field_prefix . $this->id;

        // 当前时间 2017-10-21 08:35:15
        $now = Carbon::now()->toDateTimeString();

        // 数据写入redis 字段已存在会被更新
        Redis::hSet($hash, $field, $now);
    }
}
