<?php

require '../../../../config/config.php';
use Repositories\AreaAtuacaoRepository;

// pegando dados do do form
$id = $_POST['id'];
$identificador = $_POST['att-identificador'];

// salvar
$res = AreaAtuacaoRepository::updateIdentificadorProjeto($identificador, $id);


if($res) {
    header('Location: ../../../../areas-atuacao.php?create=true');
} else {
    header('Location: ../../../../areas-atuacao.php?error=true');
}
