<?php

namespace App\Mails;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ReportTopicMail extends Mailable
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
        return $this
            ->subject('Topic reported')
            ->to(config('mail.report-topic-to'))
            ->view('mails.topics.report', [
                'topic' => $this->topic,
                'reasons' => $this->reasons,
                'links' => $this->links,
            ]);
    }
}
