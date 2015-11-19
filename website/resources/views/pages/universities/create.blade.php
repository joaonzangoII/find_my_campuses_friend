
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
    <a href="/universities">Universities</a>
    <i class="icon-angle-right"></i>
  </li>
  <li><a href="#">Create</a></li>
</ul>
<div class="row-fluid">
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon white edit"></i><span class="break"></span>Register new University</h2>
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
{{--     name
description
slogan
chancellor
vice_chancellor
slug --}}
		<div class="box-content">
      {!! Form::open(['method' => 'POST',"class"=>"form-horizontal","url"=> "/universities"])!!}
    		<fieldset>
    		  <div class="control-group">
            {!! Form::label('name', 'Name:',["class"=>"control-label"]) !!}
    				<div class="controls">
              {!! Form::text('name', null, ['class' => 'form-control input-xlarge focused']) !!}
    				</div>
    		  </div>
    		  <div class="control-group">
            {!! Form::label('chancellor', 'Chancellor:',["class"=>"control-label"]) !!}
            <div class="controls">
              {!! Form::text('chancellor', null, ['class' => 'form-control input-xlarge focused']) !!}
            </div>
          </div>  
          <div class="control-group">
            {!! Form::label('vice_chancellor', 'Vice Chancellor:',["class"=>"control-label"]) !!}
            <div class="controls">
              {!! Form::text('vice_chancellor', null, ['class' => 'form-control input-xlarge focused']) !!}
            </div>
          </div>    
          <div class="control-group">
            {!! Form::label('slogan', 'Slogan:',["class"=>"control-label"]) !!}
            <div class="controls">
              {!! Form::text('slogan', null, ['class' => 'form-control input-xlarge focused']) !!}
            </div>
          </div>  
          <div class="control-group">
            {!! Form::label('description', 'Description:',["class"=>"control-label"]) !!}
    				<div class="controls">
              {!! Form::textarea('description', null, ['class' => 'form-control input-xlarge focused']) !!}
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
