
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
  <li><a href="#">Edit</a></li>
</ul>
			<div class="row-fluid">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white edit"></i><span class="break"></span>Edit {{ $university->name }} Info</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
						</div>
					</div>
					<div class="box-content">
            {!! Form::model($university, ['method' => 'PATCH',"class"=>"form-horizontal","url"=> $university->patch_link])!!}
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
								<button type="submit" class="btn btn-primary">Save changes</button>
								<button type="reset" class="btn">Reset</button>
							  </div>
							</fieldset>
						  {!!Form::close()!!}

					</div>
				</div><!--/span-->

			</div><!--/row-->
@endsection
