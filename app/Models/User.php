<?php namespace App\Models;

  use App\Models\Permission;
  use Illuminate\Auth\Authenticatable;
  use Illuminate\Database\Eloquent\Model;
  use Illuminate\Auth\Passwords\CanResetPassword;
  use Illuminate\Foundation\Auth\Access\Authorizable;
  use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
  use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
  use Illuminate\Database\Eloquent\SoftDeletes;
  use Cviebrock\EloquentSluggable\SluggableInterface;
  use Cviebrock\EloquentSluggable\SluggableTrait;

  class User extends Model implements  AuthenticatableContract, CanResetPasswordContract,SluggableInterface {
    use SluggableTrait;
    use Authenticatable,CanResetPassword;
    use SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';
    protected $fillable = ['first_name','last_name', 'email', 'password','user_type_id', 'avatar','slug', 'token','state_id','userable_id','userable_type','cellnumber'];
    protected $hidden = ['password', 'remember_token'];

    protected $sluggable = [
      'build_from' => 'fullname',
      'save_to'    => 'slug',
    ];

     public function user_type(){
       return $this->belongsTo("App\Models\UserType");
     }

     public function permissions()
     {
         return $this->belongsToMany('App\Models\Permission', 'permissions_users');
     }

     public function state()
     {
         return $this->belongsTo('App\Models\State');
     }

     /**
      * Find out if User is an employee, based on if has any permissions
      *
      * @return boolean
      */
     public function isEmployee()
     {
         $permissions = $this->permissions->toArray();
         return !empty($permissions);
     }

     /**
      * Find out if user has a specific role
      *
      * $return boolean
      */
     public function hasPermission($check)
     {
        return in_array($check, array_fetch($this->permissions->toArray(), 'name'));
     }

     /**
      * Get key in array with corresponding value
      *
      * @return int
      */
     private function getIdInArray($array, $term)
     {
         foreach ($array as $key => $value) {
             if ($value == $term) {
                 return $key;
             }
         }

        //  throw new UnexpectedValueException;
     }

     /**
      * Add permissions to user to make them a concierge
      */
     public function addPermission($title)
     {
         $assigned_permissions = array();
         $permissions = Permission::lists('permission');
         // $permissions = array_fetch(Role::all()->toArray(), 'name');

         switch ($title) {
             case 'admin':
                $assigned_permissions[] = $this->getIdInArray($permissions, 'view_lecturer');
                $assigned_permissions[] = $this->getIdInArray($permissions, 'create_lecturer');
                $assigned_permissions[] = $this->getIdInArray($permissions, 'edit_lecturer');
                $assigned_permissions[] = $this->getIdInArray($permissions, 'delete_lecturer');      

                $assigned_permissions[] = $this->getIdInArray($permissions, 'view_student');
                $assigned_permissions[] = $this->getIdInArray($permissions, 'create_student');
                $assigned_permissions[] = $this->getIdInArray($permissions, 'edit_student');
                $assigned_permissions[] = $this->getIdInArray($permissions, 'delete_student');
             case 'lecturer':
                 $assigned_permissions[] = $this->getIdInArray($permissions, 'view_student');
                 $assigned_permissions[] = $this->getIdInArray($permissions, 'view_profile');
                 $assigned_permissions[] = $this->getIdInArray($permissions, 'edit_profile');
             case 'student':
                 $assigned_permissions[] = $this->getIdInArray($permissions, 'view_profile');
                 $assigned_permissions[] = $this->getIdInArray($permissions, 'edit_profile');
                 break;
             default:
                 throw new \Exception("The employee status entered does not exist");
         }

         $this->permissions()->attach($assigned_permissions);
     }

     public function getFullnameAttribute(){
       return $this->first_name . " " . $this->last_name;
     }
     public function getStudentNumberAttribute(){
      if($this->userable_type ==="App\Models\Student"){
        $student = \App\Models\Student::findOrFail($this->userable_id);
        return $student->student_number;
      }
      
      $staff = \App\Models\Staff::findOrFail($this->userable_id);
      return $staff->staff_number;
     }

    public function getPatchLinkAttribute(){
      return url('/users/'. $this->slug);
    }

    public function getDeleteLinkAttribute(){
      return url('/users/'. $this->slug);
    }

    public function getEditLinkAttribute(){
      return url('/users/'. $this->slug . "/edit");
    }

    public function getShowLinkAttribute(){
      return url('/users/'. $this->slug);
    }

    public function getAuthIdentifier()
    {
       return $this->getKey();
    }

    public function getAuthPassword()
    {
       return $this->password;
    }

    public function getReminderEmail()
    {
       return $this->email;
    }

    public function userable()
    {
       return $this->morphTo();
    }

    public function getUserTypeDescrAttribute(){
      return $this->user_type->name;
    }

    public function scopeStudent($query)
    {
      $query->where("userable_type", "App\Models\Student");
    }
  }
