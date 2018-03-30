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
                            @link(route('topics.links.index', $topic), '<svg class="fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="16" height="16">
                                <path d="M314.222 197.78c51.091 51.091 54.377 132.287 9.75 187.16-6.242 7.73-2.784 3.865-84.94 86.02-54.696 54.696-143.266 54.745-197.99 0-54.711-54.69-54.734-143.255 0-197.99 32.773-32.773 51.835-51.899 63.409-63.457 7.463-7.452 20.331-2.354 20.486 8.192a173.31 173.31 0 0 0 4.746 37.828c.966 4.029-.272 8.269-3.202 11.198L80.632 312.57c-32.755 32.775-32.887 85.892 0 118.8 32.775 32.755 85.892 32.887 118.8 0l75.19-75.2c32.718-32.725 32.777-86.013 0-118.79a83.722 83.722 0 0 0-22.814-16.229c-4.623-2.233-7.182-7.25-6.561-12.346 1.356-11.122 6.296-21.885 14.815-30.405l4.375-4.375c3.625-3.626 9.177-4.594 13.76-2.294 12.999 6.524 25.187 15.211 36.025 26.049zM470.958 41.04c-54.724-54.745-143.294-54.696-197.99 0-82.156 82.156-78.698 78.29-84.94 86.02-44.627 54.873-41.341 136.069 9.75 187.16 10.838 10.838 23.026 19.525 36.025 26.049 4.582 2.3 10.134 1.331 13.76-2.294l4.375-4.375c8.52-8.519 13.459-19.283 14.815-30.405.621-5.096-1.938-10.113-6.561-12.346a83.706 83.706 0 0 1-22.814-16.229c-32.777-32.777-32.718-86.065 0-118.79l75.19-75.2c32.908-32.887 86.025-32.755 118.8 0 32.887 32.908 32.755 86.025 0 118.8l-45.848 45.84c-2.93 2.929-4.168 7.169-3.202 11.198a173.31 173.31 0 0 1 4.746 37.828c.155 10.546 13.023 15.644 20.486 8.192 11.574-11.558 30.636-30.684 63.409-63.457 54.733-54.735 54.71-143.3-.001-197.991z"/>
                            </svg>')
                            @link(route('topics.presentations.index', $topic), '<svg class="fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="14" height="16">
                                <path d="M148 288h-40c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12zm108-12v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12zm96 0v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12zm-96 96v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12zm-96 0v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12zm192 0v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12zm96-260v352c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V112c0-26.5 21.5-48 48-48h48V12c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v52h128V12c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v52h48c26.5 0 48 21.5 48 48zm-48 346V160H48v298c0 3.3 2.7 6 6 6h340c3.3 0 6-2.7 6-6z"/>
                            </svg>', [
                                'ml-2'
                            ])
                        </td>
                        <td class="
                            w-1/4 whitespace-no-wrap text-center py-2
                        ">
                            @link(route('topics.edit', $topic), '<svg class="fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" width="18" height="16">
                                <path d="M402.3 344.9l32-32c5-5 13.7-1.5 13.7 5.7V464c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V112c0-26.5 21.5-48 48-48h273.5c7.1 0 10.7 8.6 5.7 13.7l-32 32c-1.5 1.5-3.5 2.3-5.7 2.3H48v352h352V350.5c0-2.1.8-4.1 2.3-5.6zm156.6-201.8L296.3 405.7l-90.4 10c-26.2 2.9-48.5-19.2-45.6-45.6l10-90.4L432.9 17.1c22.9-22.9 59.9-22.9 82.7 0l43.2 43.2c22.9 22.9 22.9 60 .1 82.8zM460.1 174L402 115.9 216.2 301.8l-7.3 65.3 65.3-7.3L460.1 174zm64.8-79.7l-43.2-43.2c-4.1-4.1-10.8-4.1-14.8 0L436 82l58.1 58.1 30.9-30.9c4-4.2 4-10.8-.1-14.9z"/>
                            </svg>')
                            <form id="delete-{{ $topic->id }}" action="{{ route('topics.destroy', [$topic])}}" method="POST" style="display: inline">
                                @method('DELETE')
                                @csrf
                                @link('#', '<svg class="fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="14" height="16">
                                    <path d="M192 188v216c0 6.627-5.373 12-12 12h-24c-6.627 0-12-5.373-12-12V188c0-6.627 5.373-12 12-12h24c6.627 0 12 5.373 12 12zm100-12h-24c-6.627 0-12 5.373-12 12v216c0 6.627 5.373 12 12 12h24c6.627 0 12-5.373 12-12V188c0-6.627-5.373-12-12-12zm132-96c13.255 0 24 10.745 24 24v12c0 6.627-5.373 12-12 12h-20v336c0 26.51-21.49 48-48 48H80c-26.51 0-48-21.49-48-48V128H12c-6.627 0-12-5.373-12-12v-12c0-13.255 10.745-24 24-24h74.411l34.018-56.696A48 48 0 0 1 173.589 0h100.823a48 48 0 0 1 41.16 23.304L349.589 80H424zm-269.611 0h139.223L276.16 50.913A6 6 0 0 0 271.015 48h-94.028a6 6 0 0 0-5.145 2.913L154.389 80zM368 128H80v330a6 6 0 0 0 6 6h276a6 6 0 0 0 6-6V128z"/>
                                </svg>', [
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
