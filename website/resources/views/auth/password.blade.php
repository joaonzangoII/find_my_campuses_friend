@extends("auth.layouts.default")
@section("styles")
 <style type="text/css">
    body { background: url(/img/bg-login.jpg) !important; }
  </style>
@append
@section('content')
<div class="container-fluid-full">
		<div class="row-fluid">

			<div class="row-fluid">
				<div class="login-box">
					<div class="icons">
						{{-- <a href="index.html"><i class="halflings-icon home"></i></a>
						<a href="#"><i class="halflings-icon cog"></i></a> --}}
					</div>
					<h2>Reset Password</h2>
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
					{!! Form::open(["class"=>"form-horizontal","url"=> url('/password/email'),"method"=> "POST"]) !!}
						<fieldset>
							<div class="input-prepend" title="Password">
								<span class="add-on"><i class="halflings-icon user"></i></span>
								<input class="input-large span10" name="email" id="email" type="text" placeholder="type email"  value="{{ old('email') }}"/>
							</div>
							<div class="clearfix"></div>
							<div class="button-login">
								<button type="submit" class="btn btn-primary">	Send Password Reset Link</button>
							</div>
							<div class="clearfix"></div>
					{!! Form::close()!!}
				</div><!--/span-->
			</div><!--/row-->
	</div><!--/.fluid-container-->

  @endsection
