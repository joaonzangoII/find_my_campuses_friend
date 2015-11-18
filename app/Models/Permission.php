<?php namespace App\Models;
use Illuminate\Database\Eloquent\Model;

 class Permission extends Model {
  
  protected $fillable = ["name","permission"];
  public $timestamps = false;

  /**
  * Get users with a certain role
  */
  public function users()
  {
    return $this->belongsToMany('App\Models\User', 'permissions_users');
  }
 }
