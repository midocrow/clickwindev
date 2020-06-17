@component('mail::message')
# From: {{ $name }},
# Email: {{ $email }},

Message:
{{ $message }}
@component('mail::button', ['url' => ''])
Reply to this
@endcomponent

Thanks,<br>
@endcomponent


