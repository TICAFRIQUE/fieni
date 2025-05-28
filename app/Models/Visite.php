<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visite extends Model
{
    //
    protected $fillable = ['page', 'ip'];
    protected $casts = [
        'visites' => 'integer',
    ];
}
