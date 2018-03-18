<?php

namespace App\Events;

use App\Topic;
use Illuminate\Queue\SerializesModels;

class ReportTopicEvent
{
    use SerializesModels;

    public $topic;
    public $reasons;
    public $links;

    public function __construct(Topic $topic, string $reasons, string $links = null)
    {
        $this->topic = $topic;
        $this->reasons = $reasons;
        $this->links = $links;
    }
}
