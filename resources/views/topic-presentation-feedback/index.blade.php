@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1>Feedback for {{ $topic->name }}</h1>
                <h2>
                    on {{ $presentation->name }}
                    @if ($presentation->month)
                        ({{ $presentation->year }}/{{ $presentation->month }})
                    @else
                        ({{ $presentation->year }})
                    @endif
                </h2>
                <a href="{{ route('topics.presentations.feedback.create', [$topic, $presentation]) }}">Add some feedback</a>
                <ol>
                    @foreach ($feedback as $next)
                        <li>
                            <a href="{{ route('topics.presentations.feedback.edit', [$topic, $presentation, $next]) }}">{{ $next->link }}</a> •
                            <form id="delete-{{ $next->id }}" action="{{ route('topics.presentations.feedback.destroy', [$topic, $presentation, $next])}}" method="POST" style="display: inline">
                                @method('DELETE')
                                @csrf
                                <a href="#" onclick="event.preventDefault(); confirm('Are you sure?') && document.getElementById('delete-{{ $next->id }}').submit(); ">delete</a>
                            </form>
                        </li>
                    @endforeach
                </ol>
            </div>
        </div>
    </div>
@endsection
