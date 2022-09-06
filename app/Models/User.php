<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'image_id',
      'password',
    ];
    protected $guarded=[];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'email_verified_at',
        'created_at',
        'poste_id',
        'updated_at',
    ];
    protected $rules = [
        'user.first_name' => 'max:15',
        'user.last_name' => 'max:20',
        'user.birthday' => 'date_format:Y-m-d',
        'user.email' => 'email',
        'user.phone' => 'numeric',
        'user.gender' => '',
        'user.address' => 'max:20',
        'user.number' => 'numeric',
        'user.city' => 'max:20',
        'postes.poste_libele'=>'max:15',
        'user.zip' => 'numeric',
    ];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function courriers()
    {
        return $this->hasMany(courrier::class, 'users_id');
    }



    public function permissions()
    {
        return $this->belongsToMany(permission::class,'user_permissions', 'user_id', 'permission_id');
    }

    public function roles()
    {
        return $this->belongsToMany(role::class,'userrole', 'user_id', 'role_id');
    }


    public function haspermission($permission)

    {
        return $this->permissions()->where('permission_libele',$permission)->first() !== null;
    }
    public function hasanypermission($permissions)
    {
        return $this->permissions()->whereIn('permission_libele',$permissions)->first() !== null;
    }


public function postes()
{
    return $this->belongsToMany(postes::class, 'historiques');
}

   public function Image(){
    return $this->belongsTo(Image::class,'image_id');
   }


   public function scopeActive( $query)
   {
       return $query->where('status', 1);
   }

}

