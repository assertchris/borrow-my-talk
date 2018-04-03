@extends('layouts.page')

@section('page.content')
    <div class="
        xs:px-2
        md:px-0
    ">
        <div class="
            heading
            xs:my-4
            sm:my-4
            md:my-6
        ">
            <h1 class="
                heading-text flex-inline
                xs:text-3xl 
                sm:text-4xl 
                md:text-5xl
            ">My topics</h1>
            @link(route('topics.create'), 'Create a topic', [
                'flex-inline ml-2',
            ])
        </div>
        @if ($topics->count() > 0)
        <table cellspacing="0" class="
            w-full
        ">
            <thead>
                <tr class="
                    xs:hidden
                    sm:hidden
                    md:table-row
                ">
                    <th class="
                        table-column-heading-large pl-2
                        xs:text-xs
                        sm:text-xs
                        md:text-sm
                    ">Name</th>
                    <th class="
                        table-column-heading-small
                        xs:hidden
                        sm:hidden
                        md:table-cell
                    ">Relations</th>
                    <th class="
                        table-column-heading-small pr-2
                        xs:hidden
                        sm:hidden
                        md:table-cell
                    ">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($topics as $topic)
                    <tr class="
                        hover:bg-grey-lightest
                    ">
                        <td class="
                            table-column-large pl-2
                        ">
                            @link(route('topics.edit', $topic), $topic->name)
                            <div class="
                                mt-4
                                xs:block
                                sm:block
                                md:hidden
                            ">
                                @include('includes.topics.links-relations')
                                <div class="
                                    inline-block ml-4
                                ">
                                    @include('includes.topics.links-actions')
                                </div>
                            </div>
                        </td>
                        <td class="
                            table-column-small
                            xs:hidden
                            sm:hidden
                            md:table-cell
                        ">
                            @include('includes.topics.links-relations')
                        </td>
                        <td class="
                            table-column-small pr-2
                            xs:hidden
                            sm:hidden
                            md:table-cell
                        ">
                            @include('includes.topics.links-actions')
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3">
                        {{ $topics->links() }}
                    </td>
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
