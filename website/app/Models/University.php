<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class University extends Model implements SluggableInterface{
  use SluggableTrait;

  protected $table = 'universities';
  protected $fillable = ['name','description','slogan','chancellor','vice_chancellor'];
  protected $sluggable = [
    'build_from' => 'name',
    'save_to'    => 'slug',
  ];

  public function faculties()
  {
    return $this->hasMany('App\Models\Faculty');
  }
  public function students()
	{
		return $this->hasMany('App\Models\Student');
	}
  public function getPatchLinkAttribute(){
    return url('/universities/'. $this->slug);
  }

  public function getDeleteLinkAttribute(){
    return url('/universities/'. $this->slug);
  }

  public function getEditLinkAttribute(){
    return url('/universities/'. $this->slug . "/edit");
  }

  public function getShowLinkAttribute(){
    return url('/universities/'. $this->slug);
  }
}
