<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    Model::unguard();

    $this->call(UserTypeTableSeeder::class);
    $this->call(CompanyTableSeeder::class);
    $this->call(UniversityTableSeeder::class);
    $this->call(PermissionTableSeeder::class);
    $this->call(StateTableSeeder::class);
    $this->call(UserTableSeeder::class);

    Model::reguard();
  }
}


use App\Models\User;
use App\Models\Staff;
use App\Models\Student;
use App\Models\StudentNumber;
use App\Models\StaffNumber;
class UserTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    User::truncate();
    Staff::truncate();
    Student::truncate();
    StudentNumber::truncate();
    StaffNumber::truncate();

    $user =[
      'first_name' => 'Jose Antonio',
      'last_name'  => 'Sinadinse',
      'fullname'  => '',
      'password' => \Hash::make('password'),
      'email' => 'toniobarros@hotmail.com',
      'address' => 'Pretoria',
      'cellnumber' => '000000000',
      'user_type_id' => 1,
      'state_id' => 1,
    ];
    
    if(StaffNumber::all()->count()==0){
      $stfnum = StaffNumber::create(["number" => 2000, "date"=> date("Y-m-d")]);
    }
    else{
      $lateststfnum = StaffNumber::all()->last();
      $stfnum = StaffNumber::create(["number" => $lateststfnum->number  + 1 , "date"=> date("Y-m-d")]);
    }

    $staff = Staff::create(['staff_number'=>$stfnum->number]);
    $user = $staff->user()->create($user);
    $user->addPermission('admin');

    for ($i=3; $i < 20 ; $i++) {
      $user = [
        'first_name' => 'Name' . $i,
        'last_name'  => 'Surname' . $i,
        'fullname'  => '',
        'password' => \Hash::make('aleluia'),
        'email' => 'josebarros'. $i . '@hotmail.com',
        'address' => 'Pretoria',
        'cellnumber' => '00000000' . $i,
        'user_type_id' => 3,
        'state_id' => 1,
      ];
      if(StudentNumber::all()->count()==0){
        $stdnum = StudentNumber::create(["number" => 200000000, "date"=> date("Y-m-d")]);
      }
      else{
        $lateststdnum = StudentNumber::all()->last();
        $stdnum = StudentNumber::create(["number" => $lateststdnum->number  + 1 , "date"=> date("Y-m-d")]);
      }

      $student = Student::create(['student_number'=>$stdnum->number,"university_id"=> 1,"faculty_id"=>'',"department_id"=>'',"course_id"=>'']);
      $user = $student->user()->create($user);
      $user->addPermission('student');
    }
  }
}

use App\Models\University;
class UniversityTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    University::truncate();

    $university = University::create([
      'name' => 'Tshwane University of Technology',
      'description' => '',
      'slogan' => 'We Empower People',
      'chancellor' => 'Gwendoline Malegwale Ramokgopavsss',
      'vice_chancellor' => 'Prof Lourens van Staden',
      'website' => 'www.tut.ac.za',
    ]);
  }
}

use App\Models\UserType;
class UserTypeTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    UserType::truncate();

    $user_type = UserType::create([
      'name' => 'Admin',
    ]);
    $user_type = UserType::create([
      'name' => 'Lecturer',
    ]);

    $user_type = UserType::create([
      'name' => 'Student',
    ]);
  }
}
use App\Models\Company;
class CompanyTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    Company::truncate();
    $companies = [
      "Vodacom",
      "MTN",
      "BMW",
      "SITA",
      "City of Tshwane",
      "Telkom",
      "Accenture",
      "Innovation Hub",
      "Mlab",
    ];
    foreach ($companies as $company) { 
      $r = Company::create([
        "name" => $company,
        "contact" => '0400004442',
        "email" => 'ino@one.com',
        "address" => 'ss',
        "website" => 'www.one.com',
        "contact_person" => ''
      ]);
    }
  }
}
use App\Models\Permission;
class PermissionTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    Permission::truncate();
    $permissions = [
      "view_lecturer",
      "create_lecturer",
      "edit_lecturer",
      "delete_lecturer",
      "view_student",
      "create_student",
      "edit_student",
      "delete_student",
      "edit_profile",
      "view_profile"
    ];    
    $names = [
      "View Lecturer",
      "Create Lecturer",
      "Edit Lecturer",
      "Delete Lecturer",
      "View Student",
      "Create Student",
      "Edit Student",
      "Delete Student",
      "Edit Profile",
      "View Profile"
    ];
    for ($i=0; $i < count($permissions) ; $i++) { 
      $r = Permission::create([
        'name' => $names[$i],
        'permission' => $permissions[$i],
      ]);
    }
  }
}

use App\Models\State;
class StateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      State::truncate();
      $state = State::create([
        'name' => 'Created',
        'colour' => 'green']
      );
      $state = State::create([
        'name' => 'Approved',
        'colour' => 'green']
      );

      $state = State::create([
        'name' => 'Pending',
        'colour' => 'yellow']
      );
      $state = State::create([
        'name' => 'Banned',
        'colour' => 'red']
      );
      $state = State::create([
        'name' => 'Updated',
        'colour' => 'blue']
      );
    }
}
