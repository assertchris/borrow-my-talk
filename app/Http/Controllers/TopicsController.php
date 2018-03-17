<?php

namespace App\Http\Controllers;

use App\Topic;
use Illuminate\Http\Request;

class TopicsController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->get('query');
        $limit = config('borrow.topics.limits.search');

        if (empty($query)) {
            $topics = Topic::orderBy("created_at", "desc")->paginate($limit);
        } else {
            $topics = Topic::search($query)->orderBy("created_at", "desc")->paginate($limit);
        }

        return view('topics.search', [
            'query' => $query,
            'topics' => $topics,
        ]);
    }

    public function show(Topic $topic)
    {
        return view('topics.show', [
            'topic' => $topic,
        ]);
    }

    public function index()
    {
        $limit = config('borrow.topics.limits.index');

        return view('topics.index', [
            'topics' => auth()->user()->everyTopic($limit),
        ]);
    }

    public function create()
    {
        return view('topics.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'abstract' => 'required',
            'slides' => 'nullable|url',
            'video' => 'nullable|url',
            'includes-mentoring' => 'nullable|boolean',
            'willing-to-present' => 'nullable|boolean',
        ]);

        $topic = Topic::create([
            'name' => $request->input('name'),
            'abstract' => $request->input('abstract'),
            'additional' => $request->input('additional'),
            'slides' => $request->input('slides'),
            'video' => $request->input('video'),
            'includes_mentoring' => $request->input('includes-mentoring') ? true : false,
            'willing_to_present' => $request->input('willing-to-present') ? true : false,
            'includes_mentoring' => $request->has('includes-mentoring'),
            'willing_to_present' => $request->has('willing-to-present'),
            'user_id' => auth()->user()->id,
        ]);

        return redirect()->route('topics.index');
    }

    public function edit(Topic $topic)
    {
        return view('topics.edit', [
            'topic' => $topic,
        ]);
    }

    public function update(Request $request, Topic $topic)
    {
        $this->validate($request, [
            'name' => 'required',
            'abstract' => 'required',
            'slides' => 'nullable|url',
            'video' => 'nullable|url',
            'includes-mentoring' => 'nullable|boolean',
            'willing-to-present' => 'nullable|boolean',
        ]);
        
        $topic->name = $request->input('name');
        $topic->abstract = $request->input('abstract');
        $topic->additional = $request->input('additional');
        $topic->slides = $request->input('slides');
        $topic->video = $request->input('video');
        $topic->includes_mentoring = $request->input('includes-mentoring') ? true : false;
        $topic->willing_to_present = $request->input('willing-to-present') ? true : false;
        $topic->save();

        return redirect()->route('topics.index');
    }

    public function destroy(Topic $topic)
    {
        $topic->delete();

        return redirect()->route('topics.index');
    }
}
