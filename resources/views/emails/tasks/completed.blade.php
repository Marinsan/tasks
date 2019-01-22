@component('mail::message')
    # Tasca pendent

    S'ha marcat com a completada la tasca: {{ $task->name }}

    @component('mail::button', ['url' => url('/tasques')])
        Veure tasca
    @endcomponent

    Gràcies,<br>
    {{ config('app.name') }}
@endcomponent
