<?php

namespace Models;

use Illuminate\Database\Eloquent\Model;

class Equipe extends Model {
    protected $table = 'equipe';
    protected $fillable = [
        'foto',
        'nome',
        'cargo',
        'texto'
    ];
    public $timestamps = false;
}