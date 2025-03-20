<?php

require '../../../../config/config.php';
use Repositories\EngenheirosRepository;

// pegando dados do do form
$id = $_POST['id'];
$cargo = $_POST['att-cargo'];

// salvar
$res = EngenheirosRepository::updateCargo($cargo, $id);


if($res) {
    header('Location: ../../../../engenheiros.php?create=true');
} else {
    header('Location: ../../../../engenheiros.php?error=true');
}
