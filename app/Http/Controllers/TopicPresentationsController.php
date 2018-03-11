<?php

namespace App\Http\Controllers;

use App\Topic;
use App\TopicPresentation;
use Illuminate\Http\Request;

class TopicPresentationsController extends Controller
{
    public function index(Topic $topic)
    {
        return view('topic-presentations.index', [
            'topic' => $topic,
            'presentations' => $topic->presentations,
        ]);
    }

    public function create(Topic $topic)
    {
        return view('topic-presentations.create', [
            'topic' => $topic,
        ]);
    }

    public function store(Request $request, Topic $topic)
    {
        $this->validate($request, [
            'medium' => 'required',
            'name' => 'required',
            'year' => 'required|numeric',
            'month' => 'nullable|numeric',
            'was-enjoyed' => 'nullable|boolean',
            'was-first-time-presenting-topic' => 'nullable|boolean',
        ]);

        TopicPresentation::create([
            'medium' => $request->input('medium'),
            'name' => $request->input('name'),
            'year' => $request->input('year'),
            'month' => $request->input('month'),
            'additional' => $request->input('additional'),
            'was_enjoyed' => $request->input('was-enjoyed') ? true : false,
            'was_first_time_presenting_topic' => $request->input('was-first-time-presenting-topic') ? true : false,
            'topic_id' => $topic->id,
        ]);

        return redirect()->route('topics.presentations.index', [$topic]);
    }

    public function edit(Topic $topic, TopicPresentation $presentation)
    {
        return view('topic-presentations.edit', [
            'topic' => $topic,
            'presentation' => $presentation,
        ]);
    }

    public function update(Request $request, Topic $topic, TopicPresentation $presentation)
    {
        $presentation->medium = $request->input('medium');
        $presentation->name = $request->input('name');
        $presentation->year = $request->input('year');
        $presentation->month = $request->input('month');
        $presentation->additional = $request->input('additional');
        $presentation->was_enjoyed = $request->input('was-enjoyed') ? true : false;
        $presentation->was_first_time_presenting_topic = $request->input('was-first-time-presenting-topic') ? true : false;
        $presentation->save();

        return redirect()->route('topics.presentations.index', [$topic]);
    }

    public function destroy(Topic $topic, TopicPresentation $presentation)
    {
        $presentation->delete();

        return redirect()->route('topics.presentations.index', [$topic]);
    }
}
