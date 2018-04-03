@extends('layouts.page')

@section('page.content')
    <div class="
        xs:px-2
        md:px-0
    ">
        <h1 class="
            text-grey-darkest font-serif
            xs:text-3xl xs:my-4
            sm:text-4xl sm:my-4
            md:my-6 md:text-5xl
        ">{{ $user->name }}</h1>
        @if ($topics->count())
            <ol class="
                list-reset
            ">
                @foreach ($topics as $topic)
                    <li class="
                        mb-8
                    ">
                        @link(route('topics.show', $topic), "<h2 class='
                            font-serif
                            mb-2
                        '>{$topic->name}</h2>", [
                            false,
                            'text-grey-darkest no-underline',
                        ])
                        <div class="
                            leading-normal
                            mb-4
                        ">
                            @markdown($topic->abstract, 250)
                        </div>
                        @if ($topic->presentations->count())
                            <ol class="
                                list-reset
                                mb-4
                            ">
                                @foreach ($topic->presentations as $presentation)
                                    <li class="
                                        font-bold text-xs tracking-wide
                                        uppercase
                                    ">
                                        @if ($presentation->month)
                                            {{ $presentation->year }} – {{ $presentation->month }}
                                        @else
                                            {{ $presentation->year }}
                                        @endif
                                        <span class="
                                            ml-8
                                        ">{{ $presentation->medium }}, {{ $presentation->name }}</span>
                                    </li>
                                @endforeach
                            </ol>
                        @endif
                        <div>
                            @link(route('topics.show', $topic), 'Read', [
                                'opacity-50',
                                'hover:opacity-100',
                                'mr-2',
                            ])
                            @link(route('topics.requests.show', $topic), 'Request', [
                                'opacity-50',
                                'hover:opacity-100',
                                'mr-2',
                            ])
                            @link(route('topics.reports.show', $topic), 'Report', [
                                false,
                                'opacity-50 text-grey-light',
                                'hover:opacity-100 hover:text-red-light',
                            ])
                        </div>
                    </li>
                @endforeach
            <ol>
        @else 
            <p>This creator hasn't added topics yet.</p>
        @endif
    </div>
@endsection
