<style>
    .sidebar {
        width: 25%;
        box-shadow: 0 2px 0 0 white;
        height: 110vh;
        position: sticky;
        top: 0;
        overflow: hidden;
    }

    .content {
        margin-top: 50px;
        padding: 35px;
        flex: 1;
        overflow-y: scroll;
        height: 100vh; 
    }

    .btns {
        padding-left: 30px;
        margin-bottom: 25px;
        width: auto;
    }

    .icon {
        margin-right: 3px;
    }

    hr {
        border-top: 1px solid #000000;
    }
</style>

<div class="sidebar shadow align-self-center">
    <div class="sidebar-content"> 
        <h4 class="text-center fw-bold mx-2 mt-5"><i class="fa-solid fa-user-lock m-3"></i>Admin Navigation</h4>

    

        <div class="btns">
            <a class="nav-link" href="{{ route('admin.dashboard') }}">
                <i class="icon fa-solid fa-home" style="color: #000000;"></i>Home
            </a>
        </div>
        
        <div class="btns">
            <a class="nav-link" href="{{ route('admin.profile') }}">
                <i class="icon fa-solid fa-user" style="color: #000000;"></i>Profile
            </a>
        </div>
        
        <div class="btns">
            <a class="nav-link" href="{{ route('attendance2') }}">
                <i class="icon fa-solid fa-calendar" style="color: #000000;"></i>Attendance
            </a>
        </div>
        
        <div class="btns">
            <a class="nav-link" href="">
                <i class="icon fa-solid fa-file-alt" style="color: #000000;"></i>Payslips
            </a>
        </div>
        
        <div class="btns">
            <a class="nav-link" href="{{ route('admin.dashboard') }}" style="text-decoration: underline;">
                <i class="" style="color: #000000;"></i>Admin Panel
            </a>
        </div>
        
        <div class="btns">
            <a class="nav-link" href="{{ route('admin.employee.list')}}">
                <i class="icon fa-solid fa-users" style="color: #000000;"></i>Employees
            </a>
        </div>
        
        <div class="btns">
            <a class="nav-link" href="{{ route('admin.department')}}">
                <i class="icon fa-solid fa-building" style="color: #000000;"></i>Departments
            </a>
        </div>
        
        <div class="btns">
            <a class="nav-link" href="{{ route('schedule') }}">
                <i class="icon fa-solid fa-clock" style="color: #000000;"></i>Schedules
            </a>
        </div>
        
        <div class="btns">
            <a class="nav-link" href="{{ route('salary') }}">
                <i class="icon fa-solid fa-money-bill" style="color: #000000;"></i>Salaries
            </a>
        </div>
        
        <div class="btns">
            <a class="nav-link" href="{{ route('payroll') }}">
                <i class="icon fa-solid fa-money-check" style="color: #000000;"></i>Payroll
            </a>
        </div>
        
        <div class="btns">
            <a class="nav-link" href="{{ route('announcement') }}">
                <i class="icon fa-solid fa-bullhorn" style="color: #000000;"></i>Announcements
            </a>
        </div>
        

        <div class="btns">
            <!-- Document Request -->

            <a class="nav-link" href="{{ route('admindpen') }}">
                <i class="icon fa-solid fa-folder-open" style="color: #000000;"></i>
                <span class="ml-1">Document Request</span>
            </a>
        </div>

        
        <div class="btns">
            <!-- Document Request -->

            <a class="nav-link" href="{{ route('adminleave') }}">
                <i class="icon fa-solid fa-person-walking-arrow-right" style="color: #000000;"></i>
                <span class="ml-1">Leave Request</span>
            </a>
        </div>
        <div class="btns">
            <!-- Document Request -->

            <a class="nav-link" href="{{ route('adminloan') }}">
                <i class="icon fa-solid fa-money-bill-1" style="color: #000000;"></i>
                    <span class="ml-1">Loan Request</span>
            </a>
        </div>

        <div class="btns">
            <!-- Document Request -->

            <a class="nav-link" href="{{ route('adminother') }}">
                      <i class="icon fa-solid fa-repeat" style="color: #000000;"></i>
                  <span class="ml-1">Other Request</span>
            </a>
        </div>


    </div>
</div>


<script>
    $(document).ready(function() {
        $('.nav-link[data-bs-toggle="collapse"]').on('click', function() {
            $('.sidebar-submenu').collapse('hide');
        });
    });
</script>

<script>
    $(document).ready(function() {
        $('.collapsible-link').on('click', function(event) {
            event.preventDefault(); // Prevent default action

            // Get target submenu
            var targetSubmenu = $($(this).attr('href'));

            // Hide all other submenus
            $('.sidebar-submenu').not(targetSubmenu).collapse('hide');

            // Toggle the target submenu
            targetSubmenu.collapse('toggle');
        });
    });
</script>
