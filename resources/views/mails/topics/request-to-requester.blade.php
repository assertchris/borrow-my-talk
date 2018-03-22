@component('mail::message')
# You've requested {{ $topic->name }}
### from {{ $topic->user->name }}

@if (!$topic->willing_to_present && $data['type'] !== config('borrow.roles.speaker'))
They've indicated that they do not want to present this topic again, but they may change their mind. Look out for the next email...
@endif

## About them

Their name is {{ $topic->user->name }}.

@if ($topic->user->from_under_represented_group)
They have indicated that they are from an under-represented group.

@if ($topic->user->from_under_represented_group_additional)
They have the following to say about that:

> {{ $topic->user->from_under_represented_group_additional }}
@endif
@endif

@component('mail::button', ['url' => route('topics.show', $topic)])
Go to topic
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
