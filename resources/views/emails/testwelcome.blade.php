@component('mail::message')
# Introduction

Hola {{ $user->name }},

L'aplicació tasks es la polla, gracies per registrarte!
Disfruta de l'experencia!

The body of your message.

@component('mail::button', ['url' => 'https://tasks.marinsan.scool.cat/'])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
