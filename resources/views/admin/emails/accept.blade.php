{{--  @component('mail::message')
# Reset Account
{{--  Welcome {{ $data['data']->name }}<br>  --}}
The body of your message.  

{{--  @component('mail::button', ['url' => url('/home')])  --}}
Click here to active your Account
{{--  @endcomponent  --}}
{{--  Or <br>  --}}
{{--  Copy this link    --}}
<a href="{{ url('home') }}">Click here to login</a>
{{--  Thanks,<br>
{{ config('app.name') }}  --}}
{{--  @endcomponent  --}}
Thanks
