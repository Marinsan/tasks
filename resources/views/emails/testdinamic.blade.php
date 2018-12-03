@component('mail::message')
# Introduction

Hola {{ $user->name }}

Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis culpa doloribus, error exercitationem molestias nisi non perspiciatis repudiandae, sint, tenetur totam ullam. Deleniti id inventore maxime minima numquam praesentium quas?

The body of your message.

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

@component('mail::table')
    | Laravel       | Table         | Example  |
    | ------------- |:-------------:| --------:|
    | Col 2 is      | Centered      | $10      |
    | Col 3 is      | Right-Aligned | $20      |
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
