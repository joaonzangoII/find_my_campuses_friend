<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SosModel extends Model {
	protected $fillable = ['name','user_id','company_id'];

  public function getUserAttribute(){
     return \App\Models\User::findOrFail($this->user_id);
  }  
  public function getCompanyAttribute(){
     return \App\Models\Company::findOrFail($this->company_id);
  }

  public function companies()
  {
    return $this->belongsToMany('App\Models\Company', 'companies_sos_models');
  }
}
