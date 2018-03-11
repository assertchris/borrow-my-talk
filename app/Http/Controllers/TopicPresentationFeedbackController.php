<?php

namespace App\Http\Controllers;

use App\Topic;
use App\TopicPresentation;
use App\TopicPresentationFeedback;
use Illuminate\Http\Request;

class TopicPresentationFeedbackController extends Controller
{
    public function index(Topic $topic, TopicPresentation $presentation)
    {
        return view('topic-presentation-feedback.index', [
            'topic' => $topic,
            'presentation' => $presentation,
            'feedback' => $presentation->feedback,
        ]);
    }

    public function create(Topic $topic, TopicPresentation $presentation)
    {
        return view('topic-presentation-feedback.create', [
            'topic' => $topic,
            'presentation' => $presentation,
        ]);
    }

    public function store(Request $request, Topic $topic, TopicPresentation $presentation)
    {
        $this->validate($request, [
            'link' => 'required|url'
        ]);

        TopicPresentationFeedback::create([
            'link' => $request->input('link'),
            'topic_presentation_id' => $presentation->id,
        ]);

        return redirect()->route('topics.presentations.feedback.index', [$topic, $presentation]);
    }

    public function edit(Topic $topic, TopicPresentation $presentation, TopicPresentationFeedback $feedback)
    {
        return view('topic-presentation-feedback.edit', [
            'topic' => $topic,
            'presentation' => $presentation,
            'feedback' => $feedback,
        ]);
    }

    public function update(Request $request, Topic $topic, TopicPresentation $presentation, TopicPresentationFeedback $feedback)
    {
        $this->validate($request, [
            'link' => 'required|url'
        ]);

        $feedback->link = $request->input('link');
        $feedback->save();

        return redirect()->route('topics.presentations.feedback.index', [$topic, $presentation]);
    }

    public function destroy(Topic $topic, TopicPresentation $presentation, TopicPresentationFeedback $feedback)
    {
        $feedback->delete();

        return redirect()->route('topics.presentations.feedback.index', [$topic, $presentation]);
    }
}
