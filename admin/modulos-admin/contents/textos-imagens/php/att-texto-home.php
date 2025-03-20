<?php

require '../../../../config/config.php';
use Repositories\TextosImagensRepository;

// pegando dados do do form
$texto = $_POST['texto-home'];

// salvar
$res = TextosImagensRepository::updateTextoHome([
    'texto_sobre_home' => $texto
]);

if($res) {
    header('Location: ../../../../textos-imagens.php?create=true');
} else {
    header('Location: ../../../../textos-imagens.php?error=true');
}
