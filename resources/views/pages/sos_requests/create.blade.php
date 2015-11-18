
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
    <a href="/universities">SOS requests</a>
    <i class="icon-angle-right"></i>
  </li>
  <li><a href="#">Create</a></li>
</ul>
<div class="row-fluid">
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon white edit"></i><span class="break"></span>Create new SOS Request</h2>
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
      {!! Form::open(['method' => 'POST',"class"=>"form-horizontal","url"=> "/sos-requests"])!!}
    		<fieldset>

          <div class="control-group">
           {!! Form::label('user_id', 'Student:',["class"=>"control-label"]) !!}
           <div class="controls">
             {!! Form::select('user_id',$users_list,null,['class' => 'form-control input-xlarge','data-rel'=>"chosen",'data-placeholder'=>"Select State"]) !!}
           </div>
          </div>
          <div class="control-group">
            {!! Form::label('company_id', 'Company:',["class"=>"control-label"]) !!}
            <div class="controls">
              {!! Form::select('company_id[]',$companies_list,null,['multiple' => 'multiple', 'class' => 'form-control input-xlarge','data-rel'=>"chosen",'data-placeholder'=>"Select Company"]) !!}
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
