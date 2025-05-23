<?php

namespace Models;

use Illuminate\Database\Eloquent\Model;

class TextosImagens extends Model {
    protected $table = 'textos_imagens';
    protected $fillable = [
        'gif_sobre_home',
        'texto_sobre_home',
        'texto_sobre_pag',
        'texto_colaboradores',
    ];
    public $timestamps = false;
}