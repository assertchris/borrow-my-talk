@extends('layouts.app')

@section('content')
    @include('includes.navigation.page')

    <div class="container mx-auto flex-1">
        @yield('page.content')
    </div>
@endsection

@prepend('scripts')
    <script src="{{ asset('js/app.js') }}"></script>
@endprepend
