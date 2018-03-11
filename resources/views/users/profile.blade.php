@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1>{{ $user->name }}</h1>
                @if ($user->topics->count())
                    <ol>
                        @foreach ($user->topics as $topic)
                            <li>
                                <h2>{{ $topic->name }}</h2>
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
                                                        {{ $user->name }} enjoyed presenting this.
                                                    @endif
                                                    @if ($presentation->was_enjoyed)
                                                        It was the first time {{ $user->name }} presented this topic.
                                                    @endif
                                                </p>
                                                <h5>Feedback</h5>
                                                @if ($presentation->feedback->count())
                                                    <ol>
                                                        @foreach ($presentation->feedback as $next)
                                                            <li><a href="{{ $next->link }}">{{ $next->link }}</a></li>
                                                        @endforeach
                                                    </ol>
                                                @else
                                                    <p>
                                                        There's no feedback for this presentation.
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
                                <hr>
                            </li>
                        @endforeach
                    </ol>
                @else
                    <p>
                        This creator hasn't added topics yet.
                    </p>
                @endif
            </div>
        </div>
    </div>
@endsection
