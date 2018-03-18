@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form method="post" action="{{ route('topics.presentations.feedback.update', [$topic, $presentation, $feedback]) }}" enctype="multipart/form-data">
                    @method("PATCH")
                    @csrf
                    
                    <h1>Update a presentation</h1>
                    
                    @include('includes.errors')

                    <div class="form-group">
                        <label for="link">Link</label>
                        <input type="text" class="form-control" id="link" name="link" aria-describedby="link-help" placeholder="Enter a link" value="{{ old('link', $feedback->link) }}">
                        <small id="link-help" class="form-text text-muted">A link to the feedback, from somewhere like Joind.in or Twitter</small>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
@endsection
