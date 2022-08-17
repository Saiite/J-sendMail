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
      'password',
    ];
    protected $guarded=[];

    // public function courriers()
    // {
    //     return $this->hasMany(courrier::class, 'user_id');
    // }
    // public function notifications()
    // {
    //     return $this->hasMany(notification::class, 'user_id');
    // }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
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
        return $this->hasMany(courrier::class, 'user_id');
    }

    public function permissions()
    {
        return $this->belongsToMany(permission::class,'user_permissions', 'user_id', 'permission_id');
    }

    public function roles()
    {
        return $this->belongsToMany(role::class,'userrole', 'user_id', 'role_id');
    }

    public function hasroles($role)

    {
        return $this->roles()->where('role_libele',$role)->first() !== null;
    }
    public function hasanyroles($roles)
    {
        return $this->roles()->whereIn('role_libele',$roles)->first() !== null;
    }
    public function haspermission($permission)

    {
        return $this->permissions()->where('permission_libele',$permission)->first() !== null;
    }
    public function hasanypermission($permissions)
    {
        return $this->permissions()->whereIn('permission_libele',$permissions)->first() !== null;
    }

    public static function search($query)
    {
        return empty($query) ? static::query()->where('user_type', 'user')
            : static::where('user_type', 'user')
                ->where(function($q) use ($query) {
                    $q
                        ->where(' first_name', 'LIKE', '%'. $query . '%')
                        ->where(' last_name', 'LIKE', '%'. $query . '%')
                        ->orWhere('email', 'LIKE', '%' . $query . '%')
                        ->orWhere('address', 'LIKE ', '%' . $query . '%');
                });
    }
}
