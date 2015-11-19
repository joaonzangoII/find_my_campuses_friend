<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class Course extends Model implements SluggableInterface{
  
  use SluggableTrait; 
  protected $sluggable = [
    'build_from' => 'name',
    'save_to'    => 'slug',
  ];
	public function department()
	{
		return $this->belongsTo('App\Models\Department');
	}

}
