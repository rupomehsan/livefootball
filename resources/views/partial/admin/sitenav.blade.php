<?php
$currentControllerName = Request::segment(2);
//dd($currentControllerName);
?>


<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">
    <div class="logo d-flex my-4">
        <span class="iconify mx-3" data-icon="eos-icons:admin" style="color: #da0f0f;" data-width="30"
              data-height="30"></span>
        <h4 class="text-uppercase ">admin</h4>
    </div>
    <ul class="sidebar-nav" id="sidebar-nav">
        <!-- Sidebar Dashboard -->
        <li class="nav-item">
            <a class="nav-link  {{ $currentControllerName == 'dashboard' ? 'active' : '' }}" href="{{url('admin/dashboard')}}">
                <div class="sidebar-icon-bg">
                    <span class="iconify mx-3 sidebar-icon" data-icon="ic:sharp-space-dashboard" style="color: #00000;"
                          data-width="20" data-height="20"></span>
                </div>
                <span class="title">Dashboard</span>
            </a>
        </li>
        <!-- Sidebar Manage Admin -->
        <!-- End Sidebar Manage Admin -->
{{--        <li class="nav-heading">User</li>--}}
{{--        <!-- Sidebar Manage User -->--}}
{{--        <li class="nav-item">--}}
{{--            <a class="nav-link " href="../view/pages/manage-user.php">--}}
{{--                <span class="iconify mx-3" data-icon="ri:user-settings-fill" style="color: #00000;" data-width="20"--}}
{{--                      data-height="20"></span>--}}
{{--                <span class="title">Manage User</span>--}}
{{--            </a>--}}
{{--        </li>--}}
        <!-- End Sidebar Manage user -->
        <li class="nav-heading">Series</li>
        <!-- Sidebar Advertisement -->
        <li class="nav-item">
            <a class="nav-link {{ $currentControllerName == 'team' ? 'active' : '' }}" href="{{url('admin/team')}}">
                <span class="iconify mx-3" data-icon="ri:team-fill" data-width="25" ></span>
                <span class="title">Team</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ $currentControllerName == 'tournament' ? 'active' : '' }}" href="{{url('admin/tournament')}}">
                <span class="iconify mx-3" data-icon="ic:outline-sports-soccer" data-width="25"></span>
                <span class="title">Tournament</span>
            </a>
        </li>
          <li class="nav-item">
            <a class="nav-link {{ $currentControllerName == 'point-table' ? 'active' : '' }}" href="{{url('admin/point-table')}}">
                <span class="iconify mx-3" data-icon="carbon:chart-point" data-width="25"></span>
                <span class="title">Point Table</span>
            </a>
        </li>
        <!-- Sidebar Notification -->
        <li class="nav-heading">Settings</li>
        <li class="nav-item">
            <a class="nav-link {{ $currentControllerName == 'notification' ? 'active' : '' }}" href="{{url('admin/notification')}}">
                <span class="iconify mx-3" data-icon="ic:baseline-notification-add" style="color: #00000;"
                      data-width="20"
                      data-height="20"></span>
                <span class="title">Notification</span>
            </a>
        </li>
        <!-- End Sidebar Notification -->
          <li class="nav-item">
            <a class="nav-link {{ $currentControllerName == 'advertisement' ? 'active' : '' }}" href="{{url('admin/advertisement')}}">
                <span class="iconify mx-3" data-icon="ri:advertisement-fill" style="color: #00000;" data-width="20"
                      data-height="20"></span>
                <span class="title">Advertisement</span>
            </a>
        </li>
        <!-- End Sidebar Advertisement -->
   <!-- End Sidebar Notification -->
          <li class="nav-item">
            <a class="nav-link {{ $currentControllerName == 'profile' ? 'active' : '' }}" href="{{url('admin/profile')}}">
                <span class="iconify mx-3" data-icon="ri:advertisement-fill" style="color: #00000;" data-width="20"
                      data-height="20"></span>
                <span class="title">Profile</span>
            </a>
        </li>
        <!-- End Sidebar Advertisement -->



        <!-- Sidebar SMTP -->
        <li class="nav-item">
            <a class="nav-link {{ $currentControllerName == 'smtp' ? 'active' : '' }}" href="{{url('admin/smtp')}}">
                <span class="iconify mx-3" data-icon="fluent:mail-settings-16-filled" style="color: #00000;"
                      data-width="20"
                      data-height="20"></span>
                <span class="title">Add SMTP</span>
            </a>
        </li>
        <!-- End Sidebar SMTP -->

        <!-- Sidebar Setting -->
        <li class="nav-item">
            <a class="nav-link {{ $currentControllerName == 'setting' ? 'active' : '' }}" href="{{url('admin/setting')}}">
                <span class="iconify mx-3" data-icon="ant-design:setting-filled"  data-width="20"
                      data-height="20"></span>
                <span class="title">Site Settings</span>
            </a>
        </li>
        <!-- End Sidebar Setting -->
    </ul>
</aside>
<!-- ======= End Sidebar ======= -->
