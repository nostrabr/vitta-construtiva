<?php

namespace Models;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model {
    protected $table = 'endereco';
    protected $fillable = [
        'endereco',
        'cidade',
        'estado',
        'bairro',
        'cep',
        'pais',
        'link_maps'
    ];
    public $timestamps = false;
}