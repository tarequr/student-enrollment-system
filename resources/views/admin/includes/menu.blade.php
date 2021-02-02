<!-- ========== Left Sidebar Start ========== -->
<div class="left side-menu">
    <div class="slimscroll-menu" id="remove-scroll">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu" id="side-menu">
                <li class="menu-title">Menu</li>

                <li class="{{Request::is('admin/dashboard*') ? 'mm-active' : '' }}">
                    <a href="{{ route('admin.dashboard') }}" class="waves-effect">
                        <i class="icon-accelerator"></i><span class="badge badge-success badge-pill float-right"></span> <span> Dashboard </span>
                    </a>
                </li>

                <li class="{{Request::is('admin/profile/view') || Request::is('admin/profile/edit') ? 'mm-active' : '' }}">
                    <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-user"></i><span> Profile Manage <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span></a>

                    <ul class="submenu">
                        <li class="{{Request::is('admin/profile/view') || Request::is('admin/profile/edit') ? 'mm-active' : '' }}"><a href="{{ route('profile.view') }}">Your Profile</a></li>
                        <li><a href="{{ route('profile.password.view') }}">Change Password</a></li>
                    </ul>

                </li>

                <!-- manage department -->
                <li>
                    <a href="javascript:void(0);" class="waves-effect"><i class="icon-diamond"></i> <span>Department Manage<span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span> </a>
                    <ul class="submenu">
                        <li><a href="{{ route('department.add') }}">Add Department</a></li>
                        <li class="{{ Request::is('department/edit/*') ? 'mm-active' : '' }}"><a href="{{ route('department.view') }}">Manage Department</a></li>
                    </ul>
                </li>

                <!-- manage student -->
                <li>
                    <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-users"></i> <span> Student Information<span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span> </a>
                    <ul class="submenu">
                        <li><a href="{{ route('student.add') }}">Add Student</a></li>
                        <li class="{{ Request::is('student/edit/*') || Request::is('student/details/*') ? 'mm-active' : '' }}"><a href="{{ route('student.view') }}">Manage Student</a></li>
                    </ul>
                </li>

                <!-- Registered student -->
                
                <li class="">
                    <a href="{{ route('dept.wise') }}" class="waves-effect {{ Request::is('student/dept-wise/view/*') || Request::is('teacher/details/*') ? 'mm-active' : '' }} "><i class="fa fa-users"></i><span> Department Wise </span></a>
                </li>

                <!-- Teacher Information -->
                <li>
                    <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-users"></i> <span> Teacher Information<span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span> </a>
                    <ul class="submenu">
                        <li><a href="{{ route('teacher.add') }}">Add Teacher</a></li>
                        <li class="{{ Request::is('teacher/edit/*') || Request::is('teacher/details/*') ? 'mm-active' : '' }}"><a href="{{ route('teacher.view') }}">Manage Teacher</a></li>
                    </ul>teacher
                </li>

            </ul>

        </div>
        <!-- Sidebar -->
        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->
</div>
<!-- Left Sidebar End -->