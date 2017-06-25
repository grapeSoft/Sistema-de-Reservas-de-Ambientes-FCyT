@if($usuario->tipo  === 'docente')
    @include('reservas.pdf.pdfdocente')
@endif
@if($usuario->tipo  === 'autorizado')
    @include('reservas.pdf.pdfautorizado')
@endif