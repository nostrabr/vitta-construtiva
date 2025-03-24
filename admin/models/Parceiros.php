<?php

namespace Models;

use Illuminate\Database\Eloquent\Model;

class Parceiros extends Model {
    protected $table = 'parceiros';
    protected $fillable = [
        'nome',
        'logo'
    ];
    public $timestamps = false;
}