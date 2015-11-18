<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class Department extends Model implements SluggableInterface{
  
  use SluggableTrait; 
  protected $sluggable = [
    'build_from' => 'name',
    'save_to'    => 'slug',
  ];
	public function courses()
	{
			return $this->hasMany('App\Models\Course');
	}

	public function faculty()
	{
			return $this->belongsTo('App\Models\Faculty');
	}

}
