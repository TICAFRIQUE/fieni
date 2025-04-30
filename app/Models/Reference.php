<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\HasMedia;

class Reference extends Model implements HasMedia
{
    //
    use HasFactory, InteractsWithMedia;

    // public $incrementing = false;

    protected $fillable = [
        'titre',
        'description',
        'lien',
        'status',
    ];


    // public static function boot()
    // {
    //     parent::boot();
    //     self::creating(function ($model) {
    //         $model->id = IdGenerator::generate(['table' => 'references', 'length' => 8, 'prefix' =>
    //         mt_rand()]);
    //     });
    // }



    public function scopeActive($query){
        return $query->whereStatus('active');
    }
}
