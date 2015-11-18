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

    $user =[
      'first_name' => 'Jose Antonio',
      'last_name'  => 'Sinadinse',
      'password' => \Hash::make('password'),
      'email' => 'toniobarros@hotmail.com',
      'address' => 'Pretoria',
      'cellnumber' => '000000000',
      'user_type_id' => 1,
      'state_id' => 1,
    ];
    $staff = Staff::create(['staff_number'=>'00000']);
    $user = $staff->user()->create($user);
    $user->addPermission('admin');

    for ($i=3; $i < 20 ; $i++) {
      $user = [
        'first_name' => 'Name' . $i,
        'last_name'  => 'Surname' . $i,
        'password' => \Hash::make('aleluia'),
        'email' => 'josebarros'. $i . '@hotmail.com',
        'address' => 'Pretoria',
        'cellnumber' => '00000000' . $i,
        'user_type_id' => 3,
        'state_id' => 1,
      ];
      $student = Student::create(['student_number'=>'00000',"university_id"=> 1,"faculty_id"=>'',"department_id"=>'',"course_id"=>'']);
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
