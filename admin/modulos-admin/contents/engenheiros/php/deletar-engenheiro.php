<?php

require '../../../../config/config.php';
use Repositories\EngenheirosRepository;

// pegando dados do do form
$id = $_GET['id'];
$foto = $_GET['foto'];

$pastaDestino = __DIR__ . "/../../../../assets/imagens/arquivos/engenheiros/";

// deletar
$res = EngenheirosRepository::delete($id);

if($res) {
    $filePathDesk = $pastaDestino . $foto;
    if (file_exists($filePathDesk)) {
        unlink($filePathDesk);
    }

    header('Location: ../../../../engenheiros.php?delete=true');
} else {
    header('Location: ../../../../engenheiros.php?error=true');
}
