<?php

require '../../../../config/config.php';
use Repositories\TextosImagensRepository;

// pegando dados do do form
$texto = $_POST['texto-quem-somos'];

// salvar
$res = TextosImagensRepository::updateTextoQuemSomos([
    'texto_sobre_pag' => $texto
]);

if($res) {
    header('Location: ../../../../textos-imagens.php?create=true');
} else {
    header('Location: ../../../../textos-imagens.php?error=true');
}
