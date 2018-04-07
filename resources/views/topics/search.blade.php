@extends('layouts.page')

@section('page.content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1>Search topics</h1>
                <p>
                    <form class="form-inline">
                        <div class="input-group col-md-8">
                            <input dusk="query" type="text" class="form-control" id="query" name="query" aria-describedby="query-help" placeholder="Enter query" value="{{ $query }}">
                            <div class="input-group-append">
                                <button dusk="submit" type="submit" class="btn btn-primary">Search</button>
                            </div>
                        </div>
                        <div class="algolia-logo">
                            @svg('algolia')
                        </div>
                    </form>
                </p>
                @if ($topics->count())
                    <ol>
                        @foreach ($topics as $topic)
                            <li>
                                <a href="{{ route('topics.show', [$topic]) }}">
                                    <h2>{{ $topic->name }}</h2>
                                </a>
                                <p>{{ str_limit($topic->abstract, 250) }}</p>
                            </li>
                        @endforeach
                    </ol>
                @else
                    <p>
                        No topics found matching your search criteria.
                    </p>
                @endif
                {{ $topics->appends(['query' => $query])->links() }}
            </div>
        </div>
    </div>
@endsection
