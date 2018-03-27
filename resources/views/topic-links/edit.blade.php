@extends('layouts.page')

@section('page.content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form method="post" action="{{ route('topics.links.update', [$topic, $link]) }}" enctype="multipart/form-data">
                    @method("PATCH")
                    @csrf
                    
                    <h1>Update a link</h1>
                    
                    @include('includes.errors')
                    @include('includes.link-type', ['type' => old('type', $link->type)])

                    <div class="form-group">
                        <label for="link">Link</label>
                        <input type="text" class="form-control" id="link" name="link" aria-describedby="link-help" placeholder="Enter a link" value="{{ old('link', $link->link) }}">
                        <small id="link-help" class="form-text text-muted">A link to where this is</small>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
@endsection
