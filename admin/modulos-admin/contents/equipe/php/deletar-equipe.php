<?php

require '../../../../config/config.php';
use Repositories\EquipeRepository;

// pegando dados do do form
$id = $_GET['id'];
$foto = $_GET['foto'];

$pastaDestino = __DIR__ . "/../../../../assets/imagens/arquivos/equipe/";

// deletar
$res = EquipeRepository::delete($id);

if($res) {
    $filePathDesk = $pastaDestino . $foto;
    if (file_exists($filePathDesk)) {
        unlink($filePathDesk);
    }

    header('Location: ../../../../equipe.php?delete=true');
} else {
    header('Location: ../../../../equipe.php?error=true');
}
