<nav class="
    flex justify-end
    xs:p-2
    sm:p-4
    md:p-6
">
    @link(route('topics.create'), '
        <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="14" height="16">
            <path d="M400 32H48C21.5 32 0 53.5 0 80v352c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V80c0-26.5-21.5-48-48-48zm-32 252c0 6.6-5.4 12-12 12h-92v92c0 6.6-5.4 12-12 12h-56c-6.6 0-12-5.4-12-12v-92H92c-6.6 0-12-5.4-12-12v-56c0-6.6 5.4-12 12-12h92v-92c0-6.6 5.4-12 12-12h56c6.6 0 12 5.4 12 12v92h92c6.6 0 12 5.4 12 12v56z"/>
        </svg>
    ', [
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
