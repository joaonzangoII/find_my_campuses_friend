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
use App\Http\Requests\UsersRequest;

class UsersController extends Controller {

	public function __construct()
	{
		$this->middleware('auth');
		$user_types =  UserType::lists("name","id");
		$states =  State::lists("name","id");
		$users_count= User::with("state")->latest()->get()->count();
		$universities_count= University::latest()->get()->count();
		$sos_count= SosModel::latest()->get()->count();
    $students_count= Student::latest()->get()->count();
		\View::share(compact("users_count", "universities_count","sos_count", "states","user_types","students_count"));
	}
	public function index(){
		$users= User::with("state")->latest()->get();
    return view("pages.users.index", compact("users"));
	}

	public function profile_pdf($user){
		$pdf = \App::make('dompdf.wrapper');
		$html = view('pages.users.profile_pdf',compact('user'));
		$pdf->loadHTML($html);
		return $pdf->stream();
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view("pages.users.create");
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(UsersRequest $request)
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
		if($request->input("user_type_id")==="1"){
    	$student = Staff::create(['staff_number'=>'00000']);
			$user = $student->user()->create($user);
			$user->makeEmployee('admin');
		}else if($request->input("user_type_id")==="2"){
      $student = Staff::create(['staff_number'=>'00000']);
			$user = $student->user()->create($user);
			$user->makeEmployee('lecturer');
		}
		else{
      $student = Student::create(['student_number'=>'00000']);
			$user = $student->user()->create($user);
			$user->makeEmployee('student');
		}

    return redirect("/users");
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	 public function show($user){
	 	// dd($user);
    return view("pages.users.show", compact("user"));
   }


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	 public function edit($user){
 		 return view("pages.users.edit", compact("user"));
 	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(UsersRequest $request,$user)
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

		return redirect("users");
	}

}
