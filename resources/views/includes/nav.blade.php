@if (Route::is('landing'))
    <nav class="
        flex justify-end
        xs:p-2
        sm:p-4
        md:p-6
    ">
        <a class="
            text-brand-light
            xs:text-sm
            sm:text-base
        " href="{{ route('login') }}">Login</a>
        <a class="
            text-brand-light
            xs:ml-2 xs:text-sm
            sm:ml-4 sm:text-base
        " href="{{ route('register') }}">Register</a>
    </nav>
@else
    <nav class="bg-white h-12 shadow mb-8 px-6 md:px-0">
        <div class="container mx-auto h-full">
            <div class="flex items-center justify-center h-12">
                <div class="mr-6">
                    <a href="{{ url('/') }}" class="no-underline">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>
                <div class="flex-1 text-left">
                    <a class="no-underline hover:underline text-grey-darker pr-3 text-sm" href="{{ route('topics.create') }}">{{ __('Submit a topic') }}</a>
                    @auth
                        <a class="no-underline hover:underline text-grey-darker pr-3 text-sm" href="{{ route('topics.index') }}">{{ __('Topics') }}</a>
                        <a class="no-underline hover:underline text-grey-darker pr-3 text-sm" href="{{ route('users.settings') }}">{{ __('Settings') }}</a>
                        <a class="no-underline hover:underline text-grey-darker pr-3 text-sm" href="{{ route('users.profile', [auth()->user()->handle]) }}">{{ __('Profile') }}</a>
                    @endauth
                </div>
                <div class="flex-1 text-right">
                    @guest
                        <a class="no-underline hover:underline text-grey-darker pr-3 text-sm" href="{{ url('/login') }}">Login</a>
                        <a class="no-underline hover:underline text-grey-darker text-sm" href="{{ url('/register') }}">Register</a>
                    @else
                        <span class="text-grey-darker text-sm pr-4">{{ Auth::user()->name }}</span>

                        <a href="{{ route('logout') }}"
                            class="no-underline hover:underline text-grey-darker text-sm"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    @endguest
                </div>
            </div>
        </div>
    </nav>
@endif