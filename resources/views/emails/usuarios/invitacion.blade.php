@component('mail::layout')
{{-- Header --}}
@slot('header')
@component('mail::header', ['url' => config('app.url')])
        <!-- header here -->
Sistema de Reservas de Ambientes de la FCyT - UMSS
@endcomponent
@endslot

{{-- Body --}}
        <!-- Body here -->
# Bienvenido al Sistema de Reservas de Ambientes de la FCyT - UMSS

Su nombre de usuario es: {{ $username }} y su contraseña: {{ $password }} <br>
Puede cambiar su contraseña con el siguiente enlace

@component('mail::button', ['url' => 'http://localhost:8000/'])
Presione aqui
@endcomponent

{{-- Subcopy --}}
@slot('subcopy')
@component('mail::subcopy')
        <!-- subcopy here -->
@endcomponent
@endslot


{{-- Footer --}}
@slot('footer')
@component('mail::footer')
        <!-- footer here -->

Facultad de Ciencias y Tecnologia <br>
Universidad Mayor de San Simon <br>
Departamento de Informatica y Sistemas

@endcomponent
@endslot
@endcomponent

