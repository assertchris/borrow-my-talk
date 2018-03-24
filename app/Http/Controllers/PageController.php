<?php

namespace App\Http\Controllers;

use App\Topic;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function landing()
    {
        $newest = Topic::latest()->take(3)->get();
        $popular = Topic::orderBy('page_views', 'desc')->take(3)->get();
        $requested = collect([/* todo */]);

        return view('landing', [
            'newest' => $newest,
            'popular' => $popular,
            'requested' => $requested,
        ]);
    }
}
