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
                    @svg('menu')
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
                    @link(route('logout'), svg('logout') . ' logout', [
                        'action inline-flex ml-2',
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
