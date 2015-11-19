
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
  <li><a href="#">Edit</a></li>
</ul>
			<div class="row-fluid">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white edit"></i><span class="break"></span>Edit {{ $user->fullname }} Info</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
						</div>
					</div>
					<div class="box-content">
            {!! Form::model($user, ['method' => 'PATCH',"class"=>"form-horizontal","url"=> $user->patch_link])!!}
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
                  {!! Form::label('state', 'State:',["class"=>"control-label"]) !!}
                  <div class="controls">
                    {!! Form::select('age_hide',$states,null,['class' => 'form-control input-xlarge','data-rel'=>"chosen",'data-placeholder'=>"Select State"]) !!}
                  </div>
                </div>
							  <div class="form-actions">
								<button type="submit" class="btn btn-primary">Save changes</button>
								<button type="reset" class="btn">Reset</button>
                <a type="button" href="{{ URL::previous() }}" class="btn btn-warning" >Back</a>
							  </div>
							</fieldset>
						  {!!Form::close()!!}

					</div>
				</div><!--/span-->

			</div><!--/row-->
@endsection
