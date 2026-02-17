<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Acara extends Model
{
    use SoftDeletes;

    protected $table = 'acara';
    protected $fillable = [
        'tajuk',
        'keterangan',
        'waktu',
        'lokasi',
        'penganjur',
        'slug',
    ];
}
