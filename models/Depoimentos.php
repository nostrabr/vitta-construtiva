<?php

namespace Models;

use Illuminate\Database\Eloquent\Model;

class Depoimentos extends Model {
    protected $table = 'depoimentos';
    protected $fillable = [
        'video',
        'foto',
        'nome',
        'empresa',
        'texto',
        'tipo'
    ];
    public $timestamps = false;
}