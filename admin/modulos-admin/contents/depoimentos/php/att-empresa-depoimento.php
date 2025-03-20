<?php

require '../../../../config/config.php';
use Repositories\DepoimentosRepository;

// pegando dados do do form
$id = $_POST['id'];
$empresa = $_POST['att-empresa'];

// salvar
$res = DepoimentosRepository::updateEmpresa($empresa, $id);


if($res) {
    header('Location: ../../../../depoimentos.php?create=true');
} else {
    header('Location: ../../../../depoimentos.php?error=true');
}
