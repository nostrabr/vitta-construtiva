<?php

require '../../../../config/config.php';
use Repositories\AreaAtuacaoRepository;

// pegando dados do do form
$id = $_POST['id'];
$nomeImg = $_POST['nome-img'];
$capa = '';

$pastaDestino = __DIR__ . "/../../../../assets/imagens/arquivos/areas-atuacao/";

if (isset($_FILES['att-capa-projeto']) && $_FILES['att-capa-projeto']['error'] != UPLOAD_ERR_NO_FILE) {
    $dataHora = date('YmdHis');
    $capa = $dataHora . basename($_FILES['att-capa-projeto']['name']);
    $caminhoDestino = $pastaDestino . $capa;

    move_uploaded_file($_FILES['att-capa-projeto']['tmp_name'], $caminhoDestino);
}

$filePathDesk = $pastaDestino . $nomeImg;
if (file_exists($filePathDesk)) {
    unlink($filePathDesk);
}

// salvar
$res = AreaAtuacaoRepository::updateImagemProjeto($capa, $id, 'capa');


if($res) {
    header('Location: ../../../../areas-atuacao.php?create=true');
} else {
    header('Location: ../../../../areas-atuacao.php?error=true');
}
