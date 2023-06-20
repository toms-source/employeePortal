   <!-- FullCalendar JS -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>


   @extends('layouts.app')
   @livewireStyles
   @section('content')
       <div class="d-flex">
           @Include('layouts.sidebar-admin')
           <div class="content container-fluid py-1" style="width: 100%; height: 100vh;">
               {{-- grid --}}
               <div class="col">
                   <h5 class="shadow border fw-bold p-3 mb-3 bg-white rounded">
                       <a href="{{ route('schedule') }}">Schedule</a> > {{ $employee->first_name }} {{ $employee->last_name }} > Manage Schedule
                   </h5>
                   <div class="shadow border fw-bold p-3 mb-3 bg-white rounded">
                       <div class="card-body py-5">
                        <div id="calendar2"></div>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   @endsection
   @livewireScripts




   <script>
       $(document).ready(function() {
           let attendanceRecords = @json($attendanceRecords);

           // Initialize FullCalendar
           var calendar = $('#calendar2').fullCalendar({
               header: {
                   left: 'prev,next today',
                   center: 'title',
                   right: 'month,agendaWeek,agendaDay'
               },
               selectable: true,
               selectHelper: true,
               eventRender: function(event, element) {
                   let time = moment(event.start).format('hh:mm A');
                   if (event.allDay) {
                       element.attr('data-original-title', `${event.title}`)
                           .tooltip({
                               container: 'body'
                           });
                   } else {
                       element.attr('data-original-title', `${event.title} at ${time}`)
                           .tooltip({
                               container: 'body'
                           });
                   }
               },
               events: attendanceRecords.flatMap(function(record) {
                   let checkInEvent = {
                       title: 'Check In',
                       start: record.check_in,
                       allDay: false,
                   };

                   let checkOutEvent = record.check_out ? {
                       title: 'Check Out',
                       start: record.check_out,
                       allDay: false,
                   } : {
                       title: 'Did not Check Out',
                       start: record
                       .check_in, // Still need a time for the event to be displayed on the correct day
                       allDay: true,
                   };

                   return [checkInEvent, checkOutEvent];
               })
           });
       });
   </script>
