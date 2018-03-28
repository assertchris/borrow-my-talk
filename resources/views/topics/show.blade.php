@extends('layouts.page')

@section('page.content')
<div class="container">
    <div class="flex">
        <div class="w-full md:w-3/5 bg-white p-6 md:p-8 border-t-4 border-blue-light">
            <div class="flex md:items-center flex-col md:flex-row mb-6">
                <h2 class="flex items-center">
                    {{ $topic->name }}
                </h2>
                <a href="{{ route('users.profile', [$topic->user]) }}" class="block md:inline text-sm text-black font-normal md:ml-3">
                    by {{ $topic->user->name }}
                </a>
            </div>
            <div class="mb-6">
                <a href="{{ route('topics.reports.show', [$topic]) }}" class="bg-red-light text-white p-2 text-sm rounded no-underline hover:bg-red">report topic</a>
                <a href="{{ route('topics.requests.show', [$topic]) }}" class="bg-blue-light text-white p-2 text-sm rounded no-underline hover:bg-blue">request topic</a>
            </div>
            <div class="mb-4">
                <h3 class="mb-1">Abstract</h3>
                <p>
                    @markdown($topic->abstract)
                </p>
            </div>
            @if ($topic->additional)
            <h3>Additional</h3>
            <p>
                @markdown($topic->additional)
            </p>
            @endif
            <div class="mb-4">
                <h3 class="mb-1">Links</h3>
                @if ($topic->links->count())
                @foreach ($topic->links as $link)
                <p>
                    {{ $link->type }}: <a href="{{ $link->link }}">{{ $link->link }}</a>
                </p>
                @endforeach
                @else
                <p>
                    There are no links for this topic.
                </p>
                @endif
            </div>
            <h3>Presentations</h3>
            @if ($topic->presentations->count())
            <ol>
                @foreach ($topic->presentations as $presentation)
                <li>
                    <h4>
                        {{ $presentation->name }} (
                        {{ $presentation->medium }},
                        @if ($presentation->month)
                        {{ $presentation->year }}/{{ $presentation->month }}
                        @else
                        {{ $presentation->year }}
                        @endif
                        )
                        @if ($presentation->was_enjoyed)
                        ☺
                        @else
                        ☹
                        @endif
                    </h4>
                    @if ($presentation->additional)
                    <h5>Additional</h5>
                    <p>
                        @markdown($presentation->additional)
                    </p>
                    @endif
                    <p>
                        @if ($presentation->was_first_time_presenting_topic)
                        It was the first time {{ $topic->user->name }} presented this topic.
                        @endif
                    </p>
                    @if ($presentation->links->count())
                    @foreach ($presentation->links as $link)
                    <p>
                        {{ $link->type }}: <a href="{{ $link->link }}">{{ $link->link }}</a>
                    </p>
                    @endforeach
                    @else
                    <p>
                        There are no links for this presentation.
                    </p>
                    @endif
                </li>
                @endforeach
            </ol>
            @else
            <p>
                This topic hasn't been presented yet.
            </p>
            @endif
        </div>
    </div>
</div>
@endsection
