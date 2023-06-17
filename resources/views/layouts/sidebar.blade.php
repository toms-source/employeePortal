<style>
    .sidebar {
        width: 350px;
        box-shadow: 0 2px 0 0 white;
        height: 100vh;
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
        border-top: 1px solid #087cfc;
    }
</style>

<div class="sidebar shadow align-self-center">
    <div class="sidebar-content"> 
        <h5>Navigation</h5>

        <hr style="">
        <div class="btns">
            <a class="nav-link collapsible-link" href="{{ route('document') }}">
                <i class="icon fa-solid fa-home" style="color: #000000;"></i>Main
            </a>
        </div>


        <div class="btns">
            <!-- Document Request -->

            <a class="nav-link collapsible-link" href="#documentRequest">
                <i class="icon fa-solid fa-folder-open" style="color: #000000;"></i>Document Request
                <i class="fa fa-caret-down"></i>
            </a>
            <div class="collapse sidebar-submenu" id="documentRequest" data-parent="#sidebarMenu">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link mx-5" href="{{ route('document') }}">Pending</a></li>
                    <li class="nav-item"><a class="nav-link mx-5" href="{{ route('document2') }}">Approved</a></li>
                </ul>
            </div>

        </div>

        <div class="btns">
            <!-- Leave Request -->
            <a class="nav-link collapsible-link" href="#leaveRequest">
                <i class="icon fa-solid fa-person-walking-arrow-right" style="color: #000000;"></i>Leave Request
                <i class="fa fa-caret-down"></i>
            </a>
            <div class="collapse sidebar-submenu" id="leaveRequest" data-parent="#sidebarMenu">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link mx-5" href="{{ route('leave') }}">Pending</a></li>
                    <li class="nav-item"><a class="nav-link mx-5" href="{{ route('leave2') }}">Approved</a></li>
                </ul>
            </div>

        </div>

        <div class="btns">
            <!-- Loan Request -->
            <a class="nav-link collapsible-link" href="#loanRequest">
                <i class="icon fa-solid fa-money-bill-1" style="color: #000000;"></i> Loan Request
                <i class="fa fa-caret-down"></i>
            </a>
            <div class="collapse sidebar-submenu" id="loanRequest" data-parent="#sidebarMenu">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link mx-5" href="{{ route('loan') }}">Pending</a></li>
                    <li class="nav-item"><a class="nav-link mx-5" href="{{ route('loan2') }}">Approved</a></li>
                </ul>
            </div>



        </div>

        <div class="btns">
            <!-- Other Request -->

            <a class="nav-link collapsible-link" href="#otherRequest">
                <i class="icon fa-solid fa-repeat" style="color: #000000;"></i>Other Request
                <i class="fa fa-caret-down"></i>
            </a>
            <div class="collapse sidebar-submenu" id="otherRequest" data-parent="#sidebarMenu">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link mx-5" href="{{ route('other') }}">Pending</a></li>
                    <li class="nav-item"><a class="nav-link mx-5" href="{{ route('other2') }}">Approved</a></li>
                </ul>
            </div>

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
