<?php

namespace App\Http\Controllers;

use App\Events\ReportTopicEvent;
use App\Topic;
use Illuminate\Http\Request;

class TopicReportsController extends Controller
{
    public function show(Topic $topic)
    {
        return view('topic-reports.show', [
            'topic' => $topic,
        ]);
    }

    public function send(Request $request, Topic $topic)
    {
        $request->validate([
            'reasons' => 'required',
        ]);

        event(new ReportTopicEvent(
            $topic,
            $request->input('reasons'),
            $request->input('links')
        ));

        return redirect('/');
    }
}
