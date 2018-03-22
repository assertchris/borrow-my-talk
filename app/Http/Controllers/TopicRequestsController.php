<?php

namespace App\Http\Controllers;

use App\Events\RequestTopicEvent;
use App\Topic;
use Illuminate\Http\Request;

class TopicRequestsController extends Controller
{
    public function show(Topic $topic)
    {
        return view('topic-requests.show', [
            'topic' => $topic,
        ]);
    }

    public function send(Request $request, Topic $topic)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'type' => 'required',
        ]);

        event(new RequestTopicEvent(
            $topic,
            $request->only([
                'name',
                'email',
                'type',
                'when',
                'additional',
                'wants-mentoring',
            ])
        ));

        return redirect()->route('topics.show', $topic);
    }
}
