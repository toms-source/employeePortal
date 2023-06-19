<div>
    <div id='calendar' class="height: 300px"></div>



    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <!-- Modal -->
    <div class="modal fade" id="attendanceModal" tabindex="-1" aria-labelledby="attendanceModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="attendanceModalLabel">Attendance for Today</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Select an action:</p>
                    <button type="button" class="btn btn-success" wire:click="checkIn" data-bs-dismiss="modal">Check
                        In</button>
                    <button type="button" class="btn btn-danger" wire:click="checkOut" data-bs-dismiss="modal">Check
                        Out</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {

        // Initialize fullCalendar
        var calendar = $('#calendar').fullCalendar({
            editable: false,
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            selectable: true,
            selectHelper: true,
            select: function(start, end, allDay) {
                if (moment().format('YYYY-MM-DD') === moment(start).format('YYYY-MM-DD')) {
                    $('#attendanceModal').modal('show');
                }
            },
            eventRender: function(info) {
                var content = "Checked in at " + info.event.extendedProps.check_in_time;
                if (!info.event.extendedProps.check_out_time) {
                    content += " (Not checked out yet)";
                }
                $(info.el).tooltip({
                    title: content
                });
            },
            dayRender: function(date, cell) {
                if (moment().isSame(date, 'day')) {
                    var checkInTime = "{{ $checkintime }}";
                    var checkoutTime = "{{ $checkouttime }}";
                    cell.append('<div class="check-in-time text-center">' + 'Check in: ' + checkInTime  + '</div>');
                    cell.append('<div class="check-in-time text-center">' + 'Check Out: ' + checkoutTime  + '</div>');
                }
            }

        });

        // Livewire listener for the 'loadEvents' event

    });
</script>

