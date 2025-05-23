<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Equipe extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    public $incrementing = false;

    protected $fillable = [
        'nom',
        'job',
        'description',
        'status',
    ];

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->id = IdGenerator::generate(['table' => 'equipes', 'length' => 10, 'prefix' =>
            mt_rand()]);
        });
    }


    public function scopeActive($query){
        return $query->whereStatus('active');
    }
}
