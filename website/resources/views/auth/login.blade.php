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
					<h2>Login to your account</h2>
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
					{!! Form::open(["class"=>"form-horizontal","url"=>"/login","method"=> "POST"]) !!}
						<fieldset>
							<div class="input-prepend" title="Email">
								<span class="add-on"><i class="halflings-icon user"></i></span>
								<input class="input-large span10" name="email" id="email" type="text" placeholder="type email"/>
							</div>
							<div class="clearfix"></div>

							<div class="input-prepend" title="Password">
								<span class="add-on"><i class="halflings-icon lock"></i></span>
								<input class="input-large span10" name="password" id="password" type="password" placeholder="type password"/>
							</div>
							<div class="clearfix"></div>
      				<label class="remember" for="remember"><input type="checkbox" id="remember" />Remember me</label>
							<div class="button-login">
								<button type="submit" class="btn btn-primary">Login</button>
							</div>
							<div class="clearfix"></div>
					{!! Form::close()!!}
					<hr>
					<h3>Forgot Password?</h3>
					<p>
						No problem, <a href="{{ url('/password/email') }}">click here</a> to get a new password.
					</p>
				</div><!--/span-->
			</div><!--/row-->


	</div><!--/.fluid-container-->

  @endsection
