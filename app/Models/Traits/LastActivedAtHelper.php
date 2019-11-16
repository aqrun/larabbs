<?php
namespace App\Models\Traits;

use Redis;
use Carbon\Carbon;

trait LastActivedAtHelper
{
    // cache
    protected $has_prefix = 'larabbs_last_actived_at_';
    protected $field_prefix = 'user_';

    public function recordLastActivedAt()
    {
        // today date
        $date = Carbon::now()->toDateString();

        // redis hash map key name
        $hash = $this->hash_prefix . $date;
        //field name e.g. user_1
        $field = $this->field_prefix .$this->id;

        //\Log::info(Redis::hGetAll($hash));

        // current date time e.g.: 2017-10-21 08:35:15
        $now = Carbon::now()->toDateTimeString();

        // save to redis, if exists will update
        Redis::hSet($hash, $field, $now);
    }

    public function syncUserActivedAt()
    {
        // get yesterday date
        $yesterday_date = Carbon::yesterday()->toDateString();
        //$yesterday_date = Carbon::now()->toDateString()

        // Redis hash name e.g larabbs_last_actived_at_2017-10-21
        $hash = $this->hash_prefix . $yesterday_date;

        // get all data
        $dates = Redis::hGetAll($hash);

        // sync to database
        foreach($dates as $user_id=>$actived_at) {
            $user_id = str_replace($this->field_prefix, '', $user_id);
            // user exists
            if($user = $this->find($user_id)) {
                $user->last_actived_at = $actived_at;
                $user->save();
            }
        }

        // already synced data delete from Redis
        Redis::del($hash);

    }

    public function getLastActivedAtAttribute($value)
    {
        $date = Carbon::now()->toDateString();
        $hash = $this->hash_prefix . $date;
        $field = $this->field_prefix . $this->id;
        // get redis data first else get data from database
        $datetime = Redis::hGet($hash, $field) ?: $value;

        if($datetime) {
            return new Carbon($datetime);
        } else {
            // use user register time
            return $this->created_at;
        }
    }

}
