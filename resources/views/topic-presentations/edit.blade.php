@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form method="post" action="{{ route('topics.presentations.update', [$topic, $presentation]) }}" enctype="multipart/form-data">
                    @method("PATCH")
                    @csrf
                    
                    <h1>Update a presentation</h1>
                    
                    @include('_partials.errors')

                    <div class="form-group">
                        <label for="medium">Medium</label>
                        <input type="text" class="form-control" id="medium" name="medium" aria-describedby="medium-help" placeholder="Enter a medium" value="{{ old('medium', $presentation->medium) }}">
                        <small id="medium-help" class="form-text text-muted">What was this presentation? Examples: "conference", "meet-up", "magazine", "book"</small>
                    </div>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" aria-describedby="name-help" placeholder="Enter a name" value="{{ old('name', $presentation->name) }}">
                        <small id="name-help" class="form-text text-muted">A name pf the conference, meet-up group, magazine, book</small>
                    </div>
                    <div class="form-group">
                        <label for="year">Year</label>
                        <input type="number" class="form-control" id="year" name="year" aria-describedby="year-help" placeholder="Enter a year" value="{{ old('year', $presentation->year) }}">
                        <small id="year-help" class="form-text text-muted">What year was this presented in?</small>
                    </div>
                    <div class="form-group">
                        <label for="month">Month</label>
                        <input type="number" class="form-control" id="month" name="month" aria-describedby="month-help" placeholder="Enter a month" value="{{ old('month', $presentation->month) }}">
                        <small id="month-help" class="form-text text-muted">What month was this presented in?</small>
                    </div>
                    <div class="form-group">
                        <label for="abstract">Additional</label>
                        <textarea class="form-control" id="additional" name="additional" aria-describedby="additional-help" placeholder="Enter additional information">{{ old('additional', $presentation->additional) }}</textarea>
                        <small id="additional-help" class="form-text text-muted">Are there any important details about this presentation? Example: the projector wasn't good, which made the code difficult to see</small>
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="was-enjoyed" name="was-enjoyed" value="1"
                                @if (old('was-enjoyed', $presentation->was_enjoyed))
                                    checked="checked"
                                @endif
                            >
                            <label class="form-check-label" for="was-enjoyed">Did you and the audience enjoy the presentation?</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="was-first-time-presenting-topic" name="was-first-time-presenting-topic" value="1"
                                @if (old('was-first-time-presenting-topic', $presentation->was_first_time_presenting_topic))
                                    checked="checked"
                                @endif
                            >
                            <label class="form-check-label" for="was-first-time-presenting-topic">Was it your first time presenting this topic?</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
@endsection
