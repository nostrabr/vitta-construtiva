<?php
namespace Repositories;

use Models\AreaAtuacao;
use Models\Projeto;
use Models\ImagensProjeto;

class AreaAtuacaoRepository {
    // pegando todas as áreas de atuação
    public static function getAll() {
        return AreaAtuacao::with('projetos.imagensProjeto')->get();
    }
}