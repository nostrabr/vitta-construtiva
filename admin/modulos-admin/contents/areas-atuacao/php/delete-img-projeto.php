<?php

require '../../../../config/config.php';
use Repositories\AreaAtuacaoRepository;

// pegando dados do do form
$id = $_GET['id'];

// salvar
$res = AreaAtuacaoRepository::deleteImgProjeto($id);


if($res) {
    header('Location: ../../../../areas-atuacao.php?delete=true');
} else {
    header('Location: ../../../../areas-atuacao.php?error=true');
}
