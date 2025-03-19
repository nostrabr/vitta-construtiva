<?php

require '../../../../config/config.php';
use Repositories\AreaAtuacaoRepository;

// pegando dados do do form
$id = $_POST['id'];
$descri = $_POST['att-descricao-projeto'];

// salvar
$res = AreaAtuacaoRepository::updateDescriProjeto($descri, $id);


if($res) {
    header('Location: ../../../../areas-atuacao.php?create=true');
} else {
    header('Location: ../../../../areas-atuacao.php?error=true');
}
