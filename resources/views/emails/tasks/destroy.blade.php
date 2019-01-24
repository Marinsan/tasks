@component('mail::message')
    # Tasca pendent

    S'ha eliminat la tasca: {{ $task->name }}

    Gràcies,
    {{ config('app.name') }}
@endcomponent
