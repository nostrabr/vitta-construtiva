<?php

namespace Models;

use Illuminate\Database\Eloquent\Model;

class ImagensProjeto extends Model {
    protected $table = 'imagens_projeto';
    protected $fillable = [
        'imagem',
        'projeto_id'
    ];
    public $timestamps = false;

    public function projeto() {
        return $this->belongsTo(Projeto::class, 'projeto_id');
    }
}