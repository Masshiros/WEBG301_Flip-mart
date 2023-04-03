<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ asset('backend/images/favicon.ico')}}">

    <title>Flip-Mart Admin - Dashboard</title>

    <!-- Vendors Style-->
    <link rel="stylesheet" href="{{ asset('backend/css/vendors_css.css')}}">

    <!-- Style-->
    <link rel="stylesheet" href="{{ asset('backend/css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('backend/css/skin_color.css')}}">

</head>

<body class="hold-transition dark-skin sidebar-mini theme-primary fixed">

    <div class="wrapper">



        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar-->
            <section class="sidebar">

                <div class="user-profile">
                    <div class="ulogo">
                        <a href="index.html">
                            <!-- logo for regular state and mobile devices -->
                            <div class="d-flex align-items-center justify-content-center">
                                <img src="../images/logo-dark.png" alt="">
                                <h3><b>Sunny</b> Admin</h3>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- sidebar menu-->
                <ul class="sidebar-menu" data-widget="tree">

                    <li>
                        <a href="index.html">
                            <i data-feather="pie-chart"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <li class="treeview">
                        <a href="#">
                            <i data-feather="message-circle"></i>
                            <span>Application</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-right pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="chat.html"><i class="ti-more"></i>Chat</a></li>
                            <li><a href="calendar.html"><i class="ti-more"></i>Calendar</a></li>
                        </ul>
                    </li>

                    <li class="treeview">
                        <a href="#">
                            <i data-feather="mail"></i> <span>Mailbox</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-right pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="mailbox_inbox.html"><i class="ti-more"></i>Inbox</a></li>
                            <li><a href="mailbox_compose.html"><i class="ti-more"></i>Compose</a></li>
                            <li><a href="mailbox_read_mail.html"><i class="ti-more"></i>Read</a></li>
                        </ul>
                    </li>

                    <li class="treeview">
                        <a href="#">
                            <i data-feather="file"></i>
                            <span>Pages</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-right pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="profile.html"><i class="ti-more"></i>Profile</a></li>
                            <li><a href="invoice.html"><i class="ti-more"></i>Invoice</a></li>
                            <li><a href="gallery.html"><i class="ti-more"></i>Gallery</a></li>
                            <li><a href="faq.html"><i class="ti-more"></i>FAQs</a></li>
                            <li><a href="timeline.html"><i class="ti-more"></i>Timeline</a></li>
                        </ul>
                    </li>

                    <li class="header nav-small-cap">User Interface</li>

                    <li class="treeview">
                        <a href="#">
                            <i data-feather="grid"></i>
                            <span>Components</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-right pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="components_alerts.html"><i class="ti-more"></i>Alerts</a></li>
                            <li><a href="components_badges.html"><i class="ti-more"></i>Badge</a></li>
                            <li><a href="components_buttons.html"><i class="ti-more"></i>Buttons</a></li>
                            <li><a href="components_sliders.html"><i class="ti-more"></i>Sliders</a></li>
                            <li><a href="components_dropdown.html"><i class="ti-more"></i>Dropdown</a></li>
                            <li><a href="components_modals.html"><i class="ti-more"></i>Modal</a></li>
                            <li><a href="components_nestable.html"><i class="ti-more"></i>Nestable</a></li>
                            <li><a href="components_progress_bars.html"><i class="ti-more"></i>Progress Bars</a></li>
                        </ul>
                    </li>

                    <li class="treeview">
                        <a href="#">
                            <i data-feather="credit-card"></i>
                            <span>Cards</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-right pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="card_advanced.html"><i class="ti-more"></i>Advanced Cards</a></li>
                            <li><a href="card_basic.html"><i class="ti-more"></i>Basic Cards</a></li>
                            <li><a href="card_color.html"><i class="ti-more"></i>Cards Color</a></li>
                        </ul>
                    </li>

                    <li class="treeview">
                        <a href="#">
                            <i data-feather="hard-drive"></i>
                            <span>Content</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-right pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="content_typography.html"><i class="ti-more"></i>Typography</a></li>
                            <li><a href="content_media.html"><i class="ti-more"></i>Media</a></li>
                            <li><a href="content_grid.html"><i class="ti-more"></i>Grid</a></li>
                        </ul>
                    </li>

                    <li class="treeview">
                        <a href="#">
                            <i data-feather="package"></i>
                            <span>Utilities</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-right pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="utilities_border.html"><i class="ti-more"></i>Border</a></li>
                            <li><a href="utilities_color.html"><i class="ti-more"></i>Color</a></li>
                            <li><a href="utilities_ribbons.html"><i class="ti-more"></i>Ribbons</a></li>
                            <li><a href="utilities_tab.html"><i class="ti-more"></i>Tabs</a></li>
                            <li><a href="utilities_animations.html"><i class="ti-more"></i>Animation</a></li>
                        </ul>
                    </li>

                    <li class="treeview">
                        <a href="#">
                            <i data-feather="edit-2"></i>
                            <span>Icons</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-right pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="icons_fontawesome.html"><i class="ti-more"></i>Font Awesome</a></li>
                            <li><a href="icons_glyphicons.html"><i class="ti-more"></i>Glyphicons</a></li>
                            <li><a href="icons_material.html"><i class="ti-more"></i>Material Icons</a></li>
                            <li><a href="icons_themify.html"><i class="ti-more"></i>Themify Icons</a></li>
                            <li><a href="icons_simpleline.html"><i class="ti-more"></i>Simple Line Icons</a></li>
                            <li><a href="icons_cryptocoins.html"><i class="ti-more"></i>Cryptocoins Icons</a></li>
                            <li><a href="icons_flag.html"><i class="ti-more"></i>Flag Icons</a></li>
                            <li><a href="icons_weather.html"><i class="ti-more"></i>Weather Icons</a></li>
                        </ul>
                    </li>

                    <li class="treeview">
                        <a href="#">
                            <i data-feather="inbox"></i>
                            <span>Forms</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-right pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="forms_advanced.html"><i class="ti-more"></i>Advanced Elements</a></li>
                            <li><a href="forms_editors.html"><i class="ti-more"></i>Editors</a></li>
                            <li><a href="forms_code_editor.html"><i class="ti-more"></i>Code Editor</a></li>
                            <li><a href="forms_validation.html"><i class="ti-more"></i>Form Validation</a></li>
                            <li><a href="forms_wizard.html"><i class="ti-more"></i>Form Wizard</a></li>
                            <li><a href="forms_general.html"><i class="ti-more"></i>General Elements</a></li>
                            <li><a href="forms_dropzone.html"><i class="ti-more"></i>Dropzone</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i data-feather="server"></i>
                            <span>Tables</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-right pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="tables_simple.html"><i class="ti-more"></i>Simple tables</a></li>
                            <li><a href="tables_data.html"><i class="ti-more"></i>Data tables</a></li>
                        </ul>
                    </li>

                    <li class="treeview">
                        <a href="#">
                            <i data-feather="pie-chart"></i>
                            <span>Charts</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-right pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="charts_chartjs.html"><i class="ti-more"></i>ChartJS</a></li>
                            <li><a href="charts_flot.html"><i class="ti-more"></i>Flot</a></li>
                            <li><a href="charts_inline.html"><i class="ti-more"></i>Inline</a></li>
                            <li><a href="charts_morris.html"><i class="ti-more"></i>Morris</a></li>
                            <li><a href="charts_peity.html"><i class="ti-more"></i>Peity</a></li>
                            <li><a href="charts_chartist.html"><i class="ti-more"></i>Chartist</a></li>
                        </ul>
                    </li>

                    <li class="treeview">
                        <a href="#">
                            <i data-feather="map"></i>
                            <span>Map</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-right pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="map_google.html"><i class="ti-more"></i>Google Map</a></li>
                            <li><a href="map_vector.html"><i class="ti-more"></i>Vector Map</a></li>
                        </ul>
                    </li>

                    <li class="treeview">
                        <a href="#">
                            <i data-feather="alert-triangle"></i>
                            <span>Authentication</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-right pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="auth_login.html"><i class="ti-more"></i>Login</a></li>
                            <li><a href="auth_register.html"><i class="ti-more"></i>Register</a></li>
                            <li><a href="auth_lockscreen.html"><i class="ti-more"></i>Lockscreen</a></li>
                            <li><a href="auth_user_pass.html"><i class="ti-more"></i>Password</a></li>
                            <li><a href="error_404.html"><i class="ti-more"></i>Error 404</a></li>
                            <li><a href="error_maintenance.html"><i class="ti-more"></i>Maintenance</a></li>
                        </ul>
                    </li>

                    <li class="header nav-small-cap">EXTRA</li>

                    <li class="treeview">
                        <a href="#">
                            <i data-feather="layers"></i>
                            <span>Multilevel</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-right pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="#">Level One</a></li>
                            <li class="treeview">
                                <a href="#">Level One
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-right pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="#">Level Two</a></li>
                                    <li class="treeview">
                                        <a href="#">Level Two
                                            <span class="pull-right-container">
                                                <i class="fa fa-angle-right pull-right"></i>
                                            </span>
                                        </a>
                                        <ul class="treeview-menu">
                                            <li><a href="#">Level Three</a></li>
                                            <li><a href="#">Level Three</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="#">Level One</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="auth_login.html">
                            <i data-feather="lock"></i>
                            <span>Log Out</span>
                        </a>
                    </li>

                </ul>
            </section>

            <div class="sidebar-footer">
                <!-- item-->
                <a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Settings"
                    aria-describedby="tooltip92529"><i class="ti-settings"></i></a>
                <!-- item-->
                <a href="mailbox_inbox.html" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i
                        class="ti-email"></i></a>
                <!-- item-->
                <a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i
                        class="ti-lock"></i></a>
            </div>
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @yield('admin')
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <div class="pull-right d-none d-sm-inline-block">
                <ul class="nav nav-primary nav-dotted nav-dot-separated justify-content-center justify-content-md-end">
                    <li class="nav-item">
                        <a class="nav-link" href="javascript:void(0)">FAQ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Purchase Now</a>
                    </li>
                </ul>
            </div>
            &copy; 2020 <a href="#">Psd to Html Expert</a>. All Rights Reserved.
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar">

            <div class="rpanel-title"><span class="pull-right btn btn-circle btn-danger"><i
                        class="ion ion-close text-white" data-toggle="control-sidebar"></i></span> </div>
            <!-- Create the tabs -->
            <ul class="nav nav-tabs control-sidebar-tabs">
                <li class="nav-item"><a href="#control-sidebar-home-tab" data-toggle="tab" class="active">Chat</a></li>
                <li class="nav-item"><a href="#control-sidebar-settings-tab" data-toggle="tab">Todo</a></li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                <!-- Home tab content -->
                <div class="tab-pane active" id="control-sidebar-home-tab">
                    <div class="flexbox">
                        <a href="javascript:void(0)" class="text-grey"><i class="ti-minus"></i></a>
                        <p>Users</p>
                        <a href="javascript:void(0)" class="text-right text-grey"><i class="ti-plus"></i></a>
                    </div>
                    <div class="lookup lookup-sm lookup-right d-none d-lg-block">
                        <input type="text" name="s" placeholder="Search" class="w-p100">
                    </div>
                    <div class="media-list media-list-hover mt-20">
                        <div class="media py-10 px-0">
                            <a class="avatar avatar-lg status-success" href="#">
                                <img src="../images/avatar/1.jpg" alt="...">
                            </a>
                            <div class="media-body">
                                <p class="font-size-16">
                                    <a class="hover-primary" href="#"><strong>Tyler</strong></a>
                                </p>
                                <p>Praesent tristique diam...</p>
                                <span>Just now</span>
                            </div>
                        </div>

                        <div class="media py-10 px-0">
                            <a class="avatar avatar-lg status-danger" href="#">
                                <img src="../images/avatar/2.jpg" alt="...">
                            </a>
                            <div class="media-body">
                                <p class="font-size-16">
                                    <a class="hover-primary" href="#"><strong>Luke</strong></a>
                                </p>
                                <p>Cras tempor diam ...</p>
                                <span>33 min ago</span>
                            </div>
                        </div>

                        <div class="media py-10 px-0">
                            <a class="avatar avatar-lg status-warning" href="#">
                                <img src="../images/avatar/3.jpg" alt="...">
                            </a>
                            <div class="media-body">
                                <p class="font-size-16">
                                    <a class="hover-primary" href="#"><strong>Evan</strong></a>
                                </p>
                                <p>In posuere tortor vel...</p>
                                <span>42 min ago</span>
                            </div>
                        </div>

                        <div class="media py-10 px-0">
                            <a class="avatar avatar-lg status-primary" href="#">
                                <img src="../images/avatar/4.jpg" alt="...">
                            </a>
                            <div class="media-body">
                                <p class="font-size-16">
                                    <a class="hover-primary" href="#"><strong>Evan</strong></a>
                                </p>
                                <p>In posuere tortor vel...</p>
                                <span>42 min ago</span>
                            </div>
                        </div>

                        <div class="media py-10 px-0">
                            <a class="avatar avatar-lg status-success" href="#">
                                <img src="../images/avatar/1.jpg" alt="...">
                            </a>
                            <div class="media-body">
                                <p class="font-size-16">
                                    <a class="hover-primary" href="#"><strong>Tyler</strong></a>
                                </p>
                                <p>Praesent tristique diam...</p>
                                <span>Just now</span>
                            </div>
                        </div>

                        <div class="media py-10 px-0">
                            <a class="avatar avatar-lg status-danger" href="#">
                                <img src="../images/avatar/2.jpg" alt="...">
                            </a>
                            <div class="media-body">
                                <p class="font-size-16">
                                    <a class="hover-primary" href="#"><strong>Luke</strong></a>
                                </p>
                                <p>Cras tempor diam ...</p>
                                <span>33 min ago</span>
                            </div>
                        </div>

                        <div class="media py-10 px-0">
                            <a class="avatar avatar-lg status-warning" href="#">
                                <img src="../images/avatar/3.jpg" alt="...">
                            </a>
                            <div class="media-body">
                                <p class="font-size-16">
                                    <a class="hover-primary" href="#"><strong>Evan</strong></a>
                                </p>
                                <p>In posuere tortor vel...</p>
                                <span>42 min ago</span>
                            </div>
                        </div>

                        <div class="media py-10 px-0">
                            <a class="avatar avatar-lg status-primary" href="#">
                                <img src="../images/avatar/4.jpg" alt="...">
                            </a>
                            <div class="media-body">
                                <p class="font-size-16">
                                    <a class="hover-primary" href="#"><strong>Evan</strong></a>
                                </p>
                                <p>In posuere tortor vel...</p>
                                <span>42 min ago</span>
                            </div>
                        </div>

                    </div>

                </div>
                <!-- /.tab-pane -->
                <!-- Settings tab content -->
                <div class="tab-pane" id="control-sidebar-settings-tab">
                    <div class="flexbox">
                        <a href="javascript:void(0)" class="text-grey"><i class="ti-minus"></i></a>
                        <p>Todo List</p>
                        <a href="javascript:void(0)" class="text-right text-grey"><i class="ti-plus"></i></a>
                    </div>
                    <ul class="todo-list mt-20">
                        <li class="py-15 px-5 by-1">
                            <!-- checkbox -->
                            <input type="checkbox" id="basic_checkbox_1" class="filled-in">
                            <label for="basic_checkbox_1" class="mb-0 h-15"></label>
                            <!-- todo text -->
                            <span class="text-line">Nulla vitae purus</span>
                            <!-- Emphasis label -->
                            <small class="badge bg-danger"><i class="fa fa-clock-o"></i> 2 mins</small>
                            <!-- General tools such as edit or delete-->
                            <div class="tools">
                                <i class="fa fa-edit"></i>
                                <i class="fa fa-trash-o"></i>
                            </div>
                        </li>
                        <li class="py-15 px-5">
                            <!-- checkbox -->
                            <input type="checkbox" id="basic_checkbox_2" class="filled-in">
                            <label for="basic_checkbox_2" class="mb-0 h-15"></label>
                            <span class="text-line">Phasellus interdum</span>
                            <small class="badge bg-info"><i class="fa fa-clock-o"></i> 4 hours</small>
                            <div class="tools">
                                <i class="fa fa-edit"></i>
                                <i class="fa fa-trash-o"></i>
                            </div>
                        </li>
                        <li class="py-15 px-5 by-1">
                            <!-- checkbox -->
                            <input type="checkbox" id="basic_checkbox_3" class="filled-in">
                            <label for="basic_checkbox_3" class="mb-0 h-15"></label>
                            <span class="text-line">Quisque sodales</span>
                            <small class="badge bg-warning"><i class="fa fa-clock-o"></i> 1 day</small>
                            <div class="tools">
                                <i class="fa fa-edit"></i>
                                <i class="fa fa-trash-o"></i>
                            </div>
                        </li>
                        <li class="py-15 px-5">
                            <!-- checkbox -->
                            <input type="checkbox" id="basic_checkbox_4" class="filled-in">
                            <label for="basic_checkbox_4" class="mb-0 h-15"></label>
                            <span class="text-line">Proin nec mi porta</span>
                            <small class="badge bg-success"><i class="fa fa-clock-o"></i> 3 days</small>
                            <div class="tools">
                                <i class="fa fa-edit"></i>
                                <i class="fa fa-trash-o"></i>
                            </div>
                        </li>
                        <li class="py-15 px-5 by-1">
                            <!-- checkbox -->
                            <input type="checkbox" id="basic_checkbox_5" class="filled-in">
                            <label for="basic_checkbox_5" class="mb-0 h-15"></label>
                            <span class="text-line">Maecenas scelerisque</span>
                            <small class="badge bg-primary"><i class="fa fa-clock-o"></i> 1 week</small>
                            <div class="tools">
                                <i class="fa fa-edit"></i>
                                <i class="fa fa-trash-o"></i>
                            </div>
                        </li>
                        <li class="py-15 px-5">
                            <!-- checkbox -->
                            <input type="checkbox" id="basic_checkbox_6" class="filled-in">
                            <label for="basic_checkbox_6" class="mb-0 h-15"></label>
                            <span class="text-line">Vivamus nec orci</span>
                            <small class="badge bg-info"><i class="fa fa-clock-o"></i> 1 month</small>
                            <div class="tools">
                                <i class="fa fa-edit"></i>
                                <i class="fa fa-trash-o"></i>
                            </div>
                        </li>
                        <li class="py-15 px-5 by-1">
                            <!-- checkbox -->
                            <input type="checkbox" id="basic_checkbox_7" class="filled-in">
                            <label for="basic_checkbox_7" class="mb-0 h-15"></label>
                            <!-- todo text -->
                            <span class="text-line">Nulla vitae purus</span>
                            <!-- Emphasis label -->
                            <small class="badge bg-danger"><i class="fa fa-clock-o"></i> 2 mins</small>
                            <!-- General tools such as edit or delete-->
                            <div class="tools">
                                <i class="fa fa-edit"></i>
                                <i class="fa fa-trash-o"></i>
                            </div>
                        </li>
                        <li class="py-15 px-5">
                            <!-- checkbox -->
                            <input type="checkbox" id="basic_checkbox_8" class="filled-in">
                            <label for="basic_checkbox_8" class="mb-0 h-15"></label>
                            <span class="text-line">Phasellus interdum</span>
                            <small class="badge bg-info"><i class="fa fa-clock-o"></i> 4 hours</small>
                            <div class="tools">
                                <i class="fa fa-edit"></i>
                                <i class="fa fa-trash-o"></i>
                            </div>
                        </li>
                        <li class="py-15 px-5 by-1">
                            <!-- checkbox -->
                            <input type="checkbox" id="basic_checkbox_9" class="filled-in">
                            <label for="basic_checkbox_9" class="mb-0 h-15"></label>
                            <span class="text-line">Quisque sodales</span>
                            <small class="badge bg-warning"><i class="fa fa-clock-o"></i> 1 day</small>
                            <div class="tools">
                                <i class="fa fa-edit"></i>
                                <i class="fa fa-trash-o"></i>
                            </div>
                        </li>
                        <li class="py-15 px-5">
                            <!-- checkbox -->
                            <input type="checkbox" id="basic_checkbox_10" class="filled-in">
                            <label for="basic_checkbox_10" class="mb-0 h-15"></label>
                            <span class="text-line">Proin nec mi porta</span>
                            <small class="badge bg-success"><i class="fa fa-clock-o"></i> 3 days</small>
                            <div class="tools">
                                <i class="fa fa-edit"></i>
                                <i class="fa fa-trash-o"></i>
                            </div>
                        </li>
                    </ul>
                </div>
                <!-- /.tab-pane -->
            </div>
        </aside>
        <!-- /.control-sidebar -->

        <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>

    </div>
    <!-- ./wrapper -->


    <!-- Vendor JS -->
    <script src="{{ asset('backend/js/vendors.min.js')}}"></script>
    <script src="{{ asset('../assets/icons/feather-icons/feather.min.js')}}"></script>
    <script src="{{ asset('../assets/vendor_components/easypiechart/dist/jquery.easypiechart.js')}}"></script>
    <script src="{{ asset('../assets/vendor_components/apexcharts-bundle/irregular-data-series.js')}}"></script>
    <script src="{{ asset('../assets/vendor_components/apexcharts-bundle/dist/apexcharts.js')}}"></script>

    <!-- Admin App -->
    <script src="{{ asset('backend/js/template.js')}}"></script>
    <script src="{{ asset('backend/js/pages/dashboard.js')}}"></script>


</body>

</html>