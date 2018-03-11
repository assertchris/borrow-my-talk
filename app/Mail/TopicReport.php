<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class TopicReport extends Mailable
{
    use Queueable;
    use SerializesModels;

    public $topic;
    public $reasons;
    public $links;

    public function __construct($topic, $reasons, $links)
    {
        $this->topic = $topic;
        $this->reasons = $reasons;
        $this->links = $links;
    }

    public function build()
    {
        return $this->view('mails.topics.report', [
            'topic' => $this->topic,
            'reasons' => $this->reasons,
            'links' => $this->links,
        ]);
    }
}
