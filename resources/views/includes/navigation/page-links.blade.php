@link(route('topics.create'), svg('create'), [
    'inline-flex',
    'xs:text-sm',
    'sm:text-base',
])
@auth
    @link(route('topics.index'), 'Topics', [
        'inline-flex ml-4',
        'xs:text-sm',
        'sm:text-base',
    ])
    @link(route('users.settings'), 'Settings', [
        'inline-flex ml-4',
        'xs:text-sm',
        'sm:text-base',
    ])
    @link(route('users.profile', [auth()->user()]), 'Profile', [
        'inline-flex ml-4',
        'xs:text-sm',
        'sm:text-base',
    ])
@endauth