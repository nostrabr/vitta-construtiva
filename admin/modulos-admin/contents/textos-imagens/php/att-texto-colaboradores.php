<?php

require '../../../../config/config.php';
use Repositories\TextosImagensRepository;

// pegando dados do do form
$texto = $_POST['texto-colaboradores'];

// salvar
$res = TextosImagensRepository::updateTextoColaboradores([
    'texto_colaboradores' => $texto
]);

if($res) {
    header('Location: ../../../../textos-imagens.php?create=true');
} else {
    header('Location: ../../../../textos-imagens.php?error=true');
}
