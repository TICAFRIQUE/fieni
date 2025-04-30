<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MotDirecteur extends Model implements HasMedia
{
    //
    use HasFactory, InteractsWithMedia;

    public $incrementing = false;

    protected $fillable = [
        'nom_directeur',
        'description',
        'status',

    ];


    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->id = IdGenerator::generate(['table' => 'mot_directeurs', 'length' => 10, 'prefix' =>
            mt_rand()]);
        });
    }



    public function scopeActive($query){
        return $query->whereStatus('active');
    }
}
