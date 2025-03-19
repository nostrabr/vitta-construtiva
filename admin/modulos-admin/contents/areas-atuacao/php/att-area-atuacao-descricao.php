<?php

require '../../../../config/config.php';
use Repositories\AreaAtuacaoRepository;

// pegando dados do do form
$id = $_POST['id'];
$descricao = $_POST['att-area-atuacao-descricao'];

// salvar
$res = AreaAtuacaoRepository::updateTexto($descricao, $id, 'descricao');


if($res) {
    header('Location: ../../../../areas-atuacao.php?create=true');
} else {
    header('Location: ../../../../areas-atuacao.php?error=true');
}
