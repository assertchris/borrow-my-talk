<?php

namespace App\Http\Controllers;

use App\Topic;
use App\TopicLink;
use Illuminate\Http\Request;

class TopicLinksController extends Controller
{
    public function index(Topic $topic)
    {
        return view('topic-links.index', [
            'topic' => $topic,
            'links' => $topic->links,
        ]);
    }

    public function create(Topic $topic)
    {
        return view('topic-links.create', [
            'topic' => $topic,
        ]);
    }

    public function store(Request $request, Topic $topic)
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

        TopicLink::create([
            'type' => $type,
            'link' => $request->input('link'),
            'topic_id' => $topic->id,
        ]);

        return redirect()->route('topics.links.index', [$topic]);
    }

    public function edit(Topic $topic, TopicLink $link)
    {
        return view('topic-links.edit', [
            'topic' => $topic,
            'link' => $link,
        ]);
    }

    public function update(Request $request, Topic $topic, TopicLink $link)
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

        return redirect()->route('topics.links.index', [$topic]);
    }

    public function destroy(Topic $topic, TopicLink $link)
    {
        $link->delete();

        return redirect()->route('topics.links.index', [$topic]);
    }
}
