<nav class="bg-white h-12 shadow mb-8 px-6 md:px-0">
    <div class="container mx-auto h-full">
        <div class="flex items-center justify-center h-12">
            <div class="flex flex-1 items-center justify-start">
                @link(url('/'), config('app.name', 'Borrow My Topic'), [
                    false, 
                    'inline-flex no-underline font-serif text-grey-darkest',
                    'xs:text-xl xs:p-1',
                    'sm:text-3xl sm:p-2',
                ])
                @link(route('topics.create'), 'Create a topic', [
                    'inline-flex',
                    'xs:text-sm xs:p-1',
                    'sm:text-base sm:p-2',
                ])
                @auth
                    @link(route('topics.index'), 'Topics', [
                        'inline-flex',
                        'xs:text-sm xs:p-1',
                        'sm:text-base sm:p-2',
                    ])
                    @link(route('users.settings'), 'Settings', [
                        'inline-flex',
                        'xs:text-sm xs:p-1',
                        'sm:text-base sm:p-2',
                    ])
                    @link(route('users.profile', [auth()->user()]), 'Profile', [
                        'inline-flex',
                        'xs:text-sm xs:p-1',
                        'sm:text-base sm:p-2',
                    ])
                @endauth
            </div>
            <div class="flex flex-1 align-center justify-end">
                @auth
                    <span class="
                        inline-flex
                        text-grey-darkest
                        xs:text-sm xs:p-1
                        sm:text-base sm:p-2
                    ">{{ auth()->user()->name }}</span>
                    @link(route('logout'), 'Logout', [
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
