<?php

namespace App\Observers;

use App\Models\Reply;
use App\Notifications\TopicReplied;

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
        //\Log::info('reply create');
        $reply->topic->updateReplyCount();
        //$reply->topic->increment('reply_count', 1);

        // notify topic author has new comment
        $reply->topic->user->notify(new TopicReplied($reply));
    }

    /**
     * Handle the reply "deleted" event.
     *
     * @param  \App\Models\Reply  $reply
     * @return void
     */
    public function deleted(Reply $reply)
    {
        $reply->topic->updateReplyCount();
    }


}
