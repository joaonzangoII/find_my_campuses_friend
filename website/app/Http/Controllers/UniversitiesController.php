<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Staff;
use App\Models\Student;
use App\Models\State;
use App\Models\University;
use App\Models\SosModel;
use App\Models\UserType;
use App\Models\Company;
use Illuminate\Http\Request;
use App\Http\Requests\UniversitiesRequest;
class UniversitiesController extends Controller {
  
  public function __construct()
	{
		$this->middleware('auth');
		$user_types =  UserType::lists("name","id");
		$states =  State::lists("name","id");
		$users_count= User::with("state")->latest()->get()->count();
		$universities_count= University::latest()->get()->count();
		$sos_count= SosModel::latest()->get()->count();
    $students_count= Student::latest()->get()->count();
    $companies_count= Company::latest()->get()->count();
		\View::share(compact("users_count", "universities_count","sos_count", "states","user_types","students_count","companies_count"));
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$universities= University::latest()->get();
		return view("pages.universities.index",compact("universities")); 
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view("pages.universities.create"); 
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(UniversitiesRequest $request)
	{

		$university = University::create($request->all());
		return redirect("/universities");
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($university)
	{
		return view("pages.universities.show",compact("university"));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($university)
	{
		return view("pages.universities.edit",compact("university"));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(UniversitiesRequest $request,$university)
	{
		$university->update($request->all());
		return redirect()->back();
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($university)
	{
		//
	}

}
