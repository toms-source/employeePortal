<style>
    .sidebar {
        width: 20%;
        box-shadow: 0 2px 0 0 white;
        height: 110vh;
    }

    .sidebar-content {
        margin-top: 25px;
        padding: 35px;
        text-emphasis: s
    }

    .btns {
        margin-bottom: 25px;
        width: auto;
        font-size: 1.8vh;
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
        <h5>Navigation</h5>

        <hr style="">
        <div class="btns">
            <a class="nav-link" href="{{ route('dashboard') }}">
                <i class="icon fa-solid fa-home" style="color: #000000;"></i>Main
            </a>
        </div>

        <div class="btns">
            <!-- Document Request -->

            <a class="nav-link" href="{{ route('addemployee') }}">
                      <i class="icon fa-solid fa-repeat" style="color: #000000;"></i>
                  <span class="ml-1">Add Employee</span>
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
