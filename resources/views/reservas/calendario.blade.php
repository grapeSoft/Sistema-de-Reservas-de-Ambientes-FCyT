@extends('reservas.principal')
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
@section('contenido-principal')						
    <div class="row">
        <div class="col-md-12">
            <div class="cuerpo">
                <div id='calendar'></div>
            </div>
        </div>
    </div>          
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
				    element.append('<div class="text-center" style="color:'+event.textColor+'; margin-top: 30px;"><strong>'+event.title+'</strong></div>');
				}
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
			events:{!!$datos!!}
		});
		
	});

</script>         
@endsection