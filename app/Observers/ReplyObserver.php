<?php

namespace App\Observers;

use App\Models\Reply;

class ReplyObserver
{


    public function creating(Reply $reply)
    {
        $reply->content = clean($reply->content, 'user_topic_body');
    }

    /**
     * Handle the reply "created" event.
     *
     * @param  \App\Models\Reply  $reply
     * @return void
     */
    public function created(Reply $reply)
    {
        \Log::info('reply create');
        $reply->topic->reply_count = $reply->topic->replies->count();
        $reply->topic->save();
        //$reply->topic->increment('reply_count', 1);
    }

    /**
     * Handle the reply "deleted" event.
     *
     * @param  \App\Models\Reply  $reply
     * @return void
     */
    public function deleted(Reply $reply)
    {
        //
    }


}
