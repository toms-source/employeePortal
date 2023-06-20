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

                       <a href="{{ route('schedule') }}">Schedule</a> > {{ $employee->first_name }}
                       {{ $employee->last_name }} > Manage Schedule
                   </h5>
                   <div class="d-flex justify-content-end mb-3">
                       <a href="" class="btn btn-outline-success" data-bs-toggle="modal"
                           data-bs-target="#addScheduleModal"><i class="fas fa-plus"></i> Add Schedule</a>
                   </div>
                   <div class="shadow border fw-bold p-3 mb-3 bg-white rounded">
                       <div class="card-body py-5">


                           <div id="calendar2"></div>
                       </div>
                   </div>
               </div>
           </div>
       </div>


       <!-- Add Schedule Modal -->
       <div class="modal fade" id="addScheduleModal" tabindex="-1" aria-labelledby="addScheduleModalLabel"
           aria-hidden="true">
           <div class="modal-dialog">
               <div class="modal-content">
                   <div class="modal-header">
                       <h5 class="modal-title" id="addScheduleModalLabel">Add Schedule</h5>
                       <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                   </div>
                   <form wire:submit.prevent="addSchedule">
                       <div class="modal-body">
                           <div class="mb-3">
                               <label for="startDate" class="form-label">Start Date</label>
                               <input type="date" class="form-control" id="startDate" wire:model="startDate">
                           </div>
                           <div class="mb-3">
                               <label for="endDate" class="form-label">End Date</label>
                               <input type="date" class="form-control" id="endDate" wire:model="endDate">
                           </div>
                           <div class="mb-3">
                               <label for="startShift" class="form-label">Start Shift</label>
                               <input type="time" class="form-control" id="startShift" wire:model="startShift">
                           </div>
                           <div class="mb-3">
                               <label for="endShift" class="form-label">End Shift</label>
                               <input type="time" class="form-control" id="endShift" wire:model="endShift">
                           </div>
                       </div>
                       <div class="modal-footer">
                           <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                           <button type="submit" class="btn btn-primary">Add Schedule</button>
                       </div>
                   </form>
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

                   let startShiftEvent = record.start_shift ? {
                       title: 'Start Shift',
                       start: record.start_shift,
                       allDay: false,
                   } : null;

                   let endShiftEvent = record.end_shift ? {
                       title: 'End Shift',
                       start: record.end_shift,
                       allDay: false,
                   } : null;
                   
                   return [checkInEvent, checkOutEvent, startShiftEvent, endShiftEvent].filter(
                       Boolean);
               })

           });
       });
   </script>
