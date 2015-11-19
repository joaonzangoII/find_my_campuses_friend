<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserType extends Model {
	/**
   * The database table used by the model.
   *
   * @var string
   */
  protected $table = 'user_types';
  protected $fillable = ['name'];

  public function users()
  {
      return $this->hasMany('App\Models\User');
  }
}
