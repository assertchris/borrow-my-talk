<nav class="
    @if (Route::is('users.profile'))
        h-2
        bg-brand-light
        hover:h-16
    @else
        h-16
        bg-white
    @endif
    mb-8 px-6 overflow-hidden
    transform-all transform-duration-1 transform-timing-linear
    md:px-0
">
    <div class="container mx-auto h-full">
        <div class="
            h-auto
            flex items-end justify-center
        ">
            <div class="flex flex-1 items-end justify-start">
                @link(url('/'), config('app.name', 'Borrow My Topic'), [
                    false, 
                    Route::is('users.profile') ? 'text-white' : 'text-grey-darkest',
                    'inline-flex no-underline font-serif text-grey-darkest whitespace-no-wrap -mb-1',
                    'xs:text-xl xs:p-1',
                    'sm:text-3xl sm:p-2',
                ])
                @link(route('topics.create'), 'Create a topic', [
                    false,
                    Route::is('users.profile') ? 'text-white' : 'text-brand-light',
                    'inline-flex',
                    'xs:text-sm xs:p-1',
                    'sm:text-base sm:p-2',
                ])
                @auth
                    @link(route('topics.index'), 'Topics', [
                        false,
                        Route::is('users.profile') ? 'text-white' : 'text-brand-light',
                        'inline-flex',
                        'xs:text-sm xs:p-1',
                        'sm:text-base sm:p-2',
                    ])
                    @link(route('users.settings'), 'Settings', [
                        false,
                        Route::is('users.profile') ? 'text-white' : 'text-brand-light',
                        'inline-flex',
                        'xs:text-sm xs:p-1',
                        'sm:text-base sm:p-2',
                    ])
                    @link(route('users.profile', [auth()->user()]), 'Profile', [
                        false,
                        Route::is('users.profile') ? 'text-white' : 'text-brand-light',
                        'inline-flex',
                        'xs:text-sm xs:p-1',
                        'sm:text-base sm:p-2',
                    ])
                @endauth
            </div>
            <div class="flex flex-1 align-center justify-end">
                @auth
                    <span class="
                        @if (Route::is('users.profile'))
                            text-white
                        @else
                            text-grey-darkest
                        @endif
                        inline-flex
                        xs:text-sm xs:p-1
                        sm:text-base sm:p-2
                    ">{{ auth()->user()->name }}</span>
                    @link(route('logout'), 'Logout', [
                        false,
                        Route::is('users.profile') ? 'text-white' : 'text-brand-light',
                        'inline-flex',
                        'xs:text-sm xs:p-1',
                        'sm:text-base sm:p-2',
                    ], 'onclick="event.preventDefault(); document.getElementById(\'logout\').submit();"')
                    <form id="logout" action="{{ route('logout') }}" method="POST" class="hidden">
                        {{ csrf_field() }}
                    </form>
                @endauth
            </div>
        </div>
    </div>
</nav>
