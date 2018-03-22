<?php

namespace App\Listeners;

use App\Events\RequestTopicEvent;
use App\Mails\RequestTopicMailToPresenter;
use App\Mails\RequestTopicMailToRequester;
use App\TopicRequest;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class RequestTopicListener implements ShouldQueue
{
    use InteractsWithQueue;

    public function handle(RequestTopicEvent $event)
    {
        $data = collect($event->data);

        Mail::send(new RequestTopicMailToPresenter(
            $event->topic,
            $event->data
        ));
        
        Mail::send(new RequestTopicMailToRequester(
            $event->topic,
            $event->data
        ));

        TopicRequest::create([
            'name' => $data->get('name'),
            'email' => $data->get('email'),
            'type' => $data->get('type'),
            'when' => $data->get('when'),
            'additional' => $data->get('additional'),
            'wants_mentoring' => $data->has('wants-mentoring'),
            'topic_id' => $event->topic->id,
        ]);
    }
}
