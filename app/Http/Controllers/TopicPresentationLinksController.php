<?php

namespace App\Http\Controllers;

use App\Topic;
use App\TopicPresentation;
use App\TopicPresentationLink;
use Illuminate\Http\Request;

class TopicPresentationLinksController extends Controller
{
    public function index(Topic $topic, TopicPresentation $presentation)
    {
        return view('topic-presentation-links.index', [
            'topic' => $topic,
            'presentation' => $presentation,
            'links' => $presentation->links,
        ]);
    }

    public function create(Topic $topic, TopicPresentation $presentation)
    {
        return view('topic-presentation-links.create', [
            'topic' => $topic,
            'presentation' => $presentation,
        ]);
    }

    public function store(Request $request, Topic $topic, TopicPresentation $presentation)
    {
        $request->validate([
            'type' => 'required',
            'type-other' => 'required_if:type,other',
            'link' => 'required|url',
        ]);

        $type = $request->input('type');

        if ($type === 'other') {
            $type = $request->input('type-other');
        }

        TopicPresentationLink::create([
            'type' => $type,
            'link' => $request->input('link'),
            'topic_presentation_id' => $presentation->id,
        ]);

        return redirect()->route('topics.presentations.links.index', [$topic, $presentation]);
    }

    public function edit(Topic $topic, TopicPresentation $presentation, TopicPresentationLink $link)
    {
        return view('topic-presentation-links.edit', [
            'topic' => $topic,
            'presentation' => $presentation,
            'link' => $link,
        ]);
    }

    public function update(Request $request, Topic $topic, TopicPresentation $presentation, TopicPresentationLink $link)
    {
        $request->validate([
            'type' => 'required',
            'type-other' => 'required_if:type,other',
            'link' => 'required|url',
        ]);

        $type = $request->input('type');

        if ($type === 'other') {
            $type = $request->input('type-other');
        }

        $link->type = $type;
        $link->link = $request->input('link');
        $link->save();

        return redirect()->route('topics.presentations.links.index', [$topic, $presentation]);
    }

    public function destroy(Topic $topic, TopicPresentation $presentation, TopicPresentationLink $link)
    {
        $link->delete();

        return redirect()->route('topics.presentations.links.index', [$topic, $presentation]);
    }
}
