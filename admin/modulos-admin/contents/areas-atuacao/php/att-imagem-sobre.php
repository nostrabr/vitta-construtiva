<?php

require '../../../../config/config.php';
use Repositories\AreaAtuacaoRepository;

// pegando dados do do form
$id = $_POST['id'];
$nomeImg = $_POST['nome-img'];
$imagem = '';

$pastaDestino = __DIR__ . "/../../../../assets/imagens/arquivos/areas-atuacao/";

if (isset($_FILES['att-imagem_info_projeto']) && $_FILES['att-imagem_info_projeto']['error'] != UPLOAD_ERR_NO_FILE) {
    $dataHora = date('YmdHis');
    $imagem = $dataHora . basename($_FILES['att-imagem_info_projeto']['name']);
    $caminhoDestino = $pastaDestino . $imagem;

    move_uploaded_file($_FILES['att-imagem_info_projeto']['tmp_name'], $caminhoDestino);
}

$filePathDesk = $pastaDestino . $nomeImg;
if (file_exists($filePathDesk)) {
    unlink($filePathDesk);
}

// salvar
$res = AreaAtuacaoRepository::updateImagemProjeto($imagem, $id, 'imagem');


if($res) {
    header('Location: ../../../../areas-atuacao.php?create=true');
} else {
    header('Location: ../../../../areas-atuacao.php?error=true');
}
