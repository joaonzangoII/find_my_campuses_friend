<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class Company extends Model implements SluggableInterface{
  use SluggableTrait;
  protected $sluggable = [
    'build_from' => 'name',
    'save_to'    => 'slug',
  ];
  protected $table = 'companies';
  protected $fillable = ['name','contact','email','address','website','contact_person','slug'];

  public function sos_requests()
  {
    return $this->belongsToMany('App\Models\SosModel', 'companies_sos_models');
  }

  public function getPatchLinkAttribute(){
    return url('/companies/'. $this->slug);
  }

  public function getDeleteLinkAttribute(){
    return url('/companies/'. $this->slug);
  }

  public function getEditLinkAttribute(){
    return url('/companies/'. $this->slug . "/edit");
  }

  public function getShowLinkAttribute(){
    return url('/companies/'. $this->slug);
  }

}
