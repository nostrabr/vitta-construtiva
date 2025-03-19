<?php

require '../../../../config/config.php';
use Repositories\AreaAtuacaoRepository;

// pegando dados do do form
$descricao = $_POST['descricao-projeto'];
$capa = '';
$imagem = '';
$imagens_projeto = '';
$area_id = $_POST['area_id'];
$identificador = $_POST['identificador-projeto'];

$pastaDestino = __DIR__ . "/../../../../assets/imagens/arquivos/areas-atuacao/";

if (isset($_FILES['capa-projeto']) && $_FILES['capa-projeto']['error'] != UPLOAD_ERR_NO_FILE) {
    $dataHora = date('YmdHis');
    $capa = $dataHora . basename($_FILES['capa-projeto']['name']);
    $caminhoDestino = $pastaDestino . $capa;

    move_uploaded_file($_FILES['capa-projeto']['tmp_name'], $caminhoDestino);
}

if (isset($_FILES['imagem-info']) && $_FILES['imagem-info']['error'] != UPLOAD_ERR_NO_FILE) {
    $dataHora = date('YmdHis');
    $imagem = $dataHora . basename($_FILES['imagem-info']['name']);
    $caminhoDestino = $pastaDestino . $imagem;

    move_uploaded_file($_FILES['imagem-info']['tmp_name'], $caminhoDestino);
}

if (isset($_FILES['imagens-projeto']) && $_FILES['imagens-projeto']['error'][0] != UPLOAD_ERR_NO_FILE) {
    $imagens_projeto = [];
    foreach ($_FILES['imagens-projeto']['tmp_name'] as $key => $tmp_name) {
        $dataHora = date('YmdHis');
        $imagem = $dataHora . basename($_FILES['imagens-projeto']['name'][$key]);
        $caminhoDestino = $pastaDestino . $imagem;

        move_uploaded_file($tmp_name, $caminhoDestino);
        $imagens_projeto[] = $imagem;
    }
}


$dados = [
    'descricao' => $descricao,
    'capa_projeto' => $capa,
    'imagem_info_projeto' => $imagem,
    'identificador' => $identificador,
    'area_atuacao_id' => $area_id
];

// salvar
$res = AreaAtuacaoRepository::createProjeto($dados, $imagens_projeto);

if($res) {
    header('Location: ../../../../areas-atuacao.php?create=true');
} else {
    header('Location: ../../../../areas-atuacao.php?error=true');
}
