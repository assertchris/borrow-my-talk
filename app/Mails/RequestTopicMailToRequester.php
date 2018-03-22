<?php

namespace App\Mails;

use App\Topic;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class RequestTopicMailToRequester extends Mailable
{
    use Queueable;
    use SerializesModels;

    public $topic;
    public $data;

    public function __construct(Topic $topic, array $data)
    {
        $this->topic = $topic;
        $this->data = $data;
    }

    public function build()
    {
        return $this
            ->subject($this->topic->name . ' requested from ' . $this->topic->user->name)
            ->to($this->data['email'])
            ->markdown('mails.topics.request-to-requester', [
                'topic' => $this->topic,
                'data' => $this->data,
            ]);
    }
}
