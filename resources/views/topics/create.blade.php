@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form method="post" action="{{ route('topics.store') }}" enctype="multipart/form-data">
                    @csrf

                    <h1>Submit a topic</h1>
                    
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" aria-describedby="name-help" placeholder="Enter a name" value="{{ old('name') }}">
                        <small id="name-help" class="form-text text-muted">A name to help you recognise the topic in a list</small>
                    </div>
                    <div class="form-group">
                        <label for="abstract">Abstract</label>
                        <textarea class="form-control" id="abstract" name="abstract" aria-describedby="abstract-help" placeholder="Enter an abstract">{{ old('abstract') }}</textarea>
                        <small id="abstract-help" class="form-text text-muted">A short description of the topic, like the kind of thing that would appear on a conference website</small>
                    </div>
                    <div class="form-group">
                        <label for="abstract">Additional</label>
                        <textarea class="form-control" id="additional" name="additional" aria-describedby="additional-help" placeholder="Enter additional information">{{ old('additional') }}</textarea>
                        <small id="additional-help" class="form-text text-muted">Details to motivate the selection of this topic, such as your qualifications</small>
                    </div>
                    <div class="form-group">
                        <label for="slides">Slides (link)</label>
                        <input type="text" class="form-control" id="slides" name="slides" aria-describedby="slides-help" placeholder="Enter a link to your slides" value="{{ old('slides') }}">
                        <small id="slides-help" class="form-text text-muted">A link to the slides from a previous presentation of this topic</small>
                    </div>
                    <div class="form-group">
                        <label for="video">Video (link)</label>
                        <input type="text" class="form-control" id="video" name="video" aria-describedby="video-help" placeholder="Enter a link to your video" value="{{ old('video') }}">
                        <small id="video-help" class="form-text text-muted">A link to a video recording of a previous presentation of this topic</small>
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="includes-mentoring" name="includes-mentoring" value="1"
                                @if (old('includes-mentoring'))
                                    checked="checked"
                                @endif
                            >
                            <label class="form-check-label" for="includes-mentoring">Are you willing to mentor another presenter on this topic?</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="willing-to-present" name="willing-to-present" value="1"
                                @if (old('willing-to-present'))
                                    checked="checked"
                                @endif
                            >
                            <label class="form-check-label" for="willing-to-present">Are you willing to present this topic again?</label>
                        </div>
                    </div>
                    <p>
                        <strong>When you click save</strong>, you're also saying that this topic is <strong>your original work</strong> or that you have the permission of the person, whose original work it is, to do so.
                        If this submission is found to be someone else's work, we will hide it until you can prove that it is your original work.
                        For more information, please refer to the <strong>terms of use</strong>.
                    </p>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
@endsection
