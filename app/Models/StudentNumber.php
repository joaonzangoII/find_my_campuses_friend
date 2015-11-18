<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentNumber extends Model {

	protected $table = "student_numbers";
  protected $fillable = ["date", "number"];

}
