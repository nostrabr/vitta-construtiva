<?php

require '../../../../config/config.php';
use Repositories\ParceirosRepository;

// pegando dados do do form
$id = $_GET['id'];
$foto = $_GET['foto'];

$pastaDestino = __DIR__ . "/../../../../assets/imagens/arquivos/parceiros/";

// deletar
$res = ParceirosRepository::delete($id);

if($res) {
    $filePathDesk = $pastaDestino . $foto;
    if (file_exists($filePathDesk)) {
        unlink($filePathDesk);
    }

    header('Location: ../../../../parceiros.php?delete=true');
} else {
    header('Location: ../../../../parceiros.php?error=true');
}
