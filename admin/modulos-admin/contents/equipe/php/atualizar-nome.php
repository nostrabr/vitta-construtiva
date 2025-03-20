<?php

require '../../../../config/config.php';
use Repositories\EquipeRepository;

// pegando dados do do form
$id = $_POST['id'];
$nome = $_POST['att-nome'];

// salvar
$res = EquipeRepository::updateNome($nome, $id);


if($res) {
    header('Location: ../../../../equipe.php?create=true');
} else {
    header('Location: ../../../../equipe.php?error=true');
}
