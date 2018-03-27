@extends('layouts.page')

@section('page.content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form method="post" action="{{ route('topics.requests.send', [$topic]) }}" enctype="multipart/form-data">
                    @csrf

                    <h1>Request {{ $topic->name }}</h1>
                    
                    @include('includes.errors')

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" aria-describedby="name-help" placeholder="Enter a name" value="{{ old('name', optional(auth()->user())->name) }}">
                        <small id="name-help" class="form-text text-muted">What can we call you?</small>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" aria-describedby="email-help" placeholder="Enter an email" value="{{ old('email', optional(auth()->user())->email) }}">
                        <small id="email-help" class="form-text text-muted">How can we contact you?</small>
                    </div>

                    @php
                        $options = [
                            config('borrow.roles.organiser'),
                            config('borrow.roles.publisher'),
                            config('borrow.roles.speaker'),
                            config('borrow.roles.other'),
                        ];
                    @endphp

                    <div class="form-group">
                        <label for="type">You are...</label>
                        <select class="form-control" id="type" name="type" aria-describedby="type-help">
                            @foreach ($options as $option)
                                <option value="{{ $option }}"
                                    @if ($option === old('type'))
                                        selected="selected"
                                    @endif
                                >{{ $option }}</option>
                            @endforeach
                        </select>
                        <small id="type-help" class="form-text text-muted">In what capacity are you requesting this topic?</small>
                    </div>

                    <div class="form-group">
                        <label for="when">When</label>
                        <input type="text" class="form-control" id="when" name="when" aria-describedby="when-help" placeholder="Enter an when" value="{{ old('when') }}">
                        <small id="when-help" class="form-text text-muted">When is this for?</small>
                    </div>
                    <div class="form-group">
                        <label for="abstract">Additional</label>
                        <textarea class="form-control" id="additional" name="additional" aria-describedby="additional-help" placeholder="Enter additional information">{{ old('additional') }}</textarea>
                        <small id="additional-help" class="form-text text-muted">Is there anything else they should know, about this request and presentation?</small>
                    </div>
                    @if ($topic->includes_mentoring)
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="wants-mentoring" name="wants-mentoring" value="1"
                                    @if (old('wants-mentoring'))
                                        checked="checked"
                                    @endif
                                >
                                <label class="form-check-label" for="wants-mentoring">Would you like mentoring for this topic?</label>
                            </div>
                        </div>
                    @endif
                    <button type="submit" class="btn btn-primary">Send</button>
                </form>
            </div>
        </div>
    </div>
@endsection
