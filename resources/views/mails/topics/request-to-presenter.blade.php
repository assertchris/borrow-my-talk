@component('mail::message')
# {{ $topic->name }} has been requested
### by {{ $data['name'] }}

@if (!$topic->willing_to_present && $data['type'] !== config('borrow.roles.speaker'))

We know you'd rather not present the topic yourself, but we thought you'd like to know anyway. You're welcome to decline the request.

@component('mail::button', ['url' => route('topics.requests.decline', $topic)])
Decline the request to present
@endcomponent

Doing so will put the topic into a list for other speakers.

@endif

## About them

Their name is {{ $data['name'] }}, and they're {{ $data['type'] }}.

## About the presentation

@if (isset($data['when']))
They need it around {{ $data['when'] }}.
@endif

@if (isset($data['additional']))
They have some additional information:

> {{ $data['additional'] }}
@endif

@if (isset($data['wants-mentoring']) && $data['wants-mentoring'])
They would also like mentoring, and you've indicated that you would be willing to mentor them on this topic.
@endif

@component('mail::button', ['url' => route('topics.show', $topic)])
Go to topic
@endcomponent
@component('mail::button', ['url' => route('topics.requests.accept', $topic)])
Accept the request to present
@endcomponent
@component('mail::button', ['url' => route('topics.requests.decline', $topic)])
Decline the request to present
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
