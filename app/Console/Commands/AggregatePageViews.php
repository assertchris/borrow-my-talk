<?php

namespace App\Console\Commands;

use App\Topic;
use App\TopicPageView;
use Illuminate\Console\Command;

class AggregatePageViews extends Command
{
    protected $signature = 'borrow:aggregate-page-views';
    protected $description = 'Aggregate all page views per topic to save time when querying popular topics';

    public function handle()
    {
        Topic::all()->each(function ($topic) {
            $views = TopicPageView::where('topic_id', $topic->id)->count();

            $topic->page_views = $views;
            $topic->save();
        });
    }
}
