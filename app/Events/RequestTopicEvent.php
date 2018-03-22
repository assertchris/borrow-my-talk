<?php

namespace App\Events;

use App\Topic;
use Illuminate\Queue\SerializesModels;

class RequestTopicEvent
{
    use SerializesModels;

    public $topic;
    public $data;

    public function __construct(Topic $topic, array $data)
    {
        $this->topic = $topic;
        $this->data = $data;
    }
}
