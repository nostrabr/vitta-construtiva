<?php

namespace Models;

use Illuminate\Database\Eloquent\Model;

class AreaAtuacao extends Model {
    protected $table = 'areas_atuacao';
    protected $fillable = [
        'capa',
        'titulo',
        'banner',
        'descricao',
        'titulo_projetos'
    ];
    public $timestamps = false;

    public function projetos() {
        return $this->hasMany(Projeto::class, 'area_atuacao_id');
    }
}