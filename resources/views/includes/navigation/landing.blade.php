<nav class="
    flex justify-end
    xs:p-2
    sm:p-4
    md:p-6
">
    @link(route('topics.create'), 'Create a topic', [
        'xs:text-sm',
        'sm:text-base',
    ])
    @link(route('login'), 'Login', [
        'xs:ml-2 xs:text-sm',
        'sm:ml-4 sm:text-base',
    ])
    @link(route('register'), 'Register', [
        'xs:ml-2 xs:text-sm',
        'sm:ml-4 sm:text-base',
    ])
</nav>
