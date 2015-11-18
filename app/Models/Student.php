<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model {
  protected $table = "users_students";
  protected $fillable = ["student_number","university_id","faculty_id","department_id","course_id"];

  public function user()
  {
    return $this->morphOne('App\Models\User', 'userable');
  }

  public function university()
  {
    return $this->morphOne('App\Models\University');
  }
}
