<?php

require '../../../../config/config.php';
use Repositories\EngenheirosRepository;

// pegando dados do do form
$id = $_POST['id'];
$nome = $_POST['att-nome'];

// salvar
$res = EngenheirosRepository::updateNome($nome, $id);


if($res) {
    header('Location: ../../../../engenheiros.php?create=true');
} else {
    header('Location: ../../../../engenheiros.php?error=true');
}
