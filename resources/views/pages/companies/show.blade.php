
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
      <a href="{{ Auth::user()->isStudent() ? '#' : '/companies'  }}">Companies</a>
      <i class="icon-angle-right"></i>
    </li>
    <li><a href="#">View</a></li>
  </ul>

  <div class="row-fluid">
    <div class="box span12">
      <div class="box-header" data-original-title>
        <h2><i class="halflings-icon white edit"></i><span class="break"></span>{{ $company->name }} Profile</h2>
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
                <input class="input-xlarge disabled" id="disabledInput" type="text" placeholder="{{ $company->name }}" disabled="">
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="disabledInput">Contact: </label>
              <div class="controls">
                <input class="input-xlarge disabled" id="disabledInput" type="text" placeholder="{{ $company->contact }}" disabled="">
              </div>
            </div>           
            <div class="control-group">
              <label class="control-label" for="disabledInput">Email: </label>
              <div class="controls">
                <input class="input-xlarge disabled" id="disabledInput" type="text" placeholder="{{ $company->email }}" disabled="">
              </div>
            </div>  
            <div class="control-group">
              <label class="control-label" for="disabledInput">Website: </label>
              <div class="controls">
                <input class="input-xlarge disabled" id="disabledInput" type="text" placeholder="{{ $company->website }}" disabled="">
              </div>
            </div>    
            <div class="control-group">
              <label class="control-label" for="disabledInput">Address: </label>
              <div class="controls">
                <input class="input-xlarge disabled" id="disabledInput" type="text" placeholder="{{ $company->address }}" disabled="">
              </div>
            </div> 
            <div class="control-group">
              <label class="control-label" for="disabledInput">Contact Person: </label>
              <div class="controls">
                <input class="input-xlarge disabled" id="disabledInput" type="text" placeholder="{{ $company->contact_person }}" disabled="">
              </div>
            </div>
            <a type="button" href="{{ URL::previous() }}" class="btn btn-warning" >Back</a>
          </fieldset>
        </form>
      </div>


    </div>
  </div>
@endsection
