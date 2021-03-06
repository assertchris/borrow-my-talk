@extends('layouts.landing')

@section('landing.top')
    <h1 class="
        text-grey-darkest font-serif text-center
        xs:text-3xl xs:my-1
        sm:text-4xl
        md:mt-8 md:mb-4 md:text-5xl
    ">
        Borrow My Topic
    </h1>
@endsection

@section('landing.search')
    <form action="{{ route('topics.search') }}">
        <label class="
            block text-grey-darkest
            xs:text-sm xs:mb-4
            sm:text-base sm:mb-6
            md:text-center
        " for="query">
            Find a topic for your next meet-up
        </label>
        <input class="shadow appearance-none border rounded w-full py-2 px-2 text-grey-darkest" id="query" name="query" type="search" placeholder="Search for something...">
    </form>
@endsection

@section('landing.bottom')
    @if ($newest->count() > 0)
        @include('includes.topics.landing-card-heading', ['label' => 'Newest topics'])
        @include('includes.topics.landing-card-list', ['topics' => $newest])
    @endif
    @if ($popular->count() > 0)
        @include('includes.topics.landing-card-heading', ['label' => 'Popular topics'])
        @include('includes.topics.landing-card-list', ['topics' => $popular])
    @endif
    @if ($requested->count() > 0)
        @include('includes.topics.landing-card-heading', ['label' => 'Requested topics'])
        @include('includes.topics.landing-card-list', ['topics' => $requested])
    @endif
@endsection
