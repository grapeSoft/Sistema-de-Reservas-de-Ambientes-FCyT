@if($datosUsuario->tipo  === 'docente')
@include('reservas.pdf.pdfdocente')
@endif
@if($datosUsuario->tipo  === 'autorizado')
@include('reservas.pdf.pdfautorizado')
@endif