<?php

require '../../../../config/config.php';
use Repositories\AreaAtuacaoRepository;

// pegando dados do do form
$id = $_POST['id'];
$imagens_projeto = '';



$pastaDestino = __DIR__ . "/../../../../assets/imagens/arquivos/areas-atuacao/";

if (isset($_FILES['add-imagens-projeto']) && $_FILES['add-imagens-projeto']['error'][0] != UPLOAD_ERR_NO_FILE) {
    $imagens_projeto = [];
    foreach ($_FILES['add-imagens-projeto']['tmp_name'] as $key => $tmp_name) {
        $dataHora = date('YmdHis');
        $imagem = $dataHora . basename($_FILES['add-imagens-projeto']['name'][$key]);
        $caminhoDestino = $pastaDestino . $imagem;

        move_uploaded_file($tmp_name, $caminhoDestino);
        $imagens_projeto[] = $imagem;
    }
}

// salvar
$res = AreaAtuacaoRepository::createImagensProjeto($imagens_projeto, $id);

if($res) {
    header('Location: ../../../../areas-atuacao.php?create=true');
} else {
    header('Location: ../../../../areas-atuacao.php?error=true');
}
