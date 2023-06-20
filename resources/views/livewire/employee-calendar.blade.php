   <!-- FullCalendar JS -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>

   <style>
    .custom-event {
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100%;
    }
  </style>
   @extends('layouts.app')
   @livewireStyles
   @section('content')
       <div class="d-flex">
           @Include('layouts.sidebar-admin')
           <div class="content container-fluid py-1" style="width: 100%; height: 100vh;">
               {{-- grid --}}
               <div class="col">
                   <h5 class="shadow border fw-bold p-3 mb-3 bg-white rounded">

                       <a href="{{ route('schedule') }}">Schedule</a> > {{ $employee->first_name }}
                       {{ $employee->last_name }} > Manage Schedule
                   </h5>
                   @livewire('add-schedule', ['user' => $employee->id])
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
           let scheduleRecords = @json($scheduleRecords);

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
               dayRender: function(date, cell) {
                   let dateString = date.format('YYYY-MM-DD');
                   let isWithinSchedule = scheduleRecords.some(function(schedule) {
                       return moment(schedule.start_date).isSameOrBefore(dateString) && moment(
                           schedule.end_date).isSameOrAfter(dateString);
                   });

                   if (isWithinSchedule) {
                       let schedule = scheduleRecords.find(function(schedule) {
                           return moment(schedule.start_date).isSameOrBefore(dateString) &&
                               moment(schedule.end_date).isSameOrAfter(dateString);
                       });

                       console.log('Found schedule:', schedule);

                       let startShift = schedule.start_shift  // Convert start_shift to hours
                       let endShift = schedule.end_shift  // Convert end_shift to hours

                       console.log('Start shift:', startShift);
                       console.log('End shift:', endShift);

                       cell.append('<div class="custom-event text-center mt-4 text-info"> Schedule: ' + startShift + ' - ' + endShift +
                           '</div>');
                   }
               },

               events: function(start, end, timezone, callback) {
                   let events = [];

                   // Add attendance records
                   events.push(...attendanceRecords.flatMap(function(record) {
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

                       return [checkInEvent, checkOutEvent].filter(Boolean);
                   }));

                   // Add schedule records within the selected range
                   scheduleRecords.forEach(function(schedule) {
                       let scheduleStartDate = moment(schedule.start_date).startOf('day');
                       let scheduleEndDate = moment(schedule.end_date).endOf('day');

                       if (scheduleEndDate.isBefore(start) || scheduleStartDate.isAfter(end)) {
                           // The schedule is not within the selected range
                           return;
                       }

                       let scheduleStartDateTime = moment(schedule.start_date).set({
                           'hour': schedule.start_shift /
                           60, // Assuming start_shift is in minutes
                           'minute': schedule.start_shift % 60
                       });

                       let scheduleEndDateTime = moment(schedule.end_date).set({
                           'hour': schedule.end_shift /
                           60, // Assuming end_shift is in minutes
                           'minute': schedule.end_shift % 60
                       });

                       let scheduleEvent = {
                           title: 'Shift',
                           start: scheduleStartDateTime,
                           end: scheduleEndDateTime,
                           allDay: false,
                       };

                       events.push(scheduleEvent);
                   });

                   callback(events);
               }
           });
       });
   </script>
