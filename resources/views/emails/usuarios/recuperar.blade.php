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
# RECUPERACION DE USUARIO O CONTRASEÑA SISRESERVA FCyT - UMSS

Su nombre de usuario es: {{ $username }} , se reseteo su contraseña por favor ingrese al sistema con la siguiente contraseña: {{ $password }} y cambielo desde su perfil ... <br>
INGRESE AL SISTEMA DESDE EL SIGUIENTE ENLACE...

@component('mail::button', ['url' => 'http://grapesoft.hosting.cs.umss.edu.bo'])
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

