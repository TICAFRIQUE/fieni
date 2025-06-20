<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Video extends Model implements HasMedia
{
    //
    use HasFactory, InteractsWithMedia;

    public $incrementing = false;

    protected $fillable = [
        'titre',
        'description',
        'lien', // URL of the video
        'status',
        'vedette', // video in featured section
        'position',
    ];


    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->id = IdGenerator::generate(['table' => 'videos', 'length' => 10, 'prefix' =>
            mt_rand()]);
        });
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

