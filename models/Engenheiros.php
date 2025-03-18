<?php

namespace Models;

use Illuminate\Database\Eloquent\Model;

class Engenheiros extends Model {
    protected $table = 'engenheiros';
    protected $fillable = [
        'foto',
        'nome',
        'cargo'
    ];
    public $timestamps = false;
}