<?php namespace App;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
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