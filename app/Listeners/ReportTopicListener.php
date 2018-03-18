<?php

namespace App\Listeners;

use App\Events\ReportTopicEvent;
use App\Mails\ReportTopicMail;
use App\TopicReport;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class ReportTopicListener implements ShouldQueue
{
    use InteractsWithQueue;

    public function handle(ReportTopicEvent $event)
    {
        Mail::send(new ReportTopicMail(
            $event->topic,
            $event->reasons,
            $event->links
        ));

        TopicReport::create([
            'reasons' => $event->reasons,
            'links' => $event->links,
            'topic_id' => $event->topic->id,
        ]);
    }
}
