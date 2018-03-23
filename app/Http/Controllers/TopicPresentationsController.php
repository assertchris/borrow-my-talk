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
        $request->validate([
            'medium' => 'required',
            'medium-other' => 'required_if:medium,other',
            'name' => 'required',
            'year' => 'required|numeric',
            'month' => 'nullable|numeric',
            'was-enjoyed' => 'nullable|boolean',
            'was-first-time-presenting-topic' => 'nullable|boolean',
        ]);

        $medium = $request->input('medium');

        if ($medium === 'other') {
            $medium = $request->input('medium-other');
        }

        TopicPresentation::create([
            'medium' => $medium,
            'name' => $request->input('name'),
            'year' => $request->input('year'),
            'month' => $request->input('month'),
            'additional' => $request->input('additional'),
            'was_enjoyed' => $request->has('was-enjoyed'),
            'was_first_time_presenting_topic' => $request->has('was-first-time-presenting-topic'),
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
        $request->validate([
            'medium' => 'required',
            'medium-other' => 'required_if:medium,other',
            'name' => 'required',
            'year' => 'required|numeric',
            'month' => 'nullable|numeric',
            'was-enjoyed' => 'nullable|boolean',
            'was-first-time-presenting-topic' => 'nullable|boolean',
        ]);

        $medium = $request->input('medium');

        if ($medium === 'other') {
            $medium = $request->input('medium-other');
        }

        $presentation->medium = $medium;
        $presentation->name = $request->input('name');
        $presentation->year = $request->input('year');
        $presentation->month = $request->input('month');
        $presentation->additional = $request->input('additional');
        $presentation->was_enjoyed = $request->has('was-enjoyed');
        $presentation->was_first_time_presenting_topic = $request->has('was-first-time-presenting-topic');
        $presentation->save();

        return redirect()->route('topics.presentations.index', [$topic]);
    }

    public function destroy(Topic $topic, TopicPresentation $presentation)
    {
        $presentation->delete();

        return redirect()->route('topics.presentations.index', [$topic]);
    }
}
