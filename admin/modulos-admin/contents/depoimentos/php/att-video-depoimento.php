<?php

require '../../../../config/config.php';
use Repositories\DepoimentosRepository;

// pegando dados do do form
$id = $_POST['id'];
$video = $_POST['att-video'];

function extrairSrcIframe($iframe) {
    preg_match('/src="([^"]+)"/', $iframe, $matches);
    return $matches[1] ?? null;
}

$src = extrairSrcIframe($video);

// salvar
$res = DepoimentosRepository::updateVideo($src, $id);


if($res) {
    header('Location: ../../../../depoimentos.php?create=true');
} else {
    header('Location: ../../../../depoimentos.php?error=true');
}
