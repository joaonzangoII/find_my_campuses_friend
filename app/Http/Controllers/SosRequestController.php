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
use App\Http\Requests\SosModelRequest;


class SosRequestController extends Controller {
  
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
		$sos= SosModel::latest()->get();
		return view("pages.sos_requests.index",compact("sos")); 
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$users_list = Student::lists("student_number","id");
    $companies_list = Company::lists("name","id");
		return view("pages.sos_requests.create",compact("users_list","companies_list")); 
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(SosModelRequest $request)
	{
		$data = $request->all();
		$user = User::findOrFail($request->input('user_id'));
		$sos = SosModel::create(['name' => date("ymdh"),'user_id'=>$request->input('user_id')]);
		$sos->companies()->attach($data["company_id"]);
		foreach ($data["company_id"] as $key => $company) {
			$company = Company::findOrFail($company);
			\Mail::send('emails.letter',compact('user','company'), function($message) use ($company, $user)
			{
			  $message->to($company->email, env('MAIL_FROM_NAME'))->subject('Internship Letter');
			});
		}
		return redirect("/sos-requests");
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
