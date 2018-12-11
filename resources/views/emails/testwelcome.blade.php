@component('mail::message')
# Introduction

Hola {{ $user->name }},

Benvingut a l'aplicació tasks, gràcies per registrar-te!

En aquesta App podràs guardar les tasques pendents que tinguis! Així mateix com assignar una tasca a un usuari,
poder completar-la i eliminar-la! No deixis cap tasca a mitges! Apuntala i completa-la com més aviat millor!

Gaudeix de l'experiència!

The body of your message.

@component('mail::button', ['url' => 'https://tasks.marinsan.scool.cat/'])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
