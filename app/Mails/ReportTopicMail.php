<?php

namespace App\Mails;

use App\Topic;
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

    public function __construct(Topic $topic, string $reasons, string $links = null)
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
            ->markdown('mails.topics.report', [
                'topic' => $this->topic,
                'reasons' => $this->reasons,
                'links' => $this->links,
            ]);
    }
}
