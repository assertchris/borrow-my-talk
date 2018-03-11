@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1>Presentations of {{ $topic->name }}</h1>
                <a href="{{ route('topics.presentations.create', [$topic]) }}">Add a presentation</a>
                <ol>
                    @foreach ($presentations as $presentation)
                        <li>
                            <a href="{{ route('topics.presentations.edit', [$topic, $presentation]) }}">
                                {{ $presentation->name }}
                                @if ($presentation->month)
                                    ({{ $presentation->year }}/{{ $presentation->month }})
                                @else
                                    ({{ $presentation->year }})
                                @endif
                            </a> •
                            <a href="{{ route('topics.presentations.feedback.index', [$topic, $presentation]) }}">feedback</a> •
                            <form id="delete-{{ $presentation->id }}" action="{{ route('topics.presentations.destroy', [$topic, $presentation])}}" method="POST" style="display: inline">
                                @method('DELETE')
                                @csrf
                                <a href="#" onclick="event.preventDefault(); confirm('Are you sure?') && document.getElementById('delete-{{ $presentation->id }}').submit(); ">delete</a>
                            </form>
                        </li>
                    @endforeach
                </ol>
            </div>
        </div>
    </div>
@endsection
