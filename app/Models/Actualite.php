<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Actualite extends Model implements HasMedia
{
    //
    //
    use HasFactory, InteractsWithMedia , Sluggable;

    public $incrementing = false;

    protected $fillable = [
        'titre',
        'slug',
        'description',
        'status', // 'active' ou 'desactive'
        'vedette', // 'oui' ou 'non'
        'date_publication',
    ];


    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->id = IdGenerator::generate(['table' => 'actualites', 'length' => 10, 'prefix' =>
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


    public function scopeActive($query)
    {
        return $query->whereStatus('active');
    }


    public function scopeVedette($query)
    {
        return $query->whereVedette('oui');
    }
}
