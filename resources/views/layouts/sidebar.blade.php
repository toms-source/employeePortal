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

            <a class="nav-link collapsible-link" href="#documentRequest">
                <div class="d-flex align-items-center justify-content-between">
                  <div>
                    <i class="icon fa-solid fa-folder-open" style="color: #000000;"></i>
                    <span class="ml-1">Document Request</span>
                  </div>
                  <i class="fa fa-caret-down"></i>
                </div>
              </a>
              
            <div class="collapse sidebar-submenu" id="documentRequest" data-parent="#sidebarMenu">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link mx-5 text-black" href="{{ route('document') }}"><i class="icon fa-solid fa-clock" style="color: #000000;"></i>Pending</a></li>
                    <li class="nav-item"><a class="nav-link mx-5 text-black" href="{{ route('document2') }}"><i class="icon fa-solid fa-check-circle" style="color: #000000;"></i>Approved</a></li>
                </ul>
            </div>

        </div>

        <div class="btns">
            <!-- Leave Request -->
            <a class="nav-link collapsible-link" href="#leaveRequest">
                <div class="d-flex align-items-center justify-content-between">
                  <div>
                    <i class="icon fa-solid fa-person-walking-arrow-right" style="color: #000000;"></i>
                    <span class="ml-1">Leave Request</span>
                  </div>
                  <i class="fa fa-caret-down"></i>
                </div>
              </a>
              
            <div class="collapse sidebar-submenu" id="leaveRequest" data-parent="#sidebarMenu">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link mx-5 text-black" href="{{ route('leave') }}"><i class="icon fa-solid fa-clock" style="color: #000000;"></i>Pending</a></li>
                    <li class="nav-item"><a class="nav-link mx-5 text-black" href="{{ route('leave2') }}"><i class="icon fa-solid fa-check-circle" style="color: #000000;"></i>Approved</a></li>
                </ul>
            </div>

        </div>

        <div class="btns">
            <!-- Loan Request -->
            <a class="nav-link collapsible-link" href="#loanRequest">
                <div class="d-flex align-items-center justify-content-between">
                  <div>
                    <i class="icon fa-solid fa-money-bill-1" style="color: #000000;"></i>
                    <span class="ml-1">Loan Request</span>
                  </div>
                  <i class="fa fa-caret-down"></i>
                </div>
              </a>
              
            <div class="collapse sidebar-submenu" id="loanRequest" data-parent="#sidebarMenu">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link mx-5 text-black" href="{{ route('loan') }}"><i class="icon fa-solid fa-clock" style="color: #000000;"></i>Pending</a></li>
                    <li class="nav-item"><a class="nav-link mx-5 text-black" href="{{ route('loan2') }}"><i class="icon fa-solid fa-check-circle" style="color: #000000;"></i>Approved</a></li>
                </ul>
            </div>



        </div>

        <div class="btns">
            <!-- Other Request -->

            <a class="nav-link collapsible-link" href="#otherRequest">
                <div class="d-flex align-items-center">
                  <i class="icon fa-solid fa-repeat" style="color: #000000;"></i>
                  <span class="ml-1">Other Request</span>
                  <div class="ml-auto">
                    <i class="fa fa-caret-down"></i>
                  </div>
                </div>
              </a>
              
            <div class="collapse sidebar-submenu" id="otherRequest" data-parent="#sidebarMenu">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link mx-5 text-black" href="{{ route('other') }}"><i class="icon fa-solid fa-clock" style="color: #000000;"></i>Pending</a></li>
                    <li class="nav-item"><a class="nav-link mx-5 text-black" href="{{ route('other2') }}"><i class="icon fa-solid fa-check-circle" style="color: #000000;"></i>Approved</a></li>
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