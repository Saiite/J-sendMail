<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Foundation\Auth\postes as Authenticatable;
use Illuminate\Notifications\Notifiable;


class postes extends Model
{
    use HasFactory;
    protected $fillable = [
        
        'poste_libele',
        
    
    ];

    protected $rules = [
        'postes.poste_libele'=>'poste_libele',
    
    ];
 
  

    public function users()
{
    return $this->belongsToMany(User::class, 'historiques');
}
}
