<?php

require '../../../../config/config.php';
use Repositories\AreaAtuacaoRepository;

// pegando dados do do form
$id = $_POST['id'];
$titulo_projetos = $_POST['att-area-atuacao-titulo-projetos'];

// salvar
$res = AreaAtuacaoRepository::updateTexto($titulo_projetos, $id, 'titulo-projetos');


if($res) {
    header('Location: ../../../../areas-atuacao.php?create=true');
} else {
    header('Location: ../../../../areas-atuacao.php?error=true');
}
