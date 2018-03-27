<?php

namespace App\Http\Controllers;

use App\Topic;
use App\TopicPageView;
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

    public function show(Request $request, Topic $topic)
    {
        $this->track($request, $topic);

        return view('topics.show', [
            'topic' => $topic,
        ]);
    }

    private function track(Request $request, Topic $topic)
    {
        $ip = $request->ip();

        if ($ip !== '127.0.0.1') {
            $location =  geoip()->getLocation($ip);

            if (isset($location["country"])) {
                $country = $location["country"];
                $browser = $request->userAgent();

                TopicPageView::create([
                    'country' => $country,
                    'browser' => $browser,
                    'topic_id' => $topic->id,
                ]);
            }
        }
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
        $request->validate([
            'name' => 'required',
            'abstract' => 'required',
            'includes-mentoring' => 'nullable|boolean',
            'willing-to-present' => 'nullable|boolean',
        ]);

        $topic = Topic::create([
            'name' => $request->input('name'),
            'abstract' => $request->input('abstract'),
            'additional' => $request->input('additional'),
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
        $request->validate([
            'name' => 'required',
            'abstract' => 'required',
            'includes-mentoring' => 'nullable|boolean',
            'willing-to-present' => 'nullable|boolean',
        ]);
        
        $topic->name = $request->input('name');
        $topic->abstract = $request->input('abstract');
        $topic->additional = $request->input('additional');
        $topic->includes_mentoring = $request->has('includes-mentoring');
        $topic->willing_to_present = $request->has('willing-to-present');
        $topic->save();

        return redirect()->route('topics.index');
    }

    public function destroy(Topic $topic)
    {
        $topic->delete();

        return redirect()->route('topics.index');
    }
}
