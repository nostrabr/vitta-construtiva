<?php

require '../../../../config/config.php';
use Repositories\AreaAtuacaoRepository;

// pegando dados do do form
$id = $_POST['id'];
$nomeImg = $_POST['nome-img'];
$area_atuacao_thumb = '';

$pastaDestino = __DIR__ . "/../../../../assets/imagens/arquivos/areas-atuacao/";

if (isset($_FILES['att-area-atuacao-thumb']) && $_FILES['att-area-atuacao-thumb']['error'] != UPLOAD_ERR_NO_FILE) {
    $dataHora = date('YmdHis');
    $area_atuacao_thumb = $dataHora . basename($_FILES['att-area-atuacao-thumb']['name']);
    $caminhoDestino = $pastaDestino . $area_atuacao_thumb;

    move_uploaded_file($_FILES['att-area-atuacao-thumb']['tmp_name'], $caminhoDestino);
}

$filePathDesk = $pastaDestino . $nomeImg;
if (file_exists($filePathDesk)) {
    unlink($filePathDesk);
}

// salvar
$res = AreaAtuacaoRepository::upodateImgAreaAtuacao($area_atuacao_thumb, $id, 'capa');


if($res) {
    header('Location: ../../../../areas-atuacao.php?create=true');
} else {
    header('Location: ../../../../areas-atuacao.php?error=true');
}
