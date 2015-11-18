
@extends("layouts.default")
@section('content')
  <ul class="breadcrumb">
    <li>
      <i class="icon-home"></i>
      <a href="/">Home</a>
      <i class="icon-angle-right"></i>
    </li>
    <li>
      <i class="icon-group"></i>
      <a href="/users">Users</a>
      <i class="icon-angle-right"></i>
    </li>
    <li><a href="#">View</a></li>
  </ul>

  <div class="row-fluid">
    <div class="box span12">
      <div class="box-header" data-original-title>
        <h2><i class="halflings-icon white edit"></i><span class="break"></span>{{ $user->fullname }} Profile</h2>
        <div class="box-icon">
          <a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
          <a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
          <a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
        </div>
      </div>
      <div class="box-content">
        <form class="form-horizontal">
          <fieldset>
            <div class="control-group">
              <label class="control-label" for="disabledInput">Name: </label>
              <div class="controls">
                <input class="input-xlarge disabled" id="disabledInput" type="text" placeholder="{{ $user->fullname }}" disabled="">
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="disabledInput">Cellnumber: </label>
              <div class="controls">
                <input class="input-xlarge disabled" id="disabledInput" type="text" placeholder="{{ $user->cellnumber }}" disabled="">
              </div>
            </div>           
            <div class="control-group">
              <label class="control-label" for="disabledInput">Email: </label>
              <div class="controls">
                <input class="input-xlarge disabled" id="disabledInput" type="text" placeholder="{{ $user->email }}" disabled="">
              </div>
            </div>    
            <div class="control-group">
              <label class="control-label" for="disabledInput">Address: </label>
              <div class="controls">
                <input class="input-xlarge disabled" id="disabledInput" type="text" placeholder="{{ $user->address }}" disabled="">
              </div>
            </div> 
            <div class="control-group">
              <label class="control-label" for="disabledInput">Type: </label>
              <div class="controls">
                <input class="input-xlarge disabled" id="disabledInput" type="text" placeholder="{{ $user->user_type_descr }}" disabled="">
              </div>
            </div>
          </fieldset>
        </form>
      </div>

    </div>
  </div>
  <div class="row-fluid">
    <div class="box span12">
      <div class="box-header" data-original-title>
        <h2><i class="halflings-icon white edit"></i><span class="break"></span>Permissions</h2>
        <div class="box-icon">
          <a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
          <a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
          <a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
        </div>
      </div>
      <div class="box-content">
        <form class="form-horizontal">
          <fieldset>
            @foreach ($user->permissions as $permission)
              <div class="control-group">
                <label class="control-label" for="optionsCheckbox2"></label>
                <div class="controls">
                  <label class="checkbox">
                  <input type="checkbox" id="optionsCheckbox2" value="option1" disabled="" checked>
                  {{ $permission->name }}
                  </label>
                </div>
              </div>
            @endforeach
          </fieldset>
        </form>
      </div>
    </div>
  </div> 

{{-- 'Name:' .   {{$user->fullname}}
{{$user}}
{{$user}} --}}
@endsection
