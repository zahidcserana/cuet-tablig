<?php $active_page = active_menu();?>

<ul class="sidebar-menu" data-widget="tree">
    <li class="header">MAIN NAVIGATION</li>
    <li  class="{{ $active_page == 'home'? 'active menu-open': '' }}">
        <a href="{{route('home')}}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
            </span>
        </a>
    </li>
    @if(Auth::user()->type==1)
    <li  class="treeview {{ $active_page == 'notices'? 'active menu-open': '' }}">
        <a href="#">
            <i class="fa fa-bell"></i> <span>Notice</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="{{route('notice_add')}}"><i class="fa fa-circle-o"></i> Add</a></li>
            <li class="active"><a href="{{route('notices')}}"><i class="fa fa-circle-o"></i>View</a></li>
        </ul>
    </li>
@endif
    <li  class="treeview {{ $active_page == 'users'? 'active menu-open': '' }}">
        <a href="#">
            <i class="fa fa-users"></i> <span>Users</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            @if(Auth::user()->type == 1)
            <li><a href="{{route('user_add')}}"><i class="fa fa-circle-o"></i> Add</a></li>
            @endif
            <li class="active"><a href="{{route('users')}}"><i class="fa fa-circle-o"></i> Cuetian</a></li>
            <li class="active"><a href="{{route('all_user')}}"><i class="fa fa-circle-o"></i> All</a></li>
        </ul>
    </li>

    <li class="header">Personal</li>
    <li class="treeview {{ $active_page == 'profile'? 'active menu-open': '' }}">
        <a href="#">
            <i class="fa fa-user"></i> <span>Account</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li class="active"><a href="{{route('profile')}}"><i class="fa fa-circle-o"></i> Profile</a></li>
        </ul>
    </li>

    <li class="treeview {{ $active_page == 'message'? 'active menu-open': '' }}">
        <a href="#">
            <i class="fa fa-folder"></i> <span>Message</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="{{route('message_add')}}"><i class="fa fa-circle-o"></i> New</a></li>
            <li><a href="{{route('user_message')}}"><i class="fa fa-circle-o"></i> View</a></li>
        </ul>
    </li>
</ul>