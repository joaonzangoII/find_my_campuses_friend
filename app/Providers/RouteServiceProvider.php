<?php namespace App\Providers;

use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use App\Models\User;
use App\Models\University;

class RouteServiceProvider extends ServiceProvider {

	/**
	 * This namespace is applied to the controller routes in your routes file.
	 *
	 * In addition, it is set as the URL generator's root namespace.
	 *
	 * @var string
	 */
	protected $namespace = 'App\Http\Controllers';

	/**
	 * Define your route model bindings, pattern filters, etc.
	 *
	 * @param  \Illuminate\Routing\Router  $router
	 * @return void
	 */
	public function boot(Router $router)
	{
		parent::boot($router);

		$router->bind("users",function($slug){
			try {
			  $user = User::whereSlug($slug)->with("state","user_type")->firstOrFail();
			  // User::with()->findOrFail($id);
			  return $user;
			} catch ( ModelNotFoundException $e ) {
			   return abort("404");
			}
		});
		$router->bind("students",function($slug){
			try {
			  $student = User::whereSlug($slug)->with("state","user_type")->firstOrFail();
			  // User::with()->findOrFail($id);
			  return $student;
			} catch ( ModelNotFoundException $e ) {
			   return abort("404");
			}
		});
		$router->bind("universities",function($slug){
			try {
			  $university = University::whereSlug($slug)->with("students","faculties")->firstOrFail();
			  // User::with()->findOrFail($id);
			  return $university;
			} catch ( ModelNotFoundException $e ) {
			   return abort("404");
			}
		});
	}

	/**
	 * Define the routes for the application.
	 *
	 * @param  \Illuminate\Routing\Router  $router
	 * @return void
	 */
	public function map(Router $router)
	{
		$router->group(['namespace' => $this->namespace], function($router)
		{
			require app_path('Http/routes.php');
		});
	}

}
