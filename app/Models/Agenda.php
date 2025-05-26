<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Agenda extends Model implements HasMedia
{
    //
    //
    use HasFactory, InteractsWithMedia, Sluggable;

    public $incrementing = false;

    protected $fillable = [
        'titre',
        'slug',
        'description',
        'lieu',
        'date_debut',
        'date_fin',
        'type', // 'conference', 'atelier', 'evenement', campagne.
        'etat', // 'en_cours', 'a_venir', 'terminé',
        'is_public', // true ou false
    ];


    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->id = IdGenerator::generate(['table' => 'agendas', 'length' => 10, 'prefix' =>
            mt_rand()]);
        });
    }

    // slug avec sluggable

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'titre'
            ]
        ];
    }


    public function scopePublic($query)
    {
        return $query->where('is_public', true);
    }
}
