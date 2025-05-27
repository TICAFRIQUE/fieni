<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Parrainage extends Model implements HasMedia
{
    //
    use HasFactory, InteractsWithMedia;

    public $incrementing = false;

    protected $fillable = [
        'carte_electeur',
        'numero_cni',
        'lieu_enrolement',
        'nom',
        'prenoms',
        'nom_epouse',
        'date_naissance',
        'lieu_naissance',
        'contact',
    ];


    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->id = IdGenerator::generate(['table' => 'parrainages', 'length' => 10, 'prefix' =>
            mt_rand()]);
        });
    }



    // public function scopeActive($query)
    // {
    //     return $query->whereStatus('active');
    // }
}
