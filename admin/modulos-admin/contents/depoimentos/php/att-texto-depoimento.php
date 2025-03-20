<?php

require '../../../../config/config.php';
use Repositories\DepoimentosRepository;

// pegando dados do do form
$id = $_POST['id'];
$depoimento = $_POST['att-depoimento'];

// salvar
$res = DepoimentosRepository::updateDepoimento($depoimento, $id);


if($res) {
    header('Location: ../../../../depoimentos.php?create=true');
} else {
    header('Location: ../../../../depoimentos.php?error=true');
}
