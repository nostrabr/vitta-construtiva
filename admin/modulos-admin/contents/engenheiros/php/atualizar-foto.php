<?php

require '../../../../config/config.php';
use Repositories\EngenheirosRepository;

// pegando dados do do form
$id = $_POST['id'];
$nomeImg = $_POST['nome-img'];
$foto = '';

$pastaDestino = __DIR__ . "/../../../../assets/imagens/arquivos/engenheiros/";

if (isset($_FILES['att-foto']) && $_FILES['att-foto']['error'] != UPLOAD_ERR_NO_FILE) {
    $dataHora = date('YmdHis');
    $foto = $dataHora . basename($_FILES['att-foto']['name']);
    $caminhoDestino = $pastaDestino . $foto;

    move_uploaded_file($_FILES['att-foto']['tmp_name'], $caminhoDestino);
}

// removeer foto antiga
$filePathDesk = $pastaDestino . $nomeImg;
if (file_exists($filePathDesk)) {
    unlink($filePathDesk);
}

// salvar
$res = EngenheirosRepository::updateFoto($foto, $id);


if($res) {
    header('Location: ../../../../engenheiros.php?create=true');
} else {
    header('Location: ../../../../engenheiros.php?error=true');
}
