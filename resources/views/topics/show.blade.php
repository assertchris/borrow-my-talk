@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2>
                    {{ $topic->name }}
                    <a href="{{ route('users.profile', [$topic->user]) }}">
                        <span class="small text-muted">by {{ $topic->user->name }}</span>
                    </a>
                </h2>
                (<a href="{{ route('topics.reports.show', [$topic]) }}">report topic</a>)
                <h3>Abstract</h3>
                <p>
                    @markdown($topic->abstract)
                </p>
                @if ($topic->additional)
                    <h3>Additional</h3>
                    <p>
                        @markdown($topic->additional)
                    </p>
                @endif
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
                                </h4>
                                @if ($presentation->additional)
                                    <h5>Additional</h5>
                                    <p>
                                        @markdown($presentation->additional)
                                    </p>
                                @endif
                                <p>
                                    @if ($presentation->was_enjoyed)
                                        {{ $topic->user->name }} enjoyed presenting this.
                                    @endif
                                    @if ($presentation->was_first_time_presenting_topic)
                                        It was the first time {{ $topic->user->name }} presented this topic.
                                    @endif
                                </p>
                                <h5>Links</h5>
                                @if ($presentation->links->count())
                                    <ol>
                                        @foreach ($presentation->links as $link)
                                            <li><a href="{{ $link->link }}">{{ $link->link }}</a></li>
                                        @endforeach
                                    </ol>
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
