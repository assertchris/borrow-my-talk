<?php

namespace App\Mails;

use App\Topic;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class RequestTopicMailToPresenter extends Mailable
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
            ->subject($this->topic->name . ' requested by ' . $this->data['name'])
            ->to($this->topic->user->email)
            ->markdown('mails.topics.request-to-presenter', [
                'topic' => $this->topic,
                'data' => $this->data,
            ]);
    }
}
