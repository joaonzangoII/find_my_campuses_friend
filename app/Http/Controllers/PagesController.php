<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\State;
use App\Models\University;
use App\Models\Student;
use App\Models\SosModel;
use App\Models\UserType;
use App\Models\Company;
class PagesController extends Controller
{
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
      $users= User::with("state")->latest()->get();
      return view("pages.index", compact("users"));
   }
}
