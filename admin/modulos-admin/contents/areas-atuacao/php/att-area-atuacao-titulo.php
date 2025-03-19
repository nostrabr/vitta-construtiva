<?php

require '../../../../config/config.php';
use Repositories\AreaAtuacaoRepository;

// pegando dados do do form
$id = $_POST['id'];
$titulo = $_POST['att-area-atuacao-titulo'];

// salvar
$res = AreaAtuacaoRepository::updateTexto($titulo, $id, 'titulo');


if($res) {
    header('Location: ../../../../areas-atuacao.php?create=true');
} else {
    header('Location: ../../../../areas-atuacao.php?error=true');
}
