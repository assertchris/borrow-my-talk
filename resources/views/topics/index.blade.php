@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1>My topics</h1>
                <a href="{{ route('topics.create') }}">Submit a topic</a>
                <ol>
                    @foreach ($topics as $topic)
                        <li>
                            <a href="{{ route('topics.edit', [$topic]) }}">{{ $topic->name }}</a> •
                            <a href="{{ route('topics.presentations.index', [$topic]) }}">presentations</a> •
                            <form id="delete-{{ $topic->id }}" action="{{ route('topics.destroy', [$topic])}}" method="POST" style="display: inline">
                                @method('DELETE')
                                @csrf
                                <a href="#" onclick="event.preventDefault(); confirm('Are you sure?') && document.getElementById('delete-{{ $topic->id }}').submit(); ">delete</a>
                            </form>
                        </li>
                    @endforeach
                </ol>
            </div>
        </div>
    </div>
@endsection
