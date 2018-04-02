@extends('layouts.page')

@section('page.content')
    <div class="
        xs:px-2
        md:px-0
    ">
        <div class="
            flex flex-grow flex-row items-end justify-start
            xs:my-4
            sm:my-4
            md:my-6
        ">
            <h1 class="
                flex-inline text-grey-darkest font-serif custom-font-line-height
                xs:text-3xl 
                sm:text-4xl 
                md:text-5xl
            ">My topics</h1>
            @link(route('topics.create'), 'Create a topic', [
                'flex-inline ml-2',
            ])
        </div>
        @if ($topics->count() > 0)
        <table class="
            w-full
        ">
            <thead>
                <tr>
                    <th class="
                        w-3/4 py-2
                        text-grey-darkest text-left tracking-wide font-bold uppercase
                        border-b-2 border-grey-lightest
                        xs:text-xs
                        sm:text-xs
                        md:text-sm
                    ">Name</th>
                    <th class="
                        w-1/4 whitespace-no-wrap py-2
                        text-grey-darkest text-center tracking-wide font-bold uppercase 
                        border-b-2 border-grey-lightest
                        xs:text-xs
                        sm:text-xs
                        md:text-sm
                    ">Relations</th>
                    <th class="
                        w-1/4 whitespace-no-wrap py-2
                        text-grey-darkest text-center tracking-wide font-bold uppercase 
                        border-b-2 border-grey-lightest
                        xs:text-xs
                        sm:text-xs
                        md:text-sm
                    ">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($topics as $topic)
                    <tr>
                        <td class="
                            w-3/4 py-2
                        ">
                            @link(route('topics.edit', $topic), $topic->name)
                        </td>
                        <td class="
                            w-1/4 whitespace-no-wrap text-center py-2
                        ">
                            @link(route('topics.links.index', $topic), svg('links'))
                            @link(route('topics.presentations.index', $topic), svg('presentations'), [
                                'ml-2'
                            ])
                        </td>
                        <td class="
                            w-1/4 whitespace-no-wrap text-center py-2
                        ">
                            @link(route('topics.edit', $topic), svg('edit'))
                            <form id="delete-{{ $topic->id }}" action="{{ route('topics.destroy', [$topic])}}" method="POST" style="display: inline">
                                @method('DELETE')
                                @csrf
                                @link('#', svg('delete'), [
                                    'ml-2'
                                ], 'onclick="event.preventDefault(); confirm(\'Are you sure?\') && document.getElementById(\'delete-' . $topic->id . '\').submit(); "')
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <tr colspan="3">
                        {{ $topics->links() }}
                    </tr>
                </tr>
            </tfoot>
        </table>
        @else
            <p>
                You haven't created any topics yet.
            </p>
        @endif  
    </div>
@endsection
