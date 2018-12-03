@component('mail::message')
# Introduction

L'aplicació tasks es la polla

The body of your message.

@component('mail::button', ['url' => 'https://tasks.marinsan.scool.cat/'])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
