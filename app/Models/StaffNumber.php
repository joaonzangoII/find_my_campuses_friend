<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StaffNumber extends Model {

  protected $table = "staff_numbers";
  protected $fillable = ["date", "number"];

}
