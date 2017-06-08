@extends('calendario.principal')

@section('style')
	<link href="{!! asset('css/FullCalendar/jquery-ui.min.css') !!}" rel="stylesheet"/>				
	<link href="{!! asset('css/FullCalendar/fullcalendar.css') !!}" rel="stylesheet"/>
	<link href="{!! asset('css/FullCalendar/fullcalendar.print.min.css') !!}" rel="stylesheet" media='print' />
	<style>
		.cuerpo {
			margin: 40px 0px;
			padding: 0;
			font-size: 14px;
		}
		#calendar {
			max-width: 1000px;
			margin: 0 auto;
		}
	</style>  
@endsection
@section('contenido-principal-calendario')
	@if(session('mensaje'))
		<div class="alert alert-success">
			{{ session('mensaje') }}
		</div>
	@endif
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="cuerpo">
				<div id='calendar'></div>
			</div>
		</div>
	</div>
	@include('calendario.detalle')
@endsection
@section('script')
	<script src="{!! asset('js/FullCalendar/moment.min.js') !!}"></script>
	<script src="{!! asset('js/FullCalendar/fullcalendar.js') !!}"></script>
	<script src="{!! asset('js/FullCalendar/es.js') !!}"></script>
	<script>
	$(document).ready(function() {
		$('#calendar').fullCalendar({
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,agendaWeek,agendaDay'
			},
			eventRender: function(event, element, view ){
				if(event.rendering === "background"){
				    element.append( event.title);
				}
			},
			eventClick:  function(event, jsEvent, view) {
                $('#modalTitle').html(event.title);
                $('#start').html(moment(event.start).format('h:mm a'));
                $('#end').html(moment(event.end).format('h:mm a'));
                $('#type').html(event.type);
                $('#eventInfo').html(event.eventInfo);
                $('#detalle').modal();
                return false;
            },
			hiddenDays: [0],
			allDaySlot: false,
			/*duration: '00:45:00',*/
			slotDuration: '00:22:30',
			slotLabelFormat: 'hh:mm a',
			slotLabelInterval: '00:45:00',
			snapDuration: '01:30:00',
			scrollTime: "06:45:00",
			minTime: "06:45:00",
			maxTime: "21:45:00",			
			defaultDate: '2017-05-12',
			navLinks: true, // can click day/week names to navigate views
			editable: false,
			eventLimit: true, // allow "more" link when too many events
			events: {!!$datos!!}
			/*[
				{
					"id":1,
					"title":"Calancha navia Boris",
					"type":"Examen",
					"eventInfo":"<strong>Materia: </strong> Calculo 1  <strong>Grupo: </strong> 2<br><strong>Materia: </strong> Calculo 1  <strong>Grupo: </strong> 2",
					"start":"2017-05-19 06:45:00",
					"end":"2017-05-19 08:15:00",
					"color":"#009688"
				}
			]*/
		});
		
	});

</script>         
@endsection