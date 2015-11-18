<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class Company extends Model implements SluggableInterface{
  
  use SluggableTrait;
  protected $table = 'companies';
  protected $fillable = ['name','contact','email','address','website','contact_person','slug'];
  protected $sluggable = [
    'build_from' => 'name',
    'save_to'    => 'slug',
  ];

  public function sos_requests()
  {
    return $this->belongsToMany('App\Models\SosModel', 'companies_sos_models');
  }
}
