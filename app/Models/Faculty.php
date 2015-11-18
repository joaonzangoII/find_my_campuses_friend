<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class Faculty extends Model implements SluggableInterface{

  use SluggableTrait; 
  protected $sluggable = [
    'build_from' => 'name',
    'save_to'    => 'slug',
  ];

	public function departments()
	{
			return $this->hasMany('App\Models\Department');
	}

	public function university()
	{
		return $this->belongsTo('App\Models\University');
	}

}
