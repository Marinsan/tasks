@component('mail::message')
    # Tasca pendent

    S'ha eliminat la tasca: {{ $task->name }}

    Gràcies,<br>
    {{ config('app.name') }}
@endcomponent
