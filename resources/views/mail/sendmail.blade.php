@component('mail::message')

Dear {{ $user->first_name }} {{ $user->last_name }}
<br>
<h3 style="background: green;color: #fff">{{ $subject }} </h3><br>
{!! $messege !!}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
