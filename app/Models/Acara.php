<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Acara extends Model
{
    use SoftDeletes;

    protected $casts = [
        'waktu' => 'date',
    ];
    
    protected $table = 'acara';
    protected $fillable = [
        'tajuk',
        'keterangan',
        'waktu',
        'lokasi',
        'penganjur',
        'slug',
    ];

    public function kehadiran()
    {
        return $this->hasMany(Kehadiran::class, 'acara_id');
    }
}
