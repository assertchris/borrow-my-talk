<?php

namespace App\Http\Controllers;

use App\Mail\TopicReport;
use App\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ReportsController extends Controller
{
    public function show(Topic $topic)
    {
        return view('topic-reports.show', [
            'topic' => $topic,
        ]);
    }

    public function send(Request $request, Topic $topic)
    {
        $this->validate($request, [
            "reasons" => "required",
        ]);

        Mail::to(env("MAIL_TOPIC_REPORT_ADDRESS"))->send(new TopicReport(
            $topic,
            $request->input("reasons"),
            $request->input("links")
        ));

        return redirect('/');
    }
}
