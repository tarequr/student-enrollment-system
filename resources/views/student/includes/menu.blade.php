<!-- ========== Left Sidebar Start ========== -->
<div class="left side-menu">
    <div class="slimscroll-menu" id="remove-scroll">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu" id="side-menu">
                <li class="menu-title">Menu</li>

                <li class="{{Request::is('student/dashboard*') ? 'mm-active' : '' }}">
                    <a href="{{ route('student.dashboard') }}" class="waves-effect">
                        <i class="icon-accelerator"></i><span class="badge badge-success badge-pill float-right"></span> <span> Dashboard </span>
                    </a>
                </li>

                <li class="{{Request::is('student/profile/view') || Request::is('student/profile/edit') ? 'mm-active' : '' }}">
                    <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-user"></i><span> Profile Manage <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span></a>

                    <ul class="submenu">
                        <li class="{{Request::is('student/profile/view') || Request::is('student/profile/edit') ? 'mm-active' : '' }}"><a href="{{ route('student.profile.view') }}">Your Profile</a></li>
                        <li><a href="{{ route('student.profile.password.view') }}">Change Password</a></li>
                    </ul>

                </li>

            </ul>

        </div>
        <!-- Sidebar -->
        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->
</div>
<!-- Left Sidebar End -->