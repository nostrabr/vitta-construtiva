<?php

require '../../../../config/config.php';
use Repositories\TextosImagensRepository;

// pegando dados do do form
$texto = $_POST['titulo-texto-home'];

// salvar
$res = TextosImagensRepository::updateTituloTextoHome([
    'titulo_texto_sobre_home' => $texto
]);

if($res) {
    header('Location: ../../../../textos-imagens.php?create=true');
} else {
    header('Location: ../../../../textos-imagens.php?error=true');
}
