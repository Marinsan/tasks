@component('mail::message')
# Tasca pendent

S'ha marcat com a pendent la tasca: {{ $task->name }}

@component('mail::button', ['url' => url('/tasques')])
Veure tasca
@endcomponent

Gràcies,
{{ config('app.name') }}
@endcomponent
