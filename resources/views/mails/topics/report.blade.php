@component('mail::message')
# A topic has been reported

Someone has reported a topic on {{ config('app.name') }}.

## Reasons

{{ $reasons }}

## Links

@if ($links)
{{ $links }}
@else
There are no links for this report.
@endif

@component('mail::button', ['url' => route('topics.show', $topic)])
Go to topic
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
