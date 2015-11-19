<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model {

   protected $table = "users_staffs";
      protected $fillable = ["staff_number"];

   public function user()
   {
       return $this->morphOne('App\Models\User', 'userable');
   }
}
