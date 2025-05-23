<?php

require '../../../../config/config.php';
use Repositories\AreaAtuacaoRepository;

// pegando dados do do form
$id = $_GET['id'];

// salvar
$res = AreaAtuacaoRepository::ordenarProjeto($id);


if($res) {
    header('Location: ../../../../areas-atuacao.php?success=true');
} else {
    header('Location: ../../../../areas-atuacao.php?error=true');
}
