<?php

require '../../../../config/config.php';
use Repositories\DepoimentosRepository;

// pegando dados do do form
$id = $_GET['id'];
$foto = $_GET['img'];

$pastaDestino = __DIR__ . "/../../../../assets/imagens/arquivos/depoimentos/";

// deletar
$res = DepoimentosRepository::delete($id);

if($res) {
    $filePathDesk = $pastaDestino . $foto;
    if (file_exists($filePathDesk)) {
        unlink($filePathDesk);
    }

    header('Location: ../../../../depoimentos.php?create=true');
} else {
    header('Location: ../../../../depoimentos.php?error=true');
}
