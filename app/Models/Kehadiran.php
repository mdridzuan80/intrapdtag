<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kehadiran extends Model
{
    use SoftDeletes;

    protected $table = 'kehadirans';
    protected $fillable = [
        'uuid',
        'nama',
        'nokp',
        'notel',
        'email',
        'acara_id',
    ];

    public function acara()
    {
        return $this->belongsTo(Acara::class, 'acara_id');
    }
}
