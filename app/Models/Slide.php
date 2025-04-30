<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Slide extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia ;

    public $incrementing = false;

    protected $fillable = [
        'titre',
        'description',
        'status',
        'created_at',
        'updated_at',
    ];

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->id = IdGenerator::generate(['table' => 'slides', 'length' => 10, 'prefix' =>
            mt_rand()]);
        });
    }


    public function scopeActive($query){
        return $query->whereStatus('active');
    }

}