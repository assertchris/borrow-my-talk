<div class="
    flex flex-col justify-between rounded overflow-hidden shadow-md
    xs:p-4 xs:my-4 xs:w-full
    sm:p-6 sm:my-4 sm:w-full
    md:p-8 md:my-6
    lg:w-1/2
    @if ($loop->index > 0)
        md:ml-4
    @endif
    @if ($loop->index > 1)
        md:hidden
        lg:flex
    @endif
">
    <div class="
        text-grey-darkest font-serif font-bold text-xl tracking-wide
    ">{{ $topic->name }}</div>
    <div class="
        leading-normal text-grey-darkest mt-4 flex-grow
    ">{{ str_limit($topic->abstract, 200) }}</div>
    <div class="
        mt-4
        flex
        justify-between
    ">
        <a href="{{ route('topics.requests.show', $topic) }}" class="
            flex text-brand-light
        ">See more</a>
        <a href="{{ route('topics.requests.show', $topic) }}" class="
            flex text-brand-light
        ">Request</a>
    </div>
</div>
