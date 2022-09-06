<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class historiques extends Model
{
    use HasFactory;

       /**

     *
     * @var array
     */
    protected $fillable = [
        'poste_id',
        'user_id',

    ];

     /**

     * @var array
     */
    protected $hidden = [
        'poste_id',


    ];
}
