<!DOCTYPE html>
<html lang="en">
<!-- start: Head-->
@include("partials.head")
<!-- end: Head-->
<body>

  @yield("content")
	<!-- <div class="clearfix"></div>
	<footer>
		<p>
			<span style="text-align:left;float:left">&copy; 2013 <a href="http://themifycloud.com/downloads/janux-free-responsive-admin-dashboard-template/" alt="Bootstrap_Metro_Dashboard">JANUX Responsive Dashboard</a></span>
		</p>
	</footer> -->
	<!-- start: JavaScript-->
  @include("partials.scripts")
	<!-- end: JavaScript-->
</body>
</html>
