<?php

require '../../../../config/config.php';
use Repositories\DepoimentosRepository;

// pegando dados do do form
$id = $_POST['id'];
$nome = $_POST['att-nome'];

// salvar
$res = DepoimentosRepository::updateNome($nome, $id);


if($res) {
    header('Location: ../../../../depoimentos.php?create=true');
} else {
    header('Location: ../../../../depoimentos.php?error=true');
}
