<?php

namespace Models;

use Illuminate\Database\Eloquent\Model;

class Projeto extends Model {
    protected $table = 'projetos';
    protected $fillable = [
        'capa_projeto',
        'imagem_info_projeto',
        'texto_info_projeto',
        'descricao',
        'titulo_projetos',
        'area_atuacao_id'
    ];
    public $timestamps = false;

    public function areaAtuacao() {
        return $this->belongsTo(AreaAtuacao::class, 'area_atuacao_id');
    }

    public function imagensProjeto() {
        return $this->hasMany(ImagensProjeto::class, 'projeto_id');
    }
}