<!-- start: Header -->
<div class="navbar">
  <div class="navbar-inner">
    <div class="container-fluid">
      <a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      </a>
      <a class="brand" href="/"><span>DASHBOARD</span></a>

      <!-- start: Header Menu -->
      <div class="nav-no-collapse header-nav">
        <ul class="nav pull-right">
          <!-- end: Notifications Dropdown -->
          <!-- start: Message Dropdown -->
          <!-- start: User Dropdown -->
          <li class="dropdown">
          <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
          <i class="halflings-icon white user"></i> {{ Auth::user()->fullname}}
          <span class="caret"></span>
          </a>
          <ul class="dropdown-menu">
          <li class="dropdown-menu-title">
          <span>Account Settings</span>
          </li>
          <li><a href="{{ Auth::user()->show_link}}"><i class="halflings-icon user"></i> Profile</a></li>
          <li><a href="{{ url('/logout')}}"><i class="halflings-icon off"></i> Logout</a></li>
          </ul>
          </li>
          <!-- end: User Dropdown -->
        </ul>
      </div>
      <!-- end: Header Menu -->

    </div>
  </div>
</div>
<!-- start: Header -->
