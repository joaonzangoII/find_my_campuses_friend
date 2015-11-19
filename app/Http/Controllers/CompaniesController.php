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
use App\Http\Requests\CompaniesRequest;

class CompaniesController extends Controller {

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
		$companies= Company::latest()->get();
		return view("pages.companies.index",compact("companies"));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view("pages.companies.create");
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(CompaniesRequest $request)
	{
		$data = $request->only('name','contact','email','address','website','contact_person');
		// dd($data);
		$company = Company::create($data);
			// $company = Company::create([
		//   	'name' => $request->input("name"),
		//   	'contact' => $request->input("contact"),
		//   	'email' => $request->input("email"),
		//   	'address' => $request->input("address"),
		//   	'website' => $request->input("website"),
		//   	'contact_person' => $request->input("contact_person"),
		// ]);


    return redirect("/companies");
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	 public function show($company){
	 	// dd($company);
    return view("pages.companies.show", compact("company"));
   }

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	 public function edit($company){
 		 return view("pages.companies.edit", compact("company"));
 	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(CompaniesRequest $request,$company)
	{
		$company->update($request->all());
		return redirect($company->show_link);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($company)
	{
		$company->delete();

		return redirect("companies");
	}

}
