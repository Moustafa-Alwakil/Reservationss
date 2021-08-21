<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from doccure-html.dreamguystech.com/template/admin/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 22 Mar 2021 19:28:42 GMT -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ url('website/assets/img/favicon.png') }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ url('dashboard/assets/css/bootstrap.min.css') }}">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{ url('dashboard/assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href={{ url('dashboard/assets/plugins/fontawesome/css/all.min.css') }}>

    <!-- Feathericon CSS -->
    <link rel="stylesheet" href="{{ url('dashboard/assets/css/feathericon.min.css') }}">

    <link rel="stylesheet" href="{{ url('dashboard/assets/plugins/morris/morris.css') }}">

    <!-- Datatables CSS -->
    <link rel="stylesheet" href="{{ url('dashboard/assets/plugins/datatables/datatables.min.css') }}">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ url('dashboard/assets/css/style.css') }}">

    <!--[if lt IE 9]>
   <script src="{{ url('dashboard/assets/js/html5shiv.min.js') }}"></script>
   <script src="{{ url('dashboard/assets/js/respond.min.js') }}"></script>
  <![endif]-->
</head>

<body>

    <!-- Main Wrapper -->
    <div class="main-wrapper">

        <!-- Header -->
        <div class="header">

            <!-- Logo -->
            <div class="header-left">
                <a href="{{ route('admin.index') }}" class="logo">
                    <img src="{{ url('dashboard/assets/img/logo.png') }}" alt="Logo">
                </a>
                <a href="{{ route('admin.index') }}" class="logo logo-small">
                    <img src="{{ url('dashboard/assets/img/logo-small.png') }}" alt="Logo" width="30" height="30">
                </a>
            </div>
            <!-- /Logo -->

            <a href="javascript:void(0);" id="toggle_btn">
                <i class="fe fe-text-align-left"></i>
            </a>


            <!-- Mobile Menu Toggle -->
            <a class="mobile_btn" id="mobile_btn">
                <i class="fa fa-bars"></i>
            </a>
            <!-- /Mobile Menu Toggle -->

            <!-- Header Right Menu -->
            <ul class="nav user-menu">


                <!-- User Menu -->
                <li class="nav-item dropdown has-arrow">
                    <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                        <span class="user-img">{{ ucwords(Auth::guard('admin')->user()->name) }}</span>
                    </a>
                    <div class="dropdown-menu">
                        <div class="user-header">
                            <div class="user-text">
                                <h6>{{ ucwords(Auth::guard('admin')->user()->name) }}</h6>
                                <p class="text-muted mb-0">Administrator</p>
                            </div>
                        </div>
                        <a class="dropdown-item" href="{{ route('admin.profile') }}">My Profile</a>
                        <a class="dropdown-item" href="{{ route('admin.changepass') }}">Change Password</a>
                        <form method="POST" class="d-inline" action="{{ route('admin.logout') }}">
                            @csrf
                            <button class="dropdown-item" type="submit">Logout</button>
                        </form>
                    </div>
                </li>
                <!-- /User Menu -->

            </ul>
            <!-- /Header Right Menu -->

        </div>
        <!-- /Header -->
        @if (!(Request::url() == route('admin.verification.notice')))
            <!-- Sidebar -->
            <div class="sidebar" id="sidebar">
                <div class="sidebar-inner slimscroll">
                    <div id="sidebar-menu" class="sidebar-menu">
                        <ul>
                            <li class="menu-title">
                                <span>Main</span>
                            </li>
                            <li class="@if (route('admin.index')==Request::url()) {{ 'active' }} @endif">
                                <a href="{{ route('admin.index') }}"><i class="fe fe-home"></i>
                                    <span>Dashboard</span></a>
                            </li>
                            <li class="submenu">
                                <a class="@if(Request::url() == route('addresses.index')||Request::url()==route('addresses.create')) {{'subdrop'}} @endif"><i class="fas fa-map-marked-alt"></i><span>&nbsp; Addresses</span> <span
                                        class="menu-arrow"></span></a>
                                <ul style="display:  @if(Request::url() == route('addresses.index')||Request::url()==route('addresses.create')) {{'block'}} @endif;">
                                    <li class="@if (route('addresses.index')==Request::url()) {{ 'active' }} @endif"><a
                                            href="{{ route('addresses.index') }}">All Addresses</a></li>
                                    <li class="@if (route('addresses.create')==Request::url()) {{ 'active' }} @endif"><a
                                            href="{{ route('addresses.create') }}">Add Address</a></li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a class="@if(Request::url() == route('appointments.index')||Request::url()==route('appointments.create')) {{'subdrop'}} @endif"><i class="far fa-calendar-alt"></i><span>&nbsp; Appointments</span> <span
                                        class="menu-arrow"></span></a>
                                <ul style="display:  @if(Request::url() == route('appointments.index')||Request::url()==route('appointments.create')) {{'block'}} @endif;">
                                    <li class="@if (route('appointments.index')==Request::url()) {{ 'active' }} @endif"><a
                                            href="{{ route('appointments.index') }}">All Appointments</a></li>
                                    <li class="@if (route('appointments.create')==Request::url()) {{ 'active' }} @endif"><a
                                            href="{{ route('appointments.create') }}">Add Appointment</a></li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a class="@if(Request::url() == route('certificates.index')||Request::url()==route('certificates.create')) {{'subdrop'}} @endif"><i class="fas fa-certificate"></i><span>&nbsp; Certificates</span> <span
                                        class="menu-arrow"></span></a>
                                <ul style="display:  @if(Request::url() == route('certificates.index')||Request::url()==route('certificates.create')) {{'block'}} @endif;">
                                    <li class="@if (route('certificates.index')==Request::url()) {{ 'active' }} @endif"><a
                                            href="{{ route('certificates.index') }}">All Certificates</a></li>
                                    <li class="@if (route('certificates.create')==Request::url()) {{ 'active' }} @endif"><a
                                            href="{{ route('certificates.create') }}">Add Certificate</a></li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a class="@if(Request::url() == route('cities.index')||Request::url()==route('cities.create')) {{'subdrop'}} @endif"><i class="fas fa-city"></i><span>&nbsp; Cities</span> <span
                                        class="menu-arrow"></span></a>
                                <ul style="display:  @if(Request::url() == route('cities.index')||Request::url()==route('cities.create')) {{'block'}} @endif;">
                                    <li class="@if (route('cities.index')==Request::url()) {{ 'active' }} @endif"><a
                                            href="{{ route('cities.index') }}">All Cities</a></li>
                                    <li class="@if (route('cities.create')==Request::url()) {{ 'active' }} @endif"><a
                                            href="{{ route('cities.create') }}">Add City</a></li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a class="@if(Request::url() == route('departments.index')||Request::url()==route('departments.create')) {{'subdrop'}} @endif"><i class="fas fa-glasses"></i><span>&nbsp; Departments</span> <span
                                        class="menu-arrow"></span></a>
                                <ul style="display:  @if(Request::url() == route('departments.index')||Request::url()==route('departments.create')) {{'block'}} @endif;">
                                    <li class="@if (route('departments.index')==Request::url()) {{ 'active' }} @endif"><a
                                            href="{{ route('departments.index') }}">All Departments</a></li>
                                    <li class="@if (route('departments.create')==Request::url()) {{ 'active' }} @endif"><a
                                            href="{{ route('departments.create') }}">Add Department</a></li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a class="@if(Request::url() == route('examfees.index')||Request::url()==route('examfees.create')) {{'subdrop'}} @endif"><i class="fas fa-dollar-sign"></i><span>&nbsp; Examfees</span> <span
                                        class="menu-arrow"></span></a>
                                <ul style="display:  @if(Request::url() == route('examfees.index')||Request::url()==route('examfees.create')) {{'block'}} @endif;">
                                    <li class="@if (route('examfees.index')==Request::url()) {{ 'active' }} @endif"><a
                                            href="{{ route('examfees.index') }}">All Examfees</a></li>
                                    <li class="@if (route('examfees.create')==Request::url()) {{ 'active' }} @endif"><a
                                            href="{{ route('examfees.create') }}">Add Examfee</a></li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a class="@if(Request::url() == route('clinicphotos.index')||Request::url()==route('clinicphotos.create')) {{'subdrop'}} @endif"><i class="fas fa-images"></i><span>&nbsp; Clinics Photos</span> <span
                                        class="menu-arrow"></span></a>
                                <ul style="display: @if(Request::url() == route('clinicphotos.index')||Request::url()==route('clinicphotos.create')) {{'block'}} @endif;">
                                    <li class="@if (route('clinicphotos.index')==Request::url()) {{ 'active' }} @endif"><a
                                            href="{{ route('clinicphotos.index') }}">All Clinics Photos</a></li>
                                    <li class="@if (route('clinicphotos.create')==Request::url()) {{ 'active' }} @endif"><a
                                            href="{{ route('clinicphotos.create') }}">Add Clinic Photos</a></li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a class="@if(Request::url() == route('exceptions.index')||Request::url()==route('exceptions.create')) {{'subdrop'}} @endif"><i class="far fa-bell"></i><span>&nbsp; Exceptions</span> <span
                                        class="menu-arrow"></span></a>
                                <ul style="display:  @if(Request::url() == route('exceptions.index')||Request::url()==route('exceptions.create')) {{'block'}} @endif;">
                                    <li class="@if (route('exceptions.index')==Request::url()) {{ 'active' }} @endif"><a
                                            href="{{ route('exceptions.index') }}">All Exceptions</a></li>
                                    <li class="@if (route('exceptions.create')==Request::url()) {{ 'active' }} @endif"><a
                                            href="{{ route('exceptions.create') }}">Add Exception</a></li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a class="@if(Request::url() == route('experiences.index')||Request::url()==route('experiences.create')) {{'subdrop'}} @endif"><i class="fas fa-briefcase"></i><span>&nbsp; Experiences</span> <span
                                        class="menu-arrow"></span></a>
                                <ul style="display:  @if(Request::url() == route('experiences.index')||Request::url()==route('experiences.create')) {{'block'}} @endif;">
                                    <li class="@if (route('experiences.index')==Request::url()) {{ 'active' }} @endif"><a
                                            href="{{ route('experiences.index') }}">All Experiences</a></li>
                                    <li class="@if (route('experiences.create')==Request::url()) {{ 'active' }} @endif"><a
                                            href="{{ route('experiences.create') }}">Add Experience</a></li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a class="@if(Request::url() == route('infos.index')||Request::url()==route('infos.create')) {{'subdrop'}} @endif"><i class="fas fa-info-circle"></i><span>&nbsp; Inforamtions</span> <span
                                        class="menu-arrow"></span></a>
                                <ul style="display:  @if(Request::url() == route('infos.index')||Request::url()==route('infos.create')) {{'block'}} @endif;">
                                    <li class="@if (route('infos.index')==Request::url()) {{ 'active' }} @endif"><a
                                            href="{{ route('infos.index') }}">All Inforamtions</a></li>
                                    <li class="@if (route('infos.create')==Request::url()) {{ 'active' }} @endif"><a
                                            href="{{ route('infos.create') }}">Add Inforamtion</a></li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a class="@if(Request::url() == route('regions.index')||Request::url()==route('regions.create')) {{'subdrop'}} @endif"><i class="fas fa-building"></i><span>&nbsp; Regions</span> <span
                                        class="menu-arrow"></span></a>
                                <ul style="display:  @if(Request::url() == route('regions.index')||Request::url()==route('regions.create')) {{'block'}} @endif;">
                                    <li class="@if (route('regions.index')==Request::url()) {{ 'active' }} @endif"><a
                                            href="{{ route('regions.index') }}">All Regions</a></li>
                                    <li class="@if (route('regions.create')==Request::url()) {{ 'active' }} @endif"><a
                                            href="{{ route('regions.create') }}">Add Region</a></li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a class="@if(Request::url() == route('workdays.index')||Request::url()==route('workdays.create')) {{'subdrop'}} @endif"><i class="fas fa-user-clock"></i><span>&nbsp; Workdays</span> <span
                                        class="menu-arrow"></span></a>
                                <ul style="display:  @if(Request::url() == route('workdays.index')||Request::url()==route('workdays.create')) {{'block'}} @endif;">
                                    <li class="@if (route('workdays.index')==Request::url()) {{ 'active' }} @endif"><a
                                            href="{{ route('workdays.index') }}">All Workdays</a></li>
                                    <li class="@if (route('workdays.create')==Request::url()) {{ 'active' }} @endif"><a
                                            href="{{ route('workdays.create') }}">Add Workday</a></li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a class="@if(Request::url() == route('services.index')||Request::url()==route('services.create')) {{'subdrop'}} @endif"><i class="fas fa-flask"></i><span>&nbsp; Services</span> <span
                                        class="menu-arrow"></span></a>
                                <ul style="display:  @if(Request::url() == route('services.index')||Request::url()==route('services.create')) {{'block'}} @endif;">
                                    <li class="@if (route('services.index')==Request::url()) {{ 'active' }} @endif"><a
                                            href="{{ route('services.index') }}">All Services</a></li>
                                    <li class="@if (route('services.create')==Request::url()) {{ 'active' }} @endif"><a
                                            href="{{ route('services.create') }}">Add Service</a></li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a class="@if(Request::url() == route('reviews.index')||Request::url()==route('reviews.create')) {{'subdrop'}} @endif"><i class="fas fa-comments"></i><span>&nbsp; Reviews</span> <span
                                        class="menu-arrow"></span></a>
                                <ul style="display:  @if(Request::url() == route('reviews.index')||Request::url()==route('reviews.create')) {{'block'}} @endif;">
                                    <li class="@if (route('reviews.index')==Request::url()) {{ 'active' }} @endif"><a
                                            href="{{ route('reviews.index') }}">All Reviews</a></li>
                                    <li class="@if (route('reviews.create')==Request::url()) {{ 'active' }} @endif"><a
                                            href="{{ route('reviews.create') }}">Add Review</a></li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a class="@if(Request::url() == route('clinicservices.index')||Request::url()==route('clinicservices.create')) {{'subdrop'}} @endif"><i class="fas fa-flask"></i><span>&nbsp; Clinics Services</span> <span
                                        class="menu-arrow"></span></a>
                                <ul style="display:  @if(Request::url() == route('clinicservices.index')||Request::url()==route('clinicservices.create')) {{'block'}} @endif;">
                                    <li class="@if (route('clinicservices.index')==Request::url()) {{ 'active' }} @endif"><a
                                            href="{{ route('clinicservices.index') }}">All Clinics Services</a></li>
                                    <li class="@if (route('clinicservices.create')==Request::url()) {{ 'active' }} @endif"><a
                                            href="{{ route('clinicservices.create') }}">Add Clinic Services</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Sidebar -->
        @endif

        <!-- Page Wrapper -->
        <div class="page-wrapper">

            <div class="content container-fluid">
                @yield('content')
            </div>
        </div>
        <!-- /Page Wrapper -->

    </div>
    <!-- /Main Wrapper -->

    <!-- jQuery -->
    <script src="{{ url('dashboard/assets/js/jquery-3.2.1.min.js') }}"></script>

    <!-- Bootstrap Core JS -->
    <script src="{{ url('dashboard/assets/js/popper.min.js') }}"></script>
    <script src="{{ url('dashboard/assets/js/bootstrap.min.js') }}"></script>

    <!-- Slimscroll JS -->
    <script src="{{ url('dashboard/assets/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>

    <script src="{{ url('dashboard/assets/plugins/raphael/raphael.min.js') }}"></script>
    <script src="{{ url('dashboard/assets/plugins/morris/morris.min.js') }}"></script>
    <script src="{{ url('dashboard/assets/js/chart.morris.js') }}"></script>

    <!-- Datatables JS -->
    <script src="{{ url('dashboard/assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('dashboard/assets/plugins/datatables/datatables.min.js') }}"></script>

    <!-- Custom JS -->
    <script src="{{ url('dashboard/assets/js/script.js') }}"></script>
    @yield('scripts')
</body>

<!-- Mirrored from doccure-html.dreamguystech.com/template/admin/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 22 Mar 2021 19:28:55 GMT -->

</html>
