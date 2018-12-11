@component('mail::message')
# Introduction

Hola {{ $userr->name }},

La teva contrasenya per a l'aplicació Tasks és: {{ $user->password }}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
