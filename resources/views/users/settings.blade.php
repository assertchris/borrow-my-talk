@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form method="post" action="{{ route('users.update', [$user]) }}" enctype="multipart/form-data">
                    @method("PATCH")
                    @csrf
                    
                    <h1>Settings</h1>
                    
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
                        <input dusk="name" type="text" class="form-control" id="name" name="name" aria-describedby="name-help" placeholder="Enter your name" value="{{ old('name', $user->name) }}">
                        <small id="name-help" class="form-text text-muted">Your name, for emails and your profile page. Use a ficticious name if you don't want people to be able to identify you by your real name</small>
                    </div>
                    <div class="form-group">
                        <label for="handle">Handle</label>
                        <input dusk="handle" type="text" class="form-control" id="handle" name="handle" aria-describedby="handle-help" placeholder="Enter your handle" value="{{ old('handle', $user->handle) }}">
                        <small id="handle-help" class="form-text text-muted">A name to help others recognise you, for your profile URL and public lists</small>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input dusk="email" type="email" class="form-control" id="email" name="email" aria-describedby="email-help" placeholder="Enter your email" value="{{ old('email', $user->email) }}">
                        <small id="email-help" class="form-text text-muted">Your email address, where we can send notification emails to</small>
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input dusk="from-under-represented-group" class="form-check-input" type="checkbox" id="from-under-represented-group" name="from-under-represented-group" value="1"
                                @if (old('from-under-represented-group', $user->from_under_represented_group))
                                    checked="checked"
                                @endif
                            >
                            <label class="form-check-label" for="from-under-represented-group">Are you a member of a group who is traditionally under-represented in your industry?
                            <small class="form-text text-muted">We won't do anything to ensure you've answered this question "correctly"; rather, this is for you to self-identify and it's a conversation you can continue with any publishers or organizers who contact you, if necessary</small>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="from-under-represented-group-additional">Additional information</label>
                        <textarea dusk="from-under-represented-group-additional" class="form-control" id="from-under-represented-group-additional" name="from-under-represented-group-additional" aria-describedby="from-under-represented-group-additional-help" placeholder="Enter additional information">{{ old('from-under-represented-group-additional', $user->from_under_represented_group_additional) }}</textarea>
                        <small id="from-under-represented-group-additional-help" class="form-text text-muted">Would you like to tell us more about why you checked the checkbox? This is also optional, but it may be helpful to publishers looking to improve the diversity of their contributors and to better understand you</small>
                    </div>
                    <p>
                        If you need to reset your password, use the "forgot password" form on the login page.
                    </p>
                    <button dusk="submit" type="submit" class="btn btn-primary">Save</button>
                </form>
                <hr>
                <p>
                    @if ($user->twitter_id)
                        <form id="disconnect-twitter" action="{{ route('users.twitter.disconnect')}}" method="POST" style="display: inline">
                            @method('DELETE')
                            @csrf
                            <a href="#" onclick="event.preventDefault(); confirm('Are you sure?') && document.getElementById('disconnect-twitter').submit(); ">Disconnect Twitter</a>
                        </form>
                    @else
                        <a href="{{ route('users.twitter.redirect') }}">Connect Twitter</a>
                    @endif
                </p>
            </div>
        </div>
    </div>
@endsection
