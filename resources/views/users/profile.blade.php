@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>{{ $user->name }}</h1>
                @forelse($topics as $topic)
                    <li>
                        <a href="{{ route('topics.show', [$topic]) }}">
                            <h2>{{ $topic->name }}</h2>
                        </a>
                        (<a href="{{ route('topics.reports.show', [$topic]) }}">report topic</a>)
                        <h3>Abstract</h3>
                        <p>
                            @markdown(str_limit($topic->abstract, 250))
                        </p>
                        <h3>Presentations</h3>
                        <ol>
                            @forelse ($topic->presentations as $presentation)
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
                                </li>
                        </ol>
                            @empty
                                <p>
                                    This topic hasn't been presented yet.
                                </p>
                                <hr>
                            @endforelse
                    </li>
                @empty 
                    <p>
                    This creator hasn't added topics yet.
                    </p>
                @endforelse
        </div>
    </div>
</div>
@endsection
