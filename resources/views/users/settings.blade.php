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
                        <input type="text" class="form-control" id="name" name="name" aria-describedby="name-help" placeholder="Enter your name" value="{{ old('name', $user->name) }}">
                        <small id="name-help" class="form-text text-muted">Your name, for emails!</small>
                    </div>
                    <div class="form-group">
                        <label for="handle">Handle</label>
                        <input type="text" class="form-control" id="handle" name="handle" aria-describedby="handle-help" placeholder="Enter your handle" value="{{ old('handle', $user->handle) }}">
                        <small id="handle-help" class="form-text text-muted">A name to help others recognise you, for your profile URL and public lists</small>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" aria-describedby="email-help" placeholder="Enter your email" value="{{ old('email', $user->email) }}">
                        <small id="email-help" class="form-text text-muted">Your email address, where we can send notification emails to</small>
                    </div>
                    <p>
                        If you need to reset your password, use the "forgot password" form on the login page.
                    </p>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
@endsection
