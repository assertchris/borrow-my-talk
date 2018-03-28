@extends('layouts.app')

@section('content')
    @include('includes.navigation.landing')

    <div class="
        container
        xs:px-4
        sm:px-0 sm:mx-auto
    ">
        @yield('landing.top')
    </div>
    <div class="bg-grey-lightest">
        <div class="
            container
            xs:my-4 xs:px-4 xs:py-4
            sm:mx-auto sm:my-8 sm:py-8 sm:px-0
        ">
            @yield('landing.search')
        </div>
    </div>
    <div class="
        container
        xs:px-4
        sm:px-0 sm:mx-auto
        mb-8
    ">
        @yield('landing.bottom')
    </div>
@endsection
