<?php

require '../../../../config/config.php';
use Repositories\EquipeRepository;

// pegando dados do do form
$id = $_POST['id'];
$texto = $_POST['att-texto'];

// salvar
$res = EquipeRepository::updateTexto($texto, $id);


if($res) {
    header('Location: ../../../../equipe.php?create=true');
} else {
    header('Location: ../../../../equipe.php?error=true');
}
