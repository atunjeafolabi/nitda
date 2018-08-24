@component('mail::message')
# Introduction

Please click on the link below to activate your account.

@component('mail::button', ['url' => route('applicant.email.verify', ['email_activation_token' => $email_activation_token])])
Click Here To Activate
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
