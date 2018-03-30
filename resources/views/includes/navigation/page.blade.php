<nav class="
    h-auto
    bg-white
    align-center justify-center border-b-2 border-grey-lightest py-4 mb-2
    transform-all transform-duration-1 transform-timing-linear
    xs:px-2
    md:px-0
">
    <div class="container mx-auto h-full  ">
        <div class="
            h-full
            flex items-end
        ">
            <div class="
                flex flex-grow justify-start items-end
            ">
                @link(url('/'), config('app.name', 'Borrow My Topic'), [
                    false,
                    'inline-flex no-underline font-serif text-grey-darkest whitespace-no-wrap custom-font-line-height pb-1',
                    'xs:text-2xl',
                    'sm:text-3xl',
                ])
                <a data-dropdown-menu-button href="#" class="
                    text-brand-light ml-2
                    xs:inline-flex
                    sm:inline-flex
                    md:hidden
                ">
                    <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="14" height="16">
                        <path d="M436 124H12c-6.627 0-12-5.373-12-12V80c0-6.627 5.373-12 12-12h424c6.627 0 12 5.373 12 12v32c0 6.627-5.373 12-12 12zm0 160H12c-6.627 0-12-5.373-12-12v-32c0-6.627 5.373-12 12-12h424c6.627 0 12 5.373 12 12v32c0 6.627-5.373 12-12 12zm0 160H12c-6.627 0-12-5.373-12-12v-32c0-6.627 5.373-12 12-12h424c6.627 0 12 5.373 12 12v32c0 6.627-5.373 12-12 12z"/>
                    </svg>
                </a>
                <div class="
                    flex flex-grow items-center ml-2
                    xs:hidden
                    sm:hidden
                    md:inline-flex
                ">
                    @include('includes.navigation.page-links')
                </div>
                
            </div>
            <div class="
                flex flex-shrink no-wrap items-center justify-end
            ">
                @auth
                    <span class="
                        inline-flex text-grey-darkest
                        xs:hidden
                        sm:text-base
                    ">{{ auth()->user()->name }}</span>
                    @link(route('logout'), '
                        <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="16" height="16">
                            <path d="M96 64h84c6.6 0 12 5.4 12 12v24c0 6.6-5.4 12-12 12H96c-26.5 0-48 21.5-48 48v192c0 26.5 21.5 48 48 48h84c6.6 0 12 5.4 12 12v24c0 6.6-5.4 12-12 12H96c-53 0-96-43-96-96V160c0-53 43-96 96-96zm231.1 19.5l-19.6 19.6c-4.8 4.8-4.7 12.5.2 17.1L420.8 230H172c-6.6 0-12 5.4-12 12v28c0 6.6 5.4 12 12 12h248.8L307.7 391.7c-4.8 4.7-4.9 12.4-.2 17.1l19.6 19.6c4.7 4.7 12.3 4.7 17 0l164.4-164c4.7-4.7 4.7-12.3 0-17l-164.4-164c-4.7-4.6-12.3-4.6-17 .1z"/>
                        </svg>
                    ', [
                        'inline-flex ml-2',
                        'xs:text-sm',
                        'sm:text-base',
                    ], 'onclick="event.preventDefault(); document.getElementById(\'logout\').submit();"')
                    <form id="logout" action="{{ route('logout') }}" method="POST" class="hidden">
                        {{ csrf_field() }}
                    </form>
                @endauth
            </div>
        </div>
        <div data-dropdown-menu class="
            flex items-end justify-start mt-4
            xs:hidden
            sm:hidden
            md:hidden
        ">
            @include('includes.navigation.page-links')
        </div>
    </div>
</nav>
@push('scripts')
    <script>
        var button = document.querySelector("[data-dropdown-menu-button]")
        var menu = document.querySelector("[data-dropdown-menu]")

        if (button) {
            button.addEventListener("click", function(e) {
                e.preventDefault()
                menu.classList.toggle("xs:hidden")
                menu.classList.toggle("sm:hidden")
            })
        }
    </script>
@endpush
