@extends('layouts.page')

@section('page.content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1>Links of {{ $topic->name }}</h1>
                <a href="{{ route('topics.links.create', [$topic]) }}">Add a link</a>
                <ol>
                    @foreach ($links as $link)
                        <li>
                            {{ $link->type }}:
                            <a href="{{ route('topics.links.edit', [$topic, $link]) }}">
                                {{ $link->link }}
                            </a> •
                            <form id="delete-{{ $link->id }}" action="{{ route('topics.links.destroy', [$topic, $link])}}" method="POST" style="display: inline">
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
