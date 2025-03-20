<?php

require '../../../../config/config.php';
use Repositories\DepoimentosRepository;

// pegando dados do do form
$video = $_POST['video'];

function extrairSrcIframe($iframe) {
    preg_match('/src="([^"]+)"/', $iframe, $matches);
    return $matches[1] ?? null;
}

$src = extrairSrcIframe($video);

// salvar
$res = DepoimentosRepository::create([
    'video' => $src,
    'nome' => null,
    'empresa' => null,
    'texto' => null,
    'foto' => null,
    'tipo' => 'video'
]);


if($res) {
    header('Location: ../../../../depoimentos.php?create=true');
} else {
    header('Location: ../../../../depoimentos.php?error=true');
}
