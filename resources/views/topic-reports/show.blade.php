@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form method="post" action="{{ route('topics.reports.show', [$topic]) }}" enctype="multipart/form-data">
                    @csrf

                    <h1>Report {{ $topic->name }}</h1>
                    
                    @include('includes.errors')

                    <div class="form-group">
                        <label for="reasons">Reason(s)</label>
                        <textarea class="form-control" id="reasons" name="reasons" aria-describedby="reasons-help" placeholder="Enter reasons">{{ old('reasons') }}</textarea>
                        <small id="reasons-help" class="form-text text-muted">Reason(s) for reporting this topic</small>
                    </div>
                    <div class="form-group">
                        <label for="links">Link(s) to previous work</label>
                        <textarea class="form-control" id="links" name="links" aria-describedby="links-help" placeholder="Enter links">{{ old('links') }}</textarea>
                        <small id="links-help" class="form-text text-muted">Links to previous work, if applicable. If your reasons state that the work is not original then you need to provide links for this report to be investigated.</small>
                    </div>
                    <button type="submit" class="btn btn-primary">Send</button>
                </form>
            </div>
        </div>
    </div>
@endsection
