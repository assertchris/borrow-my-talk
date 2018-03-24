@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        @yield('landing.top')
    </div>
    <div class="bg-grey-lightest">
        <div class="container mx-auto my-8 py-8">
            @yield('landing.search')
        </div>
    </div>
    <div class="container mx-auto">
        @yield('landing.bottom')
    </div>
@endsection
