<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Staff;
use App\Models\Student;
use App\Models\State;
use App\Models\University;
use App\Models\SosModel;
use App\Models\UserType;
use App\Models\Company;
use App\Http\Requests\StudentsRequest;

class StudentsController extends Controller {

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
	public function index(){
		$students= User::latest()->student()->get();
		return view("pages.students.index",compact("students"));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view("pages.students.create");
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(StudentsRequest $request)
	{
		$user = [
		  'first_name' => $request->input('first_name'),
		  'last_name'  => $request->input('last_name'),
		  'fullname'  =>  '',
		  'password' => '0000',
		  'email' => $request->input('email'),
		  'address' => $request->input('address'),
		  'cellnumber' => $request->input('cellnumber'),
		  'user_type_id' => $request->input('user_type_id'),
		  'state_id' => 1,
		];
		
    $student = Student::create(['student_number'=>'00000']);
		$user = $student->user()->create($user);
		$user->makeEmployee('student');


    return redirect("/students");
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	 public function show($user){
	 	// dd($user);
    return view("pages.students.show", compact("user"));
   }

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	 public function edit($user){
 		 return view("pages.students.edit", compact("user"));
 	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(StudentsRequest $request,$user)
	{
		$user->update($request->all());
		return redirect($user->show_link);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($user)
	{
		$user->delete();

		return redirect("students");
	}

}
