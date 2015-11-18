<?php namespace App\Models;
use Illuminate\Database\Eloquent\Model;

 class State extends Model {
     protected $fillable = ['name','colour'];
     public function users()
     {
         return $this->hasMany('App\Models\User');
     }
 }
