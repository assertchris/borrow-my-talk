@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1>Search topics</h1>
                <form>
                    <div class="form-group">
                        <label for="query">Search terms</label>
                        <input type="text" class="form-control" id="query" name="query" aria-describedby="query-help" placeholder="Enter query" value="{{ $query }}">
                        <small id="query-help" class="form-text text-muted">The terms you'd like to search for</small>
                    </div>
                    <button type="submit" class="btn btn-primary">Go</button>
                </form>
                @if ($topics->count())
                    <ol>
                        @foreach ($topics as $topic)
                            <li>
                                <a href="#">{{ $topic->name }}</a>
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
