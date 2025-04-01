<?php

namespace Models;

use Illuminate\Database\Eloquent\Model;

class Projeto extends Model {
    protected $table = 'projetos';
    protected $fillable = [
        'capa_projeto',
        'imagem_info_projeto',
        'descricao',
        'identificador',
        'area_atuacao_id',
        'banner_projeto'
    ];
    public $timestamps = false;

    public function areaAtuacao() {
        return $this->belongsTo(AreaAtuacao::class, 'area_atuacao_id');
    }

    public function imagensProjeto() {
        return $this->hasMany(ImagensProjeto::class, 'projeto_id');
    }
}