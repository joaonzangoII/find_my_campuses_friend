
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
    <a href="{{ Auth::user()->isStudent() ? '#' : '/users'  }}">Users</a>
    <i class="icon-angle-right"></i>
  </li>
  <li><a href="#">Create</a></li>
</ul>
<div class="row-fluid">
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon white edit"></i><span class="break"></span>Register new User</h2>
			<div class="box-icon">
				<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
				<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
				<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
			</div>
		</div>
    @if (count($errors) > 0)
      <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif
		<div class="box-content">
      {!! Form::open(['method' => 'POST',"class"=>"form-horizontal","url"=> "/students"])!!}
    		<fieldset>
    		  <div class="control-group">
            {!! Form::label('first_name', 'Firstname:',["class"=>"control-label"]) !!}
    				<div class="controls">
              {!! Form::text('first_name', null, ['class' => 'form-control input-xlarge focused']) !!}
    				</div>
    		  </div>
    		  <div class="control-group">
            {!! Form::label('last_name', 'Surname:',["class"=>"control-label"]) !!}
            <div class="controls">
              {!! Form::text('last_name', null, ['class' => 'form-control input-xlarge focused']) !!}
            </div>
          </div>  
          <div class="control-group">
            {!! Form::label('email', 'Email:',["class"=>"control-label"]) !!}
            <div class="controls">
              {!! Form::text('email', null, ['class' => 'form-control input-xlarge focused']) !!}
            </div>
          </div>    
          <div class="control-group">
            {!! Form::label('cellnumber', 'Cellphone:',["class"=>"control-label"]) !!}
            <div class="controls">
              {!! Form::text('cellnumber', null, ['class' => 'form-control input-xlarge focused']) !!}
            </div>
          </div>  
          <div class="control-group">
            {!! Form::label('address', 'Address:',["class"=>"control-label"]) !!}
    				<div class="controls">
              {!! Form::text('address', null, ['class' => 'form-control input-xlarge focused']) !!}
    				</div>
    		  </div>
        {{--   <div class="control-group">
            {!! Form::label('state_id', 'State:',["class"=>"control-label"]) !!}
            <div class="controls">
              {!! Form::select('state_id',$states,null,['class' => 'form-control input-xlarge','data-rel'=>"chosen",'data-placeholder'=>"Select State"]) !!}
            </div>
          </div> --}}

          <div class="control-group">
            {!! Form::label('user_type_id', 'Type:',["class"=>"control-label"]) !!}
            <div class="controls">
              {!! Form::select('user_type_id',['3'=>'Student'],null,['class' => 'form-control input-xlarge','data-rel'=>"chosen",'data-placeholder'=>"Select State"]) !!}
            </div>
          </div>
          <div class="form-actions">
        	<button type="submit" class="btn btn-primary">Confirm</button>
        	<button type="reset" class="btn">Reset</button>
          </div>
        </fieldset>
    {!!Form::close()!!}
  </div>
  </div><!--/span-->
</div><!--/row-->
@endsection
