<?php

namespace App\Observers;

use App\Models\Topic;
//use App\Handlers\SlugTranslateHandler;
use App\Jobs\TranslateSlug;

class TopicObserver
{

    public function saving(Topic $topic)
    {
        $topic->body = clean($topic->body, 'user_topic_body');
        $topic->excerpt = make_excerpt($topic->body);


    }

    public function saved(Topic $topic)
    {
        if (!$topic->slug) {
            /*
              $topic->slug = app(SlugTranslateHandler::class)
              ->translate($topic->title);
            */
            dispatch(new TranslateSlug($topic));
        }
    }

    /**
     * Handle the topic "created" event.
     *
     * @param  \App\Topic  $topic
     * @return void
     */
    public function created(Topic $topic)
    {
        //
    }

    /**
     * Handle the topic "updated" event.
     *
     * @param  \App\Topic  $topic
     * @return void
     */
    public function updated(Topic $topic)
    {
        //
    }

    /**
     * Handle the topic "deleted" event.
     *
     * @param  \App\Topic  $topic
     * @return void
     */
    public function deleted(Topic $topic)
    {
        \DB::table('replies')->where('topic_id', $topic->id)->delete();
    }

    /**
     * Handle the topic "restored" event.
     *
     * @param  \App\Topic  $topic
     * @return void
     */
    public function restored(Topic $topic)
    {
        //
    }

    /**
     * Handle the topic "force deleted" event.
     *
     * @param  \App\Topic  $topic
     * @return void
     */
    public function forceDeleted(Topic $topic)
    {
        //
    }
}
