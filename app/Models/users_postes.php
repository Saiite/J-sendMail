<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class users_postes extends Model
{
    use HasFactory;

    
    protected $table = "postes_users";

    protected $fillable = ["user_id"];

    public $timestamps = false;
}
