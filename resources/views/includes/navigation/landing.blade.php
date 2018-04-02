<nav class="
    flex justify-end
    xs:p-2
    sm:p-4
    md:p-6
">
    @link(route('topics.create'), svg('create'), [
        'xs:text-sm',
        'sm:text-base',
    ])
    @guest
        @link(route('login'), 'Login', [
            'xs:ml-2 xs:text-sm',
            'sm:ml-4 sm:text-base',
        ])
        @link(route('register'), 'Register', [
            'xs:ml-2 xs:text-sm',
            'sm:ml-4 sm:text-base',
        ])
    @else
        @link(route('home'), 'Dashboard', [
            'xs:ml-2 xs:text-sm',
            'sm:ml-4 sm:text-base',
        ])
    @endguest
</nav>
