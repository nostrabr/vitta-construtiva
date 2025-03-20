<?php

require '../../../../config/config.php';
use Repositories\EquipeRepository;

// pegando dados do do form
$id = $_POST['id'];
$cargo = $_POST['att-cargo'];

// salvar
$res = EquipeRepository::updateCargo($cargo, $id);


if($res) {
    header('Location: ../../../../equipe.php?create=true');
} else {
    header('Location: ../../../../equipe.php?error=true');
}
