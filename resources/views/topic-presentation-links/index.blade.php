@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1>Links for {{ $topic->name }}</h1>
                <h2>
                    on {{ $presentation->name }}
                    @if ($presentation->month)
                        ({{ $presentation->year }}/{{ $presentation->month }})
                    @else
                        ({{ $presentation->year }})
                    @endif
                </h2>
                <a href="{{ route('topics.presentations.links.create', [$topic, $presentation]) }}">Add a link</a>
                <ol>
                    @foreach ($links as $link)
                        <li>
                            {{ $link->type }}:
                            <a href="{{ route('topics.presentations.links.edit', [$topic, $presentation, $link]) }}">{{ $link->link }}</a> •
                            <form id="delete-{{ $link->id }}" action="{{ route('topics.presentations.links.destroy', [$topic, $presentation, $link])}}" method="POST" style="display: inline">
                                @method('DELETE')
                                @csrf
                                <a href="#" onclick="event.preventDefault(); confirm('Are you sure?') && document.getElementById('delete-{{ $link->id }}').submit(); ">delete</a>
                            </form>
                        </li>
                    @endforeach
                </ol>
            </div>
        </div>
    </div>
@endsection
