@component('mail::message')
    شما با موفقیت وارد وب سایت شدید
    @component('mail::button', ['url' => url('/')])
        ورود به وب سایت
    @endcomponent
@endcomponent
