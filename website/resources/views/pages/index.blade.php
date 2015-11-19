@extends("layouts.default")
@section('content')
<ul class="breadcrumb">
  <li>
    <i class="icon-home"></i>
    <a href="/">Home</a>
    <i class="icon-angle-right"></i>
  </li>
  <li><a href="#">Dashboard</a></li>
</ul>
<div class="row-fluid">
  @if(Auth::user()->hasPermission("view_university"))
    <div class="span3 statbox purple" onTablet="span6" onDesktop="span3">
      <div class="boxchart">5,6,7,2,0,4,2,4,8,2,3,3,2</div>
      <div class="number">{{ $universities_count }}<i class="icon-arrow-up"></i></div>
      <div class="title">Universities</div>
      <div class="footer">
        <a href="/universities"> read full report</a>
      </div>
    </div>
  @endif
  @if(Auth::user()->hasPermission("view_user"))
    <div class="span3 statbox green" onTablet="span6" onDesktop="span3">
      <div class="boxchart">1,2,6,4,0,8,2,4,5,3,1,7,5</div>
      <div class="number">{{ $users_count }}<i class="icon-arrow-up"></i></div>
      <div class="title">Users</div>
      <div class="footer">
        <a href="/users"> read full report</a>
      </div>
    </div>
  @endif
  @if(Auth::user()->hasPermission("view_student"))
    <div class="span3 statbox blue noMargin" onTablet="span6" onDesktop="span3">
      <div class="boxchart">5,6,7,2,0,-4,-2,4,8,2,3,3,2</div>
      <div class="number">{{ $students_count }}<i class="icon-arrow-up"></i></div>
      <div class="title">Students</div>
      <div class="footer">
        <a href="/students"> read full report</a>
      </div>
    </div>
  @endif
  @if(Auth::user()->hasPermission("view_sos_request"))
    <div class="span3 statbox yellow" onTablet="span6" onDesktop="span3">
      <div class="boxchart">7,2,2,2,1,-4,-2,4,8,,0,3,3,5</div>
      <div class="number">{{ $sos_count }}<i class="icon-arrow-down"></i></div>
      <div class="title">SOS Requests</div>
      <div class="footer">
        <a href="/sos-requests"> read full report</a>
      </div>
    </div>
  @endif
</div>
<div class="row-fluid">
{{--   <div class="box black span4" onTablet="span6" onDesktop="span4">
    <div class="box-header">
      <h2><i class="halflings-icon white list"></i><span class="break"></span>Weekly Stat</h2>
      <div class="box-icon">
        <a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
        <a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
      </div>
    </div>
    <div class="box-content">
      <ul class="dashboard-list metro">
        <li>
          <a href="#">
            <i class="icon-arrow-up green"></i>
            <strong>92</strong>
            New Comments
          </a>
        </li>
        <li>
        <a href="#">
          <i class="icon-arrow-down red"></i>
          <strong>15</strong>
          New Registrations
        </a>
        </li>
        <li>
        <a href="#">
          <i class="icon-minus blue"></i>
          <strong>36</strong>
          New Articles
        </a>
        </li>
        <li>
        <a href="#">
          <i class="icon-comment yellow"></i>
          <strong>45</strong>
          User reviews
        </a>
        </li>
        <li>
        <a href="#">
          <i class="icon-arrow-up green"></i>
          <strong>112</strong>
          New Comments
        </a>
        </li>
        <li>
        <a href="#">
          <i class="icon-arrow-down red"></i>
          <strong>31</strong>
          New Registrations
        </a>
        </li>
        <li>
        <a href="#">
          <i class="icon-minus blue"></i>
          <strong>93</strong>
          New Articles
        </a>
        </li>
        <li>
        <a href="#">
          <i class="icon-comment yellow"></i>
          <strong>256</strong>
          User reviews
        </a>
        </li>
      </ul>
    </div>
  </div><!--/span--> --}}
  @if(Auth::user()->hasPermission("view_user"))
    <div class="box black span4" onTablet="span6" onDesktop="span4">
      <div class="box-header">
        <h2><i class="halflings-icon white user"></i><span class="break"></span>Last Users</h2>
        <div class="box-icon">
          <a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
          <a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
        </div>
      </div>
      <div class="box-content">
        <ul class="dashboard-list metro">
          @foreach($users->take(4) as $key => $user)
            <li class="{{ $user->state->colour}}">
              <a href="#">
                <img class="avatar" alt="Dennis Ji" src="img/avatar.jpg">
              </a>
              <strong>Name:</strong> {{ $user->fullname}}<br>
              <strong>Since:</strong>{{ $user->created_at}}<br>
              <strong>Status:</strong> {{ $user->state->name}}
            </li>
          @endforeach
          {{-- <li class="yellow">
            <a href="#">
              <img class="avatar" alt="Dennis Ji" src="img/avatar.jpg">
            </a>
            <strong>Name:</strong> Dennis Ji<br>
            <strong>Since:</strong> Jul 25, 2012 11:09<br>
            <strong>Status:</strong> Pending
          </li>
          <li class="red">
            <a href="#">
              <img class="avatar" alt="Dennis Ji" src="img/avatar.jpg">
            </a>
            <strong>Name:</strong> Dennis Ji<br>
            <strong>Since:</strong> Jul 25, 2012 11:09<br>
            <strong>Status:</strong> Banned
          </li>
          <li class="blue">
            <a href="#">
              <img class="avatar" alt="Dennis Ji" src="img/avatar.jpg">
            </a>
            <strong>Name:</strong> Dennis Ji<br>
            <strong>Since:</strong> Jul 25, 2012 11:09<br>
            <strong>Status:</strong> Updated
          </li> --}}
        </ul>
      </div>
    </div><!--/span-->
  @endif

{{--   <div class="box black span4 noMargin" onTablet="span12" onDesktop="span4">
    <div class="box-header">
      <h2><i class="halflings-icon white check"></i><span class="break"></span>To Do List</h2>
      <div class="box-icon">
        <a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
        <a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
        <a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
      </div>
    </div>
    <div class="box-content">
      <div class="todo metro">
        <ul class="todo-list">
          <li class="red">
            <a class="action icon-check-empty" href="#"></a>
            Windows Phone 8 App
            <strong>today</strong>
          </li>
          <li class="red">
            <a class="action icon-check-empty" href="#"></a>
            New frontend layout
            <strong>today</strong>
          </li>
          <li class="yellow">
            <a class="action icon-check-empty" href="#"></a>
            Hire developers
            <strong>tommorow</strong>
          </li>
          <li class="yellow">
            <a class="action icon-check-empty" href="#"></a>
            Windows Phone 8 App
            <strong>tommorow</strong>
          </li>
          <li class="green">
            <a class="action icon-check-empty" href="#"></a>
            New frontend layout
            <strong>this week</strong>
          </li>
          <li class="green">
            <a class="action icon-check-empty" href="#"></a>
            Hire developers
            <strong>this week</strong>
          </li>
          <li class="blue">
            <a class="action icon-check-empty" href="#"></a>
            New frontend layout
            <strong>this month</strong>
          </li>
          <li class="blue">
            <a class="action icon-check-empty" href="#"></a>
            Hire developers
            <strong>this month</strong>
          </li>
        </ul>
      </div>
    </div>
  </div>
 --}}
</div>
<div class="row-fluid hideInIE8 circleStats"></div>
@endsection
