<?php

namespace Models;

use Illuminate\Database\Eloquent\Model;

class AreaAtuacao extends Model {
    protected $table = 'areas_atuacao';
    protected $fillable = [
        'capa',
        'marca_dagua',
        'titulo',
        'banner',
        'descricao',
        'titulo_projetos',
        'ordem_data'
    ];
    public $timestamps = false;

    public function projetos() {
        return $this->hasMany(Projeto::class, 'area_atuacao_id');
    }
}