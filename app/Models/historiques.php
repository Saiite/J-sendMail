<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class historiques extends Model
{
    use HasFactory;

       /**
     * Les attributs qui sont assignables en masse.
     *
     * @var array
     */
    protected $fillable = [
        'poste_id',
        'user_id',
     
    ]; 

     /**
     * Les attributs qui doivent être masqués pour les tableaux..
     *
     * @var array
     */
    protected $hidden = [
        'poste_id',
    
      
    ];
}
