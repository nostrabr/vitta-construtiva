<?php

require '../../../../config/config.php';
use Repositories\DepoimentosRepository;

// pegando dados do do form
$id = $_POST['id'];
$nomeFoto = $_POST['nome-foto'];
$foto = '';

$pastaDestino = __DIR__ . "/../../../../assets/imagens/arquivos/depoimentos/";

if (isset($_FILES['att-foto']) && $_FILES['att-foto']['error'] != UPLOAD_ERR_NO_FILE) {
    $dataHora = date('YmdHis');
    $foto = $dataHora . basename($_FILES['att-foto']['name']);
    $caminhoDestino = $pastaDestino . $foto;

    move_uploaded_file($_FILES['att-foto']['tmp_name'], $caminhoDestino);
}

// removeer foto antiga
$filePathDesk = $pastaDestino . $nomeFoto;
if (file_exists($filePathDesk)) {
    unlink($filePathDesk);
}

// salvar
$res = DepoimentosRepository::updateFoto($foto, $id);


if($res) {
    header('Location: ../../../../depoimentos.php?create=true');
} else {
    header('Location: ../../../../depoimentos.php?error=true');
}
